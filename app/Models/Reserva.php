<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detalle_reservas()
    {
        return $this->hasMany(DetalleReserva::class);
    }

    public function reserva_horarios()
    {
        return $this->hasMany(ReservaHorario::class);
    }
}
