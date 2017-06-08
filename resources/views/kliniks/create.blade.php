@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Klinik Entry untuk {{ $user->nama }}
				</div>
				<div class="panel-body">
					<div class="row">
							{!! Form::open([
								'url' => 'kliniks/' . $user->id . '/create',
								"files"=> "true",
								"class" => "m-t", 
								"role"  => "form",
								'method' => 'post'
							])!!}
								@include('kliniks.form')
							{!! Form::close() !!}
					</div>
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

