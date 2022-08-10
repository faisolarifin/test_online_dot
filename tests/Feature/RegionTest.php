<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_no_auth()
    {
        $response = $this->get('/search/provinces');
        $response->assertStatus(200)->assertExactJson([
            'code' => 403,
            'message' => 'Perlu Authorisasi terlebih dahulu!'
        ]);
    }

    public function test_provices()
    {
        $response = $this->get('/search/provinces', [
            'username' => 'faisol',
            'password' => 'faisol',
        ]);
        $response->assertStatus(200)->assertJson(['code' => 200]);
    }

    public function test_provices_by_id()
    {
        $response = $this->get('/search/provinces?id=1', [
            'username' => 'faisol',
            'password' => 'faisol',
        ]);
        $response->assertStatus(200)->assertJson([
            'code' => 200,
            "data" => [
                "province_id" => 1,
                "prov_name" => "Bali"
            ]
         ]);
    }

    public function test_city()
    {
        $response = $this->get('/search/cities', [
            'username' => 'faisol',
            'password' => 'faisol',
        ]);
        $response->assertStatus(200)->assertJson(['code' => 200]);
    }

    public function test_city_by_id()
    {
        $response = $this->get('/search/cities?id=1', [
            'username' => 'faisol',
            'password' => 'faisol',
        ]);
        $response->assertStatus(200)->assertJson([
            'code' => 200,
            "data" => [
                "province_id" => 21,
                "prov_name" => "Nanggroe Aceh Darussalam (NAD)",
                "city_id" => "1",
                "city_name" => "Aceh Barat",
                "type" => "Kabupaten",
                "postal_code" => "23681"
            ]
         ]);
    }
}
