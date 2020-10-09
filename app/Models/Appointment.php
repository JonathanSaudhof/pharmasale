<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'pharmacy_id',
      'note_body',
      'starts_at',
      'ends_at'
    ];


    public function user(){
      return $this->belongsTo(User::class);
    }

    public function pharmacy(){
      return $this->belongsTo(Pharmacy::class);
    }

}
