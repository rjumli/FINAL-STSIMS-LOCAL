<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\School\SchoolService;

class SchoolController extends Controller
{
    public $school;

    public function __construct(SchoolService $school)
    {
        $this->school = $school;
    }

    public function index(Request $request){
        switch($request->type){
            case 'lists':
                return $this->school->fetch($request);
            break;
            default :
            return inertia('Modules/Schools/Index');
        }
    }
}
