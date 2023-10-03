<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function tipo_campo()
    {
        return $this->belongsTo(TipoCampo::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function complejo_campos()
    {
        return $this->hasMany(ComplejoCampo::class);
    }

    public function imagenes_campos()
    {
        return $this->hasMany(ImagenesCampo::class);
    }

    public function detalle_reservas()
    {
        return $this->hasMany(DetalleReserva::class);
    }
}
