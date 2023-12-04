<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Sync\LocationService;

class SyncController extends Controller
{
    public $location;

    public function __construct(LocationService $location)
    {
        $this->location = $location;
    }

    public function locations($type,$category){
        return $this->location->fetch($type,$category);
    }
}
