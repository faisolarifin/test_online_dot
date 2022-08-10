<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $primaryKey = 'id';
    protected $fillable = ['province_id', 'city_id', 'city_name', 'type', 'postal_code'];
    protected $hidden = ['id', 'created_at', 'updated_at'];

}
