<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\EventoFactory;

class Evento extends Model
{
    use HasFactory;

    public function contactos(){
        return $this->belongsTo(Evento::class);
    }
}
