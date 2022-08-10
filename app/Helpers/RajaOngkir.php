<?php
namespace App\Helpers;

class RajaOngkir {

    private static function auth($endpoint)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/{$endpoint}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 1000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".config('keys.rajaongkir')
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if (!$err) return $response;
        
        return "cURL Error #:" . $err;

    }
    
    public static function provinsi($arg='')
    {
        $data = self::auth("province?{$arg}");
        return json_decode($data)->rajaongkir;
    }

    public static function kota($arg='')
    {
        $data = self::auth("city?{$arg}");
        return json_decode($data)->rajaongkir;
    }
}


?>