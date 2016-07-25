<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedReply extends Model
{
    protected $table = 'med_reply';
    protected $fillable = ['med_id', 'reply_message'];

    public function consulting(){
        return $this->belongsTo('App\MedConsulting');
    }
}
