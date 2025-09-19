<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'qty',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
