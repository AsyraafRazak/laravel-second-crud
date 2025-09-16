<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Netizen extends Model
{
    use HasFactory;
    protected $table='netizens';
    protected $fillable = ['name', 'ic_number', 'race', 'address'];
}
