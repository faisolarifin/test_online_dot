<?php

namespace App\Http\Controllers;

use App\Interfaces\RegionInterface;

class Regions extends Controller
{
    protected $region;

    public function __construct(RegionInterface $region)
    {
        $this->region = $region;
    }

    public function getProvinsi()
    {
        $result = $this->region->province(request()->query('id'));
        return response()->json($result);
    }
    public function getKota()
    {
        $result = $this->region->city(request()->query('id'));
        return response()->json($result);
    }
}
