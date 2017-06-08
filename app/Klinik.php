<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klinik extends Model
{
    public function fasilitas(){
        return $this->hasMany('App\Fasilitas');
    }

	public function user(){
		return $this->belongsTo('App\User');
	}

    protected $morphClass = 'App\Klinik';
    public function no_telp(){
        return $this->morphMany('App\NoTelp', 'telponable');
    }
    public function izin(){
        return $this->morphOne('App\Izin', 'izinable');
    }
    public function getPortofolioAttribute(){
		$fasilitas = $this->fasilitas;
		$rawportofolio = [];
		foreach ($fasilitas as $fas) {
			$rawportofolio[$fas->jenis_fasilitas_id][] = $fas; 
		}
		$portofolio = [];
		foreach ($rawportofolio as $port) {
			$portofolio[] = $port;
		}
		return $portofolio;
    }
	
}
