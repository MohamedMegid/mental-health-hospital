<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contactus_frontend';
    protected $fillable = ['name', 'mail', 'mobile', 'address', 'message', 'reply_status'];

    public function contacts(){
        return $this->hasOne('App\ContactusReply');   
    }
}
