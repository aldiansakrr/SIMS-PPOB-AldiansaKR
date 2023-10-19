<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Config\CURLRequest;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth extends ResourceController
{
    use ResponseTrait;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->curl = \Config\Services::curlrequest([
            'baseURI' => 'https://take-home-test-api.nutech-integrasi.app',
            'http_errors' => false,
        ]);
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data['page'] = 'Login Page';
        return view('login', $data);
    }

    public function register()
    {
        $data['page'] = 'Registration Page';
        return view('registration', $data);
    }

    public function login()
    {

        $login = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];


        $login = $this->curl->request('POST', '/login', [
            'form_params' => $login
        ]);

        if ($login->getStatusCode() == 200) {
            $token = json_decode($login->getBody(), true)['data']['token'];
            $exploded = explode('.', $token);
            $base = base64_decode($exploded[1]);

            $payload = [
                'email' => json_decode($base, true)['email'],
                'memberCode' => json_decode($base, true)['memberCode'],
                'iat' => json_decode($base, true)['iat'],
                'exp' => json_decode($base, true)['exp'],
                'token' => $token,
            ];

            $this->session->set($payload);
            return redirect()->to('/dashboard')->with('success', 'Berhasil masuk sistem');
        } else {
            return redirect()->back()->with('error', json_decode($login->getBody(), true)['message'])->withInput();
        }
    }

    public function registration()
    {
        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'parameter {field} harus di isi',
                    'valid_email' => 'parameter {field} tidak sesuai format',
                ],
            ],
            'first_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'parameter {field} harus di isi',
                ],
            ],
            'last_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'parameter {field} harus di isi',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'parameter {field} harus di isi',
                    'min_length' => '{field} length minimal 8 karakter',
                ],
            ],
            'confpassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'parameter {field} harus di isi',
                    'matches' => 'parameter {field} harus sama dengan kolom password'
                ]
            ],
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()->with('error', $this->validation->getErrors())->withInput();
        } else {
            $data = [
                'email' => $this->request->getPost('email'),
                'first_name' => $this->request->getPost('first_name'),
                'last_name' => $this->request->getPost('last_name'),
                'password' => $this->request->getPost('password'),
            ];

            $register = $this->curl->request('POST', '/registration', [
                'form_params' => $data
            ]);

            if ($register->getStatusCode() == 200) {
                return redirect()->to('')->with('success', 'Registrasi akun berhasil, silahkan login menuju sistem');
            } else {
                return redirect()->back()->with('error', json_decode($register->getBody(), true)['message']);
            }
        }
    }

    public function profile($id)
    {
        $profile = $this->curl->request('GET', '/profile', [
            'headers' => [
                'Authorization: Bearer' => $id,
            ],
        ]);

        $data = [
            'page' => 'Profile',
            'profile' => json_decode($profile->getBody(), true)['data'],
            'isUpdated' => false,
        ];

        return view('akun-1', $data);
    }

    public function updated($id)
    {
        $profile = $this->curl->request('GET', '/profile', [
            'headers' => [
                'Authorization: Bearer' => $id,
            ],
        ]);

        $data = [
            'page' => 'Profile',
            'profile' => json_decode($profile->getBody(), true)['data'],
            'isUpdated' => true,
        ];
        return view('akun-1', $data);
    }

    public function change()
    {
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
        ];

        $token = $this->request->getPost('token');

        $change = $this->curl->request('PUT', '/profile/update', [
            'headers' => [
                'Authorization: Bearer' => $token,
            ],
            'form_params' => $data
        ]);

        if ($change->getStatusCode() == 200) {
            return redirect()->to('profile/' . session()->get('token'))->with('success', json_decode($change->getBody(), true)['message']);
        } else {
            return redirect()->to('updated/' . session()->get('token'))->with('error', json_decode($change->getBody(), true)['message']);
        }
    }

    public function image()
    {
        $file = $this->request->getFile('file');


        $token = $this->request->getPost('token');

        $image = $this->curl->request('PUT', '/profile/image', [
            'headers' => [
                'Authorization: Bearer' => $token,
            ],
            'multipart' => [
                'file' => new \CURLFile($file->getRealPath(), $file->getMimeType(), $file->getRandomName()),
            ],
        ]);


        if ($image->getStatusCode() == 200) {
            return redirect()->to('profile/' . session()->get('token'))->with('success', json_decode($image->getBody(), true)['message']);
        } else {
            return redirect()->to('updated/' . session()->get('token'))->with('error', json_decode($image->getBody(), true)['message']);
        }
    }

    public function logout()
    {
        $var = ['email', 'memberCode', 'iat', 'exp', 'token'];

        $this->session->remove($var);

        return redirect()->to(base_url(''))->with('success', 'logout berhasil');
    }
}
