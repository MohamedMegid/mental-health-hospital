<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsTaxonomy extends Model
{
    protected $table = 'news_taxonomy';

    protected $fillable = ['news_id', 'category_id'];

    public function news_taxonomy(){
        return $this->belongsTo('App\News');
    }
}
