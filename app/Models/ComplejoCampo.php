<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplejoCampo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function campo()
    {
        return $this->belongsTo(Campo::class);
    }

    public function complejo_deportivo()
    {
        return $this->belongsTo(ComplejoDeportivo::class);
    }
}
