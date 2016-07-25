<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HitsCounter extends Model
{
    public $attributes = [ 'hits' => 0 ];

    protected $fillable = [ 'hits', 'visit_date' ];
    protected $table = 'hits_counter';

    public static function boot() {
        // Any time the instance is updated (but not created)
        static::saving( function ($tracker) {
            $tracker->visit_time = date('H:i:s');
            $tracker->hits++;
        } );
    }

    public static function hit() {
    	$tracker->visit_time = date('H:i:s');
        $tracker->hits = 1;
        static::firstOrCreate([
                  'date' => date('Y-m-d'),
              ])->save();
    }
}
