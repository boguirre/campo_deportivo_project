<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function campo()
    {
        return $this->belongsTo(Campo::class);
    }

    public function reserva_horarios()
    {
        return $this->hasMany(ReservaHorario::class);
    }
}
