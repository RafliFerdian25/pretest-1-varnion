<?php

namespace App;

use Illuminate\Support\Facades\Http;

class RandomUser
{
    protected $apiUrl = 'https://randomuser.me/api/';

    // mengambil data random user dari API
    public function getRandomUser()
    {
        $response = Http::get($this->apiUrl);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
