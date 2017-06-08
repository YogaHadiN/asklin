<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="row hide">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="form-group @if($errors->has('name'))has-error @endif">
				  {!! Form::label('name', 'Nama', ['class' => 'control-label']) !!}
					{!! Form::text('dummy-password', null,  array(
						'class'         => 'form-control'
					))!!}
					{!! Form::password('dummy-password',  array(
						'class'         => 'form-control'
					))!!}
				  @if($errors->has('name'))<code>{{ $errors->first('name') }}</code>@endif
				</div>
			</div>
		</div>
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
				<div class="form-group @if($errors->has('alamat'))has-error @endif">
					{!! Form::label('alamat', 'Alamat', ['class' => 'control-label']) !!}
					{!! Form::textarea('alamat', null, array(
						'class'         => 'form-control rq textareacustom'
					))!!}
					@if($errors->has('alamat'))<code>{{ $errors->first('alamat') }}</code>@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="form-group @if($errors->has('tanggal_lahir'))has-error @endif">
					{!! Form::label('tanggal_lahir', 'Tanggal Lahir', ['class' => 'control-label']) !!}
					{!! Form::text('tanggal_lahir', null, array(
						'class'         => 'form-control tanggal rq',
						'placeholder'         => 'Format : dd-mm-yyyy'
					))!!}
					@if($errors->has('tanggal_lahir'))<code>{{ $errors->first('tanggal_lahir') }}</code>@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				  @include('users.telp', ['control' => $user])
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="form-group @if($errors->has('password'))has-error @endif">
					{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
					{!! Form::password('password', array(
						'class'         => 'form-control',
						'placeholder'         => 'Hanya diisi kalau mau ganti password'
					))!!}
					@if($errors->has('password'))<code>{{ $errors->first('password') }}</code>@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="form-group @if($errors->has('password_confirmation'))has-error @endif">
					{!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label']) !!}
					{!! Form::password('password_confirmation', array(
						'class'         => 'form-control',
						'placeholder'         => 'Hanya diisi kalau mau ganti password'
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
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
			{!! Form::label('image', 'Foto Anggota') !!}
			{!! Form::file('image') !!}
			@if (isset($user) && isset( $user->image->image ))
					<p> {!! Html::image(asset('image/' . $user->image->image), null, ['class'=>'img-rounded upload']) !!} </p>
				@else
					<p> {!! Html::image(asset('img/photo_not_available.png'), null, ['class'=>'img-rounded upload']) !!} </p>
				@endif
			{!! $errors->first('image', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
</div>	
