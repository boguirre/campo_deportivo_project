<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenesComplejo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function complejo_deportivo()
    {
        return $this->belongsTo(ComplejoDeportivo::class);
    }
}
