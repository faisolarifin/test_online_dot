<?php

namespace App\Services;

use App\Helpers\RajaOngkir;
use App\Interfaces\RegionInterface;

class Direct_Region implements RegionInterface {

    public function province($id = null): array
    {
        $result = array();
        if ($id == null)
        {
            foreach (RajaOngkir::provinsi()->results as $row)
            {
                array_push($result, [
                    'province_id' => $row->province_id,
                    'prov_name' => $row->province,
                ]);
            }
        }
        else {
            $row = RajaOngkir::provinsi("id={$id}")->results;
            $result = [
                'province_id' => $row->province_id,
                'prov_name' => $row->province,
            ];
        }
        if (count($result) == 0) return [
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
        $result = array();
        if ($id == null)
        {
            foreach (RajaOngkir::kota()->results as $row)
            {
                array_push($result, [
                    'province_id' => $row->province_id,
                    'prov_nmae' => $row->province,
                    'city_id' => $row->city_id,
                    'city_name' => $row->city_name,
                    'type' => $row->type,
                    'postal_code' => $row->postal_code,
                ]);
            }
        }
        else {
            $row = RajaOngkir::kota("id={$id}")->results;
            $result = [
                'province_id' => $row->province_id,
                'prov_name' => $row->province,
                'city_id' => $row->city_id,
                'city_name' => $row->city_name,
                'type' => $row->type,
                'postal_code' => $row->postal_code
            ];
        }
        if (count($result) == 0) return [
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