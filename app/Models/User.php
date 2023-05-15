<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Mchev\Banhammer\Traits\Bannable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Bannable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellidos',
        'email',
        'telefono',
        'password',
        'is_admin',
        'is_guia',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación de los usuarios con las reservas.
     *
     * @return void
     */
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    /**
     * Relación de los usuarios con los comentarios
     *
     * @return void
     */
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
