<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Helpers\RajaOngkir;
use App\Models\City;
use App\Models\Kota;
use App\Models\Province;
use App\Models\Provinsi;

class FetchRajaOngkir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:rajaongkir';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch data from Raja Ongkir';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Fetching Data dari RajaOngkir');

        foreach(RajaOngkir::provinsi()->results as $prov) {
            if (Province::where(['province_id' => $prov->province_id])->first() == null)
            {
                Province::create([
                    'province_id' => $prov->province_id,
                    'prov_name' => $prov->province,
                ]);
                foreach (RajaOngkir::kota("province={$prov->province_id}")->results as $row) {
                    if (City::where(['city_id' => $row->city_id])->first() == null)
                    {
                        City::create([
                            'province_id' => $prov->province_id,
                            'city_id' => $row->city_id,
                            'city_name' => $row->city_name, 
                            'type' => $row->type, 
                            'postal_code' => $row->postal_code,
                        ]);
                    }
                }
            }
        }
        return $this->info('Selesai');
    }
}
