<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\NoTelp;
use App\Yoga;
use App\Http\Controllers\KliniksController;
use App\Image;
use Input;
use DB;

class UsersController extends Controller
{
	public function edit($id){
		$user                = User::find($id);
		return view('users.edit', compact('user'));
	}
	public function update($id, Request $request){
		/* return dd( $request->no_telp ); */

		DB::beginTransaction();
		try {
			$messages = [
				'required' => 'Kolom :attribute Harus Diisi',
			];
			$rules = [
				'nama'          => 'required',
				'alamat'        => 'required',
				'email'         => 'required|email',
				'tanggal_lahir' => 'date_format:"d-m-Y"'
			];
			
			$validator = \Validator::make(Input::all(), $rules, $messages);
			
			if ($validator->fails())
			{
				return \Redirect::back()->withErrors($validator)->withInput();
			}

			$user                = User::find($id);
			$user->nama          = $request->nama;
			$user->alamat        = $request->alamat;
			$user->tanggal_lahir = Yoga::datePrep( $request->tanggal_lahir );
			$user->email         = $request->email;
			$user->save();


			if(Input::hasFile('image')) {
				$id = Image::nextId();
				$image                = new Image;
				$image->id         = $id;
				$image->image         = $image->imageUpload('image', 'image', $id);
				$image->imagable_type = 'App\User';
				$image->imagable_id   = $user->id;
				$image->save();
			}

			$timestamp = date('Y-m-d H:i:s');
			$telps = [];
			foreach ($request->no_telp as $k =>$no_telp) {
				if (isset( $no_telp )) {
					if ($k) {
						$primary = 1;
					} else {
						$primary = 0;
					}
					$telps[] = [
						'no_telp'         => $no_telp,
						'telponable_type' => 'App\User',
						'primary'         => $primary,
						'telponable_id'   => $user->id,
						'created_at'      => $timestamp,
						'updated_at'      => $timestamp
					];
				}
			}
			NoTelp::insert($telps);
			DB::commit();
			$pesan = Yoga::suksesFlash('Input Data Berhasil');
			return redirect('home')->withPesan($pesan);
		} catch (\Exception $e) {
			DB::rollback();
			throw $e;
		}
	}
	
}
