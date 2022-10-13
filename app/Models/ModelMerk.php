<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMerk extends Model
{
    use HasFactory;

    protected $table = "ref_model";

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'merk_id');
    }

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $guarded = ['id'];
}
