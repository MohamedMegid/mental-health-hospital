<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedConsulting extends Model
{
    protected $table = 'med_consulting';
    protected $fillable = ['name', 'mail', 'sex', 'message'];

    public function consulting(){
        return $this->hasOne('App\MedReply');   
    }
}
