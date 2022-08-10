<?php

namespace App\Interfaces;

interface RegionInterface {

    public function province($id): array;
    public function city($id): array;

}

?>