<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';

    protected $fillable = ['news_id', 'comment', 'status'];

    public function comments(){
        return $this->belongsTo('App\News');
    }
}
