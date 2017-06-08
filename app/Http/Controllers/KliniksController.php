<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\NoTelp;
use App\Klinik;
use App\Yoga;
use App\Izin;
use Input;
use DB;

class KliniksController extends Controller
{
	public function create($id){
		$user = User::find($id);
		return view('kliniks.create', compact('user'));
	}
	public function store($id, Request $request){
		DB::beginTransaction();
		try {
			
			$messages = [
				'required' => ':attribute Harus Diisi',
			];
			$rules = [
				'nama'          => 'required|string|max:255',
				'alamat'        => 'required|string|max:255',
				'berakhir_izin' => 'date_format:"d-m-Y"',
				'no_telp'       => 'required|array',
				'nomor_izin'    => 'required|string|max:255'
			];
			
			$validator = \Validator::make(Input::all(), $rules, $messages);
			
			if ($validator->fails())
			{
				return \Redirect::back()->withErrors($validator)->withInput();
			}


			$klinik                = new Klinik;
			$klinik->nama          = $request->nama;
			$klinik->alamat        = $request->alamat;
			$klinik->user_id       = $id;
			$klinik->save();
			$telps = [];

			$image = new Image;

			$id                  = Izin::nextId();
			$izin                = new Izin;
			$izin->id            = $id;
			$izin->image         = $image->imageUpload('izin_image', 'izin', $id);
			$izin->izinable_type = 'App\Klinik';
			$izin->izinable_id   = $klinik->id;
			$izin->nomor_izin    = $request->nomor_izin;
			$izin->berakhir_izin = Yoga::datePrep( $request->berakhir_izin );
			$izin->save();

			$timestamp = date('Y-m-d H:i:s');
			foreach ($request->no_telp as $k => $telp) {
				if ($k) {
					$primary = 1;
				} else {
					$primary = 0;
				}
				$telps[] = [
					'no_telp'         => $telp,
					'telponable_type' => 'App\Klinik',
					'telponable_id'   => $klinik->id,
					'primary'         => $primary,
					'created_at'      => $timestamp,
					'updated_at'      => $timestamp
				];
			}
			NoTelp::insert($telps);
			$pesan = Yoga::suksesFlash('Input Klinik Baru Berhasil');
			DB::commit();
			return redirect('home')->withPesan($pesan);
		} catch (\Exception $e) {
			DB::rollback();
			throw $e;
		}
	}
}
