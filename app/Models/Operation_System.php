<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation_System extends Model
{
    use HasFactory;

    protected $table="operation_systems";

    protected $fillable=[
        'name',
    ];
}
