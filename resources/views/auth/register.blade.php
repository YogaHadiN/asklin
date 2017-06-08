@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
					{!! Form::open(['url' => route('register')]) !!}
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group @if($errors->has('nama'))has-error @endif">
							  {!! Form::label('nama', 'Nama', ['class' => 'control-label']) !!}
								{!! Form::text('nama', null, array(
									'class'         => 'form-control rq'
								))!!}
							  @if($errors->has('nama'))<code>{{ $errors->first('nama') }}</code>@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group @if($errors->has('email'))has-error @endif">
							  {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
								{!! Form::text('email', null, array(
									'class'         => 'form-control rq'
								))!!}
							  @if($errors->has('email'))<code>{{ $errors->first('email') }}</code>@endif
							</div>
						</div>
					</div>
                    <div class="row">
                    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    		<div class="form-group @if($errors->has('password'))has-error @endif">
                    		  {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    			{!! Form::password('password', array(
                    				'class'         => 'form-control rq'
                    			))!!}
                    		  @if($errors->has('password'))<code>{{ $errors->first('password') }}</code>@endif
                    		</div>
                    	</div>
                    </div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group @if($errors->has('password_confirmation'))has-error @endif">
							  {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label']) !!}
								{!! Form::password('password_confirmation',array(
									'class'         => 'form-control rq'
								))!!}
							  @if($errors->has('password_confirmation'))<code>{{ $errors->first('password_confirmation') }}</code>@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<button class="btn btn-success btn-block" type="button" onclick='dummySubmit(this);return false;'>Submit</button>
							{!! Form::submit('Submit', ['class' => 'btn btn-success hide', 'id' => 'submit']) !!}
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<a class="btn btn-danger btn-block" href="{{ url('laporans') }}">Cancel</a>
						</div>
					</div>

					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
	<script type="text/javascript" charset="utf-8">
		function dummySubmit(control){
			if(validatePass2(control)){
				$('#submit').click();
			}
		}
	</script>
@endsection
