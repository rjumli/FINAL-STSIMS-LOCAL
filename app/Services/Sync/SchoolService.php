<?php

namespace App\Services\Sync;

use App\Traits\HandlesCurl;

class SchoolService
{
    use HandlesCurl;

    public function fetchCount(){
        $response = $this->handleCurl('schools','count');
        return json_decode($response);
    }
}
