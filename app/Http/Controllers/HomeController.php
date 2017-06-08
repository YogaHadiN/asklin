<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Klinik;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	  public function __construct()
    {
        $this->middleware('uncompleted', ['only' => ['index']]);
        $this->middleware('no_klinik', ['only' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$user = Auth::user();
		$portofolio = [];
		foreach ($user->klinik as $klinik) {
			foreach ($klinik->fasilitas as $fasilitas) {
				if (isset( $portofolio[ $fasilitas->jenis_fasilitas_id ]['jumlah'] )) {
					$jumlah = $portofolio[ $fasilitas->jenis_fasilitas_id ]['jumlah'] + 1;
				} else {
					$jumlah = 1;
				}
				$portofolio[ $fasilitas->jenis_fasilitas_id ] = [
					'jenis_fasilitas_id' => $fasilitas->jenis_fasilitas_id,
					'jenis_fasilitas' => $fasilitas->JenisFasilitas->jenis_fasilitas,
					'jumlah'          => $jumlah
				];
			}
		}
        return view('home', compact('user', 'portofolio'));
    }
}
