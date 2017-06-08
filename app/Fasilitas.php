<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
	public function jenisFasilitas(){
		return $this->belongsTo('App\JenisFasilitas');
	}
	public function klinik(){
		return $this->belongsTo('App\Klinik');
	}

    protected $morphClass = 'App\Fasilitas';
    public function no_telp(){
        return $this->morphMany('App\NoTelp', 'telponable');
    }

    public function izin(){
        return $this->morphOne('App\Izin', 'izinable');
    }
}
