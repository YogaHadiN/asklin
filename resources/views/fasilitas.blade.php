
@if( $kl->$model->count() < 1 )
	<div class="alert alert-danger">
		<h3>Data {{ $dokter }} Belum Ada</h3>
		<p>Silahkan masukkan data {{ $dokter }} <a href="{{ url($url. '/' . $kl->id . '/create') }}">Klik Disini</a> </p>
	</div>
@else

@endif
