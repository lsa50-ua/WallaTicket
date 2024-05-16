<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evento;

class Local extends Model
{
    use HasFactory;

    public function eventos(){
        return $this->hasMany(Evento::class);
    }
}
