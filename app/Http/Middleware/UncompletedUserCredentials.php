<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Yoga;

class UncompletedUserCredentials
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

		$user = Auth::user();
		$nama          = $user->nama;
		$alamat        = $user->alamat;
		$tanggal_lahir = $user->tanggal_lahir;
		$count_no_telp = $user->no_telp->count();
		if (
			empty($nama) ||
			empty( $alamat ) ||
			empty( $tanggal_lahir )
		) {
			$kosong = [];
			if (empty($nama)) {
				$kosong[] = 'nama';
			}
			if (empty($alamat)) {
				$kosong[] = 'alamat';
			}
			if (empty($tanggal_lahir)) {
				$kosong[] = 'tanggal_lahir';
			}
			if ( $count_no_telp < 1 ) {
				$kosong[] = 'nomor telepon';
			}
			$pesan = '<p>Mohon isi dulu Data yang belum lengkap</p>';
			$pesan .= 'Terdiri Dari';
			$pesan .= '<ul>';
			foreach ($kosong as $k) {
				$pesan .= '<li>' . $k . '</li>' ;
			}
			$pesan .= '</ul>';
			$pesan = Yoga::infoFlash($pesan);
			return redirect('users/' . $user->id . '/edit')->withPesan($pesan);	
		}
        return $next($request);
    }
}
