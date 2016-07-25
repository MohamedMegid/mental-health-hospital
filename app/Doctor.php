<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctor';
    protected $fillable = ['name', 'basic_photo', 'specialization'];
}
