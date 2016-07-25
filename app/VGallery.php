<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VGallery extends Model
{
    protected $table = 'vgallery_videos';

    protected $fillable = ['vgallery_id', 'name', 'link', 'summary'];

    public function videos(){
        return $this->belongsTo('App\VGalleryAlbums');
    }
}
