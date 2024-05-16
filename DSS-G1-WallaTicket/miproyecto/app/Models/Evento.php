<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use App\Models\Entrada;
use App\Models\Reseña;
use App\Models\Local;

class Evento extends Model {

    use HasFactory;

    private $entradas = array();

    protected $fillable = [
        'id',
        'nombre_evento',
        'descripcion',
        'fecha',
        'tipo',
        'aforo',
        'edad_minima',
        'foto',
    ];

    public function entradas(){
        return $this->hasMany(Entrada::class);
    }

    public function reseñas(){
        return $this->hasMany(Reseña::class);
    }

    public function local(){
        return $this->belongsTo(Local::class);
    }

}