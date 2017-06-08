@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<div class="panelLeft">
							<h3>
								Fasilitas {{ $fasilitas->first()->jenisFasilitas->jenis_fasilitas }}
							</h3>
						</div>
						<div class="panelLeft text-right">
							<h3>
								{{ $fasilitas->first()->klinik->nama }}
							</h3>
						</div>
					</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover table-condensed table-bordered">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Alamat</th>
									<th>No Telp</th>
									<th>Nomor Izin</th>
									<th>Berakhir Izin</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@if($fasilitas->count() > 0)
									@foreach($fasilitas as $f)
										<tr>
											<td>{{ $f->nama }}</td>
											<td>{{ $f->alamat }}</td>
											<td>
												<ul>
													@foreach( $f->no_telp as $notelp )
														<li>{{ $notelp->no_telp }}</li>
													@endforeach
												</ul>
											</td>
											<td>{{ $f->izin->nomor_izin }}</td>
											<td>{{ $f->izin->berakhir_izin }}</td>
											<td> <a class="btn btn-info btn-sm btn-block" href="{{ url('fasilitas/' . $f->id . '/edit') }}">Edit</a> </td>
										</tr>
									@endforeach
								@else
									<tr>
										<td class="text-center" colspan="5">Tidak Ada Data Untuk Ditampilkan :p</td>
									</tr>
								@endif
							</tbody>
						</table>
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
	fasilitas	function dummySubmit(control){
			if(validatePass2(control)){
				$('#submit').click();
			}
		}
	</script>
@endsection

