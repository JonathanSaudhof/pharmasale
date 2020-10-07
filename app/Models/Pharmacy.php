<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'region_id',
      'user_id',
      'adress_street',
      'adress_building_number',
      'adress_zip_code',
      'adress_city',
      'contact_first_name',
      'contact_last_name',
      'contact_email',
      'contact_phone',
  ];
  

  

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
