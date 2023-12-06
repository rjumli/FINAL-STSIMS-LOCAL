<?php

namespace App\Services\School;

use App\Models\SchoolCampus;
use App\Http\Resources\School\ListsResource;

class SchoolService
{
    public function fetch($request){
        $data = ListsResource::collection(
            SchoolCampus::query()
            ->with('school.class','term:id,name','grading:id,name')
            ->with('region:region,code','province:name,code','municipality:name,code')
            ->when($request->region, function ($query, $region) {
                $query->where('region_code',$region);
            })
            ->when($request->keyword, function ($query, $keyword) {
                $query->whereHas('school',function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', '%'.$keyword.'%');
                })->orWhere(function ($query) use ($keyword) {
                    $query->where('campus', 'LIKE', '%'.$keyword.'%');
                });
            })
            ->whereHas('school',function ($query) {
                $query->orderBy('name','ASC');
            })
            ->paginate($request->counts)
            ->withQueryString()
        );
        return $data;
    }
}
