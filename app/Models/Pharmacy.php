<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;
    public function region(){
     return  $this->belongsTo(Region::class);
    }
    public function appointments(){
      return $this->hasMany(Appointment::class);
    }

    public function user(){
      return $this->belongsTo(User::class);
    }
}