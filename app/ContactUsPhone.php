<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsPhone extends Model
{
    protected $table = 'contact_us_phones';
    protected $fillable = ['contact_id', 'phone'];
}
