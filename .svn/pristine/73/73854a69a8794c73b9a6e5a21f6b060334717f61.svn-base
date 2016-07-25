<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PGalleryImages extends Model
{
    protected $table = 'pgallery_images';

    protected $fillable = ['pgallery_id', 'images'];

    public function photos(){
        return $this->belongsTo('App\PGallery');
    }
}
