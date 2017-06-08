<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group @if($errors->has('nama'))has-error @endif">
			  {!! Form::label('nama', 'Nama Klinik', ['class' => 'control-label']) !!}
				{!! Form::text('nama', null, array(
					'class'         => 'form-control rq'
				))!!}
			  @if($errors->has('nama'))<code>{{ $errors->first('nama') }}</code>@endif
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
			@include('users.telp')
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group @if($errors->has('nomor_izin'))has-error @endif">
			  {!! Form::label('nomor_izin', 'Nomor Izin', ['class' => 'control-label']) !!}
				{!! Form::text('nomor_izin', null, array(
					'class'         => 'form-control rq'
				))!!}
			  @if($errors->has('nomor_izin'))<code>{{ $errors->first('nomor_izin') }}</code>@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group @if($errors->has('berakhir_izin'))has-error @endif">
			  {!! Form::label('berakhir_izin', 'Berakhir Izin', ['class' => 'control-label']) !!}
				{!! Form::text('berakhir_izin', null, array(
					'class'         => 'form-control tanggal'
				))!!}
			  @if($errors->has('berakhir_izin'))<code>{{ $errors->first('berakhir_izin') }}</code>@endif
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
	<div class="form-group{{ $errors->has('izin_image') ? ' has-error' : '' }}">
		{!! Form::label('izin_image', 'Gambar Izin Klinik') !!}
		{!! Form::file('izin_image') !!}
			@if (isset($klinik) && $klinik->izin_image)
				<p> {!! Html::image(asset($klinik->izin_image), null, ['class'=>'img-rounded upload']) !!} </p>
			@else
				<p> {!! Html::image(asset('img/photo_not_available.png'), null, ['class'=>'img-rounded upload']) !!} </p>
			@endif
		{!! $errors->first('izin_image', '<p class="help-block">:message</p>') !!}
	</div>
</div>
