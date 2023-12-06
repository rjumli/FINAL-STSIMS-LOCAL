<?php

namespace App\Services\Sync;

use App\Models\ListAgency;
use App\Models\ListDropdown;
use App\Models\ListPrivilege;
use App\Models\ListProgram;
use App\Models\ListStatus;
use App\Models\ListCourse;
use App\Traits\HandlesCurl;

class ListService
{
    use HandlesCurl;

    public function fetchCount(){
        $response = $this->handleCurl('lists','count');
        return json_decode($response);
    }

    public function fetch(){
        set_time_limit(0);
        $arrays = ['agencies','dropdowns','programs','privileges','courses','statuses'];
        try {
            foreach($arrays as $array){
                $response = $this->handleCurl('lists',$array);
                $schools = json_decode($response);
                
                foreach($schools as $data){
                    switch($array){
                        case 'agencies':
                            ListAgency::insertOrIgnore((array)$data); 
                        break;
                        case 'dropdowns':
                            ListDropdown::insertOrIgnore((array)$data); 
                        break;
                        case 'courses':
                            ListCourse::insertOrIgnore((array)$data); 
                        break;
                        case 'statuses':
                            ListStatus::insertOrIgnore((array)$data); 
                        break;
                        case 'programs':
                            ListProgram::insertOrIgnore((array)$data); 
                        break;
                        case 'privileges':
                            ListPrivilege::insertOrIgnore((array)$data); 
                        break;
                    }
                    
                }
            }
            $response = true;
        }catch (Exception $e){
            $response = 'Caught exception: '.$e->getMessage();
        }
        return $response;
    }
}
