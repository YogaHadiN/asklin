@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit User</h3>
				</div>
					<div class="panel-body">
						{!! Form::model($user, [
							'url'          => 'users/' . $user->id,
							'method'       => 'put',
							'autocomplete' => 'false',
							'files' => 'true'
						]) !!}
							@if( $user->no_telp->count() )
								@include('users.form', [
									'telp' => $user->no_telp->first()->no_telp
								])
							@else
								@include('users.form', [
									'telp' => ''
								])
							@endif
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

