<?php

namespace App\Services\Sync;

use App\Models\LocationRegion;
use App\Models\LocationBarangay;
use App\Models\LocationProvince;
use App\Models\LocationMunicipality;
use App\Traits\HandlesCurl;

class LocationService
{
    use HandlesCurl;

    public function fetchCount(){
        $response = $this->handleCurl('locations','count');
        return json_decode($response);
    }

    public function fetch($type,$category){
        set_time_limit(0);
        $arrays = ['regions','provinces','municipalities','barangays'];
        try {
            foreach($arrays as $array){
                $response = $this->handleCurl('locations',$array);
                $locations = json_decode($response);
                
                foreach($locations as $location){
                    switch($array){
                        case 'regions':
                            ($type == 'check') ? $regions[] = (array)$location : $q = LocationRegion::insertOrIgnore((array)$location); 
                        break;
                        case 'provinces':
                            ($type == 'check') ? $provinces[] = (array)$location : $q = LocationProvince::insertOrIgnore((array)$location); 
                        break;
                        case 'municipalities':
                            ($type == 'check') ? $municipalities[] = (array)$location : $q = LocationMunicipality::insertOrIgnore((array)$location); 
                        break;
                        case 'barangays':
                            ($type == 'check') ? $barangays[] = (array)$location : $q = LocationBarangay::insertOrIgnore((array)$location); 
                        break;
                    }
                }
            }
        } catch (Exception $e) {
            $response = 'Caught exception: '.$e->getMessage();
        }

        if($type == 'check'){
            $addresses = [
                'Regions' => [
                    'downloaded' => LocationRegion::count(),
                    'count' => count($regions)
                ],
                'Provinces' => [
                    'downloaded' => LocationProvince::count(),
                    'count' => count($provinces)
                ],
                'Municipalities' => [
                    'downloaded' => LocationMunicipality::count(),
                    'count' => count($municipalities)
                ],
                'Barangays' => [
                    'downloaded' => LocationBarangay::count(),
                    'count' => count($barangays)
                ]
            ];
            return $addresses;
        }else{
            return true;
        }
    }
}
