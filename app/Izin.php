<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Izin;

class Izin extends Model
{
	protected $dates = ['berakhir_izin'];

	public static function nextId(){
		try {
			return (int )Izin::orderBy('id', 'desc')->first()->id + 1;
		} catch (\Exception $e) {
			return '1';
		}
	}
    protected $morphClass = 'App\Izin';
	public function izinable(){
		return $this->morphto();
	}


    public function image(){
        return $this->morphOne('App\Image', 'imagable');
    }
}
