<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(Request $request){
        switch($request->type){
            case 'lists':
                return $this->lists($request);
            break;
            default :
            return inertia('Modules/Schools/Index');
        }
    }
}
