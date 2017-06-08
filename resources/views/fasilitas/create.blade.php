@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Buat Fasilitas Baru di {{ $klinik->nama }}</h3>
				</div>
				<div class="panel-body">
					{!! Form::open(['url' => 'fasilitas/' . $klinik->id, 'method' => 'post', 'files' => 'true']) !!}
						@include('fasilitas.form')
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
	fasilitas	function dummySubmit(control){
			if(validatePass2(control)){
				$('#submit').click();
			}
		}
	</script>
@endsection

