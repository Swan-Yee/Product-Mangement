<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    use HasFactory;

    protected $fillable=[
        'model_name',
        'model_numeber',
        'description',
        'price',
        'image',
    ];
}
