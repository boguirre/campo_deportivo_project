<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCampo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function campos()
    {
        return $this->hasMany(Campo::class);
    }
}
