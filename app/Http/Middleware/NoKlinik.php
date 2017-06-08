<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Yoga;

class NoKlinik
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
		if ($user->klinik->count()) {
			return $next($request);
		} else {
			$pesan = Yoga::infoFlash('Masukkan dulu klinik pertama Anda');
			return redirect('kliniks/' . $user->id . '/create')->withPesan($pesan);
		}
    }
}
