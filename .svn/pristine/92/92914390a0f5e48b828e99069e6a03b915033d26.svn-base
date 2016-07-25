<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VGalleryAlbums extends Model
{
    protected $table = 'video_gallery';

    protected $fillable = ['name'];

    public function videos(){
        return $this->hasMany('App\VGallery');   
    }
}
