<div class="input-group">
	@if( isset( $telp ) )
	{!! Form::text('no_telp[]', $telp, array(
		'class'         => 'form-control telpon_input rq'
	))!!}
	@else
	{!! Form::text('no_telp[]', null, array(
		'class'         => 'form-control telpon_input rq'
	))!!}
	@endif
	 <div class="input-group-btn">
		 <button class="btn btn-success btn-block" type="button" onclick="tambahTelpLagi(this);return false;">
			 <strong>
				 <span class="glyphicon glyphicon-plus"></span>
			 </strong>
		 </button>
	 </div>
</div>
