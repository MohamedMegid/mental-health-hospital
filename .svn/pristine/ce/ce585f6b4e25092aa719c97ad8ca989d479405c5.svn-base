<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsImages extends Model
{
    protected $table = 'news_images';

    protected $fillable = ['news_id', 'images'];

    public function news(){
        return $this->belongsTo('App\News');
    }
}
