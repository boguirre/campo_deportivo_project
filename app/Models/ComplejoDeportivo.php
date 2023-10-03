<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplejoDeportivo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function imagenes_complejos()
    {
        return $this->hasMany(ImagenesComplejo::class);
    }

    public function complejo_campos()
    {
        return $this->hasMany(ComplejoCampo::class);
    }
}
