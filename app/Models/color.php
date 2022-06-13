<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
    ];


    /**
     * Get the Color for the Phone.
     */
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}
