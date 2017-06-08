                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
					{!! Form::open(['url' => route('login')]) !!}
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
                        			{!! Form::password('password',array(
                        				'class'         => 'form-control rq'
                        			))!!}
                        		  @if($errors->has('password'))<code>{{ $errors->first('password') }}</code>@endif
                        		</div>
                        	</div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        		<button class="btn btn-success btn-block" type="button" onclick='dummySubmit(this);return false;'>Submit</button>
                        		{!! Form::submit('Submit', ['class' => 'btn btn-success hide', 'id' => 'submit']) !!}
                        	</div>

                        </div>
                    
					{!! Form::close() !!}
					
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}"></form>
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
