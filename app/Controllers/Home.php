<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use \Firebase\JWT\JWT;

class Home extends ResourceController
{
    use ResponseTrait;
    protected $curl, $validation;

    public function __construct()
    {
        $this->curl = \Config\Services::curlrequest();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function test()
    {

        // $response = $this->curl->request('GET', 'https://reqres.in/api/users');

        $data = [
            'email' => 'testing@test.com',
            'first_name' => 'first',
            'last_name' => 'last',
            'password' => '111111'
        ];

        $login = [
            'email' => "user@nutech-integrasi.com",
            'password' => "abcdef1234"
        ];


        $login = $this->curl->request('POST', 'https://take-home-test-api.nutech-integrasi.app/login', [
            'form_params' => $login
        ]);

        dd($login->getBody());
    }
}
