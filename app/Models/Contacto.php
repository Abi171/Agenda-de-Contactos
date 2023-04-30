<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ContactoFactory;

class Contacto extends Model
{
    use HasFactory;

    public function eventos(){
        return $this->hasMany(Eventos::class);
    }
    public function notas(){
        return $this->hasMany(Nota::class);
    }
    
}
