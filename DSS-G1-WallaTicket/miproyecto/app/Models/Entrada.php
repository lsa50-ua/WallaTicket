<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Entrada extends Model{
    
    use HasFactory;

    protected $fillable = [
        'id',
        'precio',
        'vendida',
    ];

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function evento(){
        return $this->belongsTo(Evento::class);
    }
    
}