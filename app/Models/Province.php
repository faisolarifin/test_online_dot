<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'province';
    protected $primaryKey = 'id';
    protected $fillable = ['province_id', 'prov_name'];
    protected $hidden = ['id', 'created_at', 'updated_at'];
}
