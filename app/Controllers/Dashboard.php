<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Dashboard extends BaseController
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

        $banners = $this->curl->request('GET', '/banner', [
            'headers' => [
                'Authorization: Bearer' => session()->get('token'),
            ],
        ]);

        $services = $this->curl->request('GET', '/services', [
            'headers' => [
                'Authorization: Bearer' => session()->get('token'),
            ],
        ]);

        $data = [
            'page' => 'Dashboard',
            'profile' => json_decode($profile->getBody(), true)['data'],
            'balance' => json_decode($balance->getBody(), true)['data'],
            'banners' => json_decode($banners->getBody(), true)['data'],
            'services' => json_decode($services->getBody(), true)['data'],
        ];

        return view('homepage', $data);
    }
}
