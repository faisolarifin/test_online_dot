<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;

class Regions extends Controller
{

    public function getProvinsi()
    {
        $id = request()->query('id');
        if ($id == null) {
            $result = Province::get();
        } 
        else {
            $result = Province::where(['province_id' => $id])->first();
        }
        if ($result->count() == null) return response()->json([
            'code' => 404,
            'message' => 'data tidak ditemukan!',
        ]);
        return response()->json([
            'code' => 200,
            'data' => $result,
        ]);
    }
    public function getKota()
    {
        $id = request()->query('id');
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
        if ($result->count() == null) return response()->json([
            'code' => 404,
            'message' => 'data tidak ditemukan!',
        ]);
        return response()->json([
            'code' => 200,
            'data' => $result,
        ]);
    }
}
