<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klinik;
use App\Image;
use App\Izin;
use App\NoTelp;
use App\Yoga;
use App\JenisFasilitas;
use App\Fasilitas;
use DB;
use Input;

class FasilitasController extends Controller
{
	public function create($id){
		$klinik = Klinik::find($id);
		return view('fasilitas.create', compact(
			'klinik'
		));
	}
	public function store($id, Request $request){
		DB::beginTransaction();
		try {
			$messages = [
				'required' => ':attribute Harus Diisi',
			];
			$rules = [
				'jenis_fasilitas' => 'required',
				'nama'            => 'required',
				'alamat'          => 'required',
				'no_telp'         => 'required|array'
			];
			
			$validator = \Validator::make(Input::all(), $rules, $messages);
			
			if ($validator->fails())
			{
				return \Redirect::back()->withErrors($validator)->withInput();
			}


			$jenis_fasilitas_id = $this->jenisFasilitasId($request);

			$fas                     = new Fasilitas;
			$fas->jenis_fasilitas_id = $jenis_fasilitas_id ;
			$fas->nama               = $request->nama;
			$fas->klinik_id          = $id;
			$fas->alamat             = $request->alamat;
			$fas->save();

			$img = new Image;

			$izin                = new Izin;
			$izin->image         = $img->imageUpload('izin', 'izin', $fas->id) ;
			$izin->nomor_izin    = $request->nomor_izin;
			$izin->berakhir_izin = Yoga::datePrep( $request->berakhir_izin );
			$izin->izinable_id   = $fas->id;
			$izin->izinable_type = 'App\Fasilitas';
			$izin->save();

			$telps = [];
			$timestamp = date('Y-m-d H:i:s');
			foreach ($request->no_telp as $telp) {
				if (isset($telp)) {
					$telps[] = [
						'no_telp'         => $telp,
						'telponable_id'   => $fas->id,
						'telponable_type' => 'App\Fasilitas',
						'created_at'      => $timestamp,
						'updated_at'      => $timestamp
					];
				}
			}
			NoTelp::insert($telps);
			DB::commit();
			$pesan = Yoga::suksesFlash('Input Fasilitas Berhasil');
			return redirect('home')->withPesan($pesan);
		} catch (\Exceptior $e) {
			DB::rollback();
			throw $e;
		}
	}
	public function show($id){
		$fasilitas = Fasilitas::where('jenis_fasilitas_id', $id)->get();
		return view('fasilitas.show', compact(
			'fasilitas'
		));
	}
	public function edit($id){
		$fasilitas = Fasilitas::find($id);
		return view('fasilitas.edit', compact(
			'fasilitas'
		));
	}
	public function update($id, Request $request){
		DB::beginTransaction();
		try {
			$messages = [
				'required' => ':attribute Harus Diisi',
			];
			$rules = [
				'jenis_fasilitas' => 'required',
				'nama'            => 'required',
				'alamat'          => 'required',
				'no_telp'         => 'required|array'
			];
			
			$validator = \Validator::make(Input::all(), $rules, $messages);
			
			if ($validator->fails())
			{
				return \Redirect::back()->withErrors($validator)->withInput();
			}

			$jenis_fasilitas_id = $this->jenisFasilitasId($request);

			$fasilitas                      = Fasilitas::find($id);
			$fasilitas->jenis_fasilitas_id = $jenis_fasilitas_id;
			$fasilitas->nama               = $request->nama;
			$fasilitas->alamat             = $request->alamat;
			$fasilitas->save();


			NoTelp::where('telponable_type', 'App\Fasilitas')->where('telponable_id',  $id)->delete();

			$telps = [];
			$timestamp = date('Y-m-d H:i:s');
			
			foreach ($request->no_telp as $k => $t) {
				if (!$k) {
					$primary = 1;
				} else {
					$primary = 0;
				}
				$telps[] = [
					'no_telp'         => $t,
					'primary'         => $primary,
					'telponable_type' => 'App\Fasilitas',
					'telponable_id'   => $id,
					'created_at'      => $timestamp,
					'updated_at'      => $timestamp
				];
			}
			NoTelp::insert($telps);

			$img = new Image;

			$izin                = $fasilitas->izin;
			$izin->image         = $img->imageUpload('izin', 'izin', $id) ;
			$izin->nomor_izin    = $request->nomor_izin;
			$izin->berakhir_izin = Yoga::datePrep( $request->berakhir_izin );
			$izin->save();

			DB::commit();
			$pesan = Yoga::suksesFlash('Fasilitas Berhasil Di Update');
			return redirect('home')->withPesan($pesan);
		} catch (\Exception $e) {
			DB::rollback();
			throw $e;
		}
	}

	private function jenisFasilitasId($request){
		try {
			$jenis_fasilitas_id = JenisFasilitas::where('jenis_fasilitas', $request->jenis_fasilitas)->firstOrFail()->id;
		} catch (\Exception $e) {
			$jf       = new JenisFasilitas;
			$jf->jenis_fasilitas   = $request->jenis_fasilitas;
			$jf->save();

			$jenis_fasilitas_id = $jf->id;
		}
		return $jenis_fasilitas_id;
	}
	
	
	
	
	
}
