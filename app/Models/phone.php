<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    use HasFactory;

    protected $fillable=[
        'model_name',
        'model_number',
        'description',
        'price',
        'image',
        'operation_system_id',
        'processor_id',
        'color_id',
        'brand_id',
    ];

    // brand to phone 1 to many
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function operation_system()
    {
        return $this->belongsTo(Operation_System::class);
    }

    public function processor()
    {
        return $this->belongsTo(Processor::class);
    }
}
