<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['title', 'summary', 'subject', 'basic_photo', 'importance', 'category_id', 'visits'];

    public function news(){
        return $this->hasMany('App\NewsImages');   
    }

    public function comments(){
        return $this->hasMany('App\Comments');   
    }

    public function news_taxonomy(){
        return $this->hasOne('App\NewsTaxonomy');   
    }
}