<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;
    public function region(){
      $this->belongsTo(Region::class);
    }
    public function appointments(){
      $this->hasMany(Appointment::class);
    }

    public function user(){
      $this->belongsTo(User::class);
    }
}
