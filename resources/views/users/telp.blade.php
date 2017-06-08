<div class="form-group @if($errors->has('no_telp'))has-error @endif">
	{!! Form::label('no_telp', 'Nomor Telepon', ['class' => 'control-label']) !!}
	<div id="no_telp_container">
		@if( isset($control))
			@if($control->no_telp->count() > 1 )
			  @foreach( $control->no_telp as $telp )
				  @include('users.telp_hapus', ['telp' => $telp->no_telp])
			  @endforeach
			  @include('users.telp_kosong', ['telp' => $telp->no_telp])
		    @endif
		@else
		  @include('users.telp_kosong')
		@endif
	</div>
	@if($errors->has('no_telp'))<code>{{ $errors->first('no_telp') }}</code>@endif
</div>

