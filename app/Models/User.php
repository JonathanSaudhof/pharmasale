<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PhpParser\Node\Stmt\Static_;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'region_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isMine($ressource)
    {
        if ($ressource->user_id && $ressource->user_id === $this->id) {
            return true;
        }

        return false;
    }

    public static function countAll()
    {
        return User::all()->count();
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    
    public function pharmacies()
    {
        return $this->hasMany(Pharmacy::class);
    }
}
