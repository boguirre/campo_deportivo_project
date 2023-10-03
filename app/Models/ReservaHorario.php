<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaHorario extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
