<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "ref_type";

    
    public function merk()
    {
        return $this->belongsTo(Merk::class, 'merk');
    };
    public function model()
    {
        return $this->belongsTo(Modelerk::class, 'model');
    }

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $guarded = ['id'];
}
