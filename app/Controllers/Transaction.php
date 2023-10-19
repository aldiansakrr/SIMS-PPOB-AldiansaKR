<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Transaction extends BaseController
{
    use ResponseTrait;
    protected $helpers = ['form', 'DateHelper'];

    public function __construct()
    {
        $this->curl = \Config\Services::curlrequest([
            'baseURI' => 'https://take-home-test-api.nutech-integrasi.app',
            'http_errors' => false,
        ]);
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function topup()
    {
        $profile = $this->curl->request('GET', '/profile', [
            'headers' => [
                'Authorization: Bearer' => session()->get('token'),
            ],
        ]);

        $balance = $this->curl->request('GET', '/balance', [
            'headers' => [
                'Authorization: Bearer' => session()->get('token'),
            ],
        ]);

        $data = [
            'page' => 'Topup',
            'profile' => json_decode($profile->getBody(), true)['data'],
            'balance' => json_decode($balance->getBody(), true)['data'],
        ];

        return view('topup', $data);
    }

    public function prosestopup()
    {
        $rules = [
            'top_up_amount' => [
                'rules' => 'greater_than[10000]|less_than_equal_to[1000000]',
                'errors' => [
                    'greater_than' => '{field} minimal berisi 10.000',
                    'less_than_equal_to' => '{field} maksimal topup sebesar 1.000.000'
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Top Up sebesar')->withInput();
        } else {
            $topup = $this->curl->request('POST', '/topup', [
                'headers' => [
                    'Authorization: Bearer' => session()->get('token'),
                ],
                'form_params' => [
                    'top_up_amount' => $this->request->getVar('top_up_amount'),
                ],
            ]);

            if ($topup->getStatusCode() == 200) {
                return redirect()->back()->with('success', 'Top Up sebesar')->withInput();
            } else {
                return redirect()->back()->with('error', json_decode($topup->getBody(), true)['message']);
            }
        }
    }

    public function services($id)
    {
        $profile = $this->curl->request('GET', '/profile', [
            'headers' => [
                'Authorization: Bearer' => session()->get('token'),
            ],
        ]);

        $services = $this->curl->request('GET', '/services', [
            'headers' => [
                'Authorization: Bearer' => session()->get('token'),
            ],
        ]);

        $balance = $this->curl->request('GET', '/balance', [
            'headers' => [
                'Authorization: Bearer' => session()->get('token'),
            ],
        ]);

        $data = [
            'page' => 'Pembayaran',
            'profile' => json_decode($profile->getBody(), true)['data'],
            'balance' => json_decode($balance->getBody(), true)['data'],
        ];

        foreach (json_decode($services->getBody(), true)['data'] as $value) :
            if ($value['service_code'] == $id) :
                $data['service'] = $value;
            endif;
        endforeach;

        return view('pembayaran', $data);
    }

    public function pembayaran()
    {
        $transaction = $this->curl->request('POST', '/transaction', [
            'headers' => [
                'Authorization: Bearer' => session()->get('token'),
            ],
            'form_params' => [
                'service_code' => $this->request->getVar('service_code'),
            ],
        ]);

        if ($transaction->getStatusCode() == 200) {
            return redirect()->back()->with('success', 'Pembayaran')->withInput();
        } else {
            return redirect()->back()->with('error', json_decode($transaction->getBody(), true)['message']);
        }
    }

    public function history($id)
    {
        $transaction = $this->curl->request('GET', '/transaction/history', [
            'headers' => [
                'Authorization: Bearer' => session()->get('token'),
            ],
            'query' => [
                'limit' => $id,
                'offset' => 0,
            ]

        ]);

        $profile = $this->curl->request('GET', '/profile', [
            'headers' => [
                'Authorization: Bearer' => session()->get('token'),
            ],
        ]);


        $balance = $this->curl->request('GET', '/balance', [
            'headers' => [
                'Authorization: Bearer' => session()->get('token'),
            ],
        ]);


        $data = [
            'page' => 'Transaction',
            'profile' => json_decode($profile->getBody(), true)['data'],
            'balance' => json_decode($balance->getBody(), true)['data'],
            'transaction' => json_decode($transaction->getBody(), true)['data']['records'],
            'limit' => $id,
        ];


        return view('transaksi', $data);
    }
}
