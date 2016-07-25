<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PGallery extends Model
{
    protected $table = 'photo_gallery';

    protected $fillable = ['name'];

    public function photos(){
        return $this->hasMany('App\PGalleryImages');   
    }
}
