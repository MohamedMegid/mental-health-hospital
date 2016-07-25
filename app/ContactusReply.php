<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactusReply extends Model
{
    protected $table = 'contactus_reply';
    protected $fillable = ['contact_id', 'reply_message'];

    public function contacts(){
        return $this->belongsTo('App\ContactUs');
    }
}
