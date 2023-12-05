<?php

namespace App\Services\Sync;

use App\Traits\HandlesCurl;

class ListService
{
    use HandlesCurl;

    public function fetchCount(){
        $response = $this->handleCurl('lists','count');
        return json_decode($response);
    }
}
