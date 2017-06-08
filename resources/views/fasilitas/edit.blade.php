@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit fasilitas di {{ $fasilitas->klinik->nama }}</h3>
				</div>
				<div class="panel-body">
					{!! Form::model($fasilitas, ['url' => 'fasilitas/' . $fasilitas->id, 'method' => 'put', 'files' => 'true']) !!}
						@include('fasilitas.form', [
							'jenis_fasilitas' => $fasilitas->jenisFasilitas->jenis_fasilitas,
							'nomor_izin'      => $fasilitas->izin->nomor_izin,
							'control'      => $fasilitas,
							'berakhir_izin'   => $fasilitas->izin->berakhir_izin->format('d-m-Y')
						])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')
    <script src="{{ asset('js/telp.js') }}"></script>
	<script type="text/javascript" charset="utf-8">
		function dummySubmit(control){
			if(validatePass2(control)){
				$('#submit').click();
			}
		}
	</script>
@endsection

