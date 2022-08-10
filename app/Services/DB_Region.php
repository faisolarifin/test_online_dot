<?php

namespace App\Services;

use App\Interfaces\RegionInterface;
use App\Models\{Province, City};

class DB_Region implements RegionInterface {

    public function province($id = null): array
    {
        if ($id == null) {
            $result = Province::get();
        } 
        else {
            $result = Province::where(['province_id' => $id])->first();
        }
        if ($result->count() == null) return [
            'code' => 404,
            'message' => 'data tidak ditemukan!',
        ];
        return [
            'code' => 200,
            'data' => $result,
        ];
    }

    public function city($id = null): array
    {
        if ($id == null) {
            $result = City::join('province', 'province.province_id', '=', 'cities.province_id')
            ->get([
                'province.prov_name',
                'cities.*',
            ]);
        } 
        else {
            $result = City::join('province', 'province.province_id', '=', 'cities.province_id')
            ->where(['city_id' => $id])
            ->first([
                'province.prov_name',
                'cities.*',
            ]);
        }
        if ($result->count() == null) return [
            'code' => 404,
            'message' => 'data tidak ditemukan!',
        ];
        return [
            'code' => 200,
            'data' => $result,
        ];
    }

}

?>