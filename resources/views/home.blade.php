@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				
					<h1>Dashboard</h1>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
							@if( isset($user->image) )
								<img src="{{ url('img/image/'. $user->image->image) }}" alt="" />
							@else
								<img src="{{ url('img/not_found.jpg') }}" alt="" />
							@endif
						</div>
						<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<strong>
										<h1>{{ $user->nama }}</h1>
									</strong>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
									<a class="btn btn-info btn-lg" href="{{ url('users/' . $user->id . '/edit') }}">
										<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
										Edit
									</a>
								</div>
							</div>
							<div class="table-responsive">
								<table class="table table-hover table-condensed table-bordered">
									<tbody>
										<tr>
											<th class="text-left">No Id ASKLIN</th>
											<td>{{ $user->asklin_id }}</td>
										</tr>
										<tr>
											<th class="text-left">Tanggal Lahir</th>
											<td>{{ $user->tanggal_lahir->format('d M Y') }}</td>
										</tr>
										<tr>
											<th class="text-left">Email</th>
											<td>{{ $user->email }}</td>
										</tr>
										<tr>
											<th class="text-left">Alamat</th>
											<td>{{ $user->alamat }}</td>
										</tr>
										<tr>
											<th class="text-left">Telepon</th>
											<td>
												<ul>
													@foreach( $user->no_telp as $t )
														<li>{{ $t->no_telp }}</li>
													@endforeach
												</ul>
											
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="panel panel-info">
								<div class="panel-heading">
								
									<div class="panelLeft">
										<h3>Daftar Klinik</h3>
									</div>
									<div class="panelRight">
										<a class="btn btn-success btn-sm" href="{{ url('kliniks/' . $user->id . '/create') }}">
											<i class="fa fa-plus" aria-hidden="true"></i>
											 Klinik Baru
										</a>
									</div>
								</div>
								<div class="panel-body">
									<div class="panel-group" id="daftar_klinik_panel" role="tablist" aria-multiselectable="true">
										@foreach( $user->klinik as $k => $kl )
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="daftar_klinik_panel_heading{{ $k }}">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#daftar_klinik_panel" href="#daftar_klinik_panel_collapse{{ $k }}" aria-expanded="true" aria-controls="daftar_klinik_panel_collapse{{ $k }}"
									
														   @if( !$k )
															   class="collapsed" 
														   @endif
														>
															<div class="panelLeft">
																<h3> {{ $kl->nama }} </h3>
															</div>
														</a>
														<div class="panelRight"> 
															<a class="btn btn-info btn-sm" href="{{ url('kliniks/' . $user->id . '/edit') }}"> 
																<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
																Edit
															</a>
															<a class="btn btn-danger btn-sm" href="{{ url('fasilitas/' . $user->id . '/create') }}">
																<i class="fa fa-close" aria-hidden="true"></i>
																Hapus
															</a>
														</div>
													</h4>
												</div>
												<div id="daftar_klinik_panel_collapse{{ $k }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="daftar_klinik_panel_heading{{ $k }}">
													<div class="panel-body">
														<div class="row">
															<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
																<div class="table-responsive">
																	<table class="table table-hover table-condensed table-bordered">
																		<tbody>
																			<tr>
																				<th class="text-left">Alamat</th>
																				<td>{{ $kl->alamat }}</td>
																			</tr>
																			<tr>
																				<th class="text-left">No Telp</th>
																				<td>
																					<ul>
																						@foreach($kl->no_telp as $telp)	
																							<li>{{ $telp->no_telp }}</li>
																						@endforeach
																					</ul>
																				</td>
																			</tr>
																			<tr>
																				<th class="text-left">Nomor Izin Klinik</th>
																				<td>{{ $kl->izin->nomor_izin }}</td>
																			</tr>
																			<tr>
																				<th class="text-left">Berakhir Izin</th>
																				<td>{{ $kl->izin->berakhir_izin->format('d M y') }}</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																<div class="panel panel-primary">
																	<div class="panel-heading">
																		<h3 class="panel-title">
																			<div class="panelLeft">
																				Daftar Fasilitas {{ $kl->nama }}
																			</div>	
																			<div class="panelRight">
																				<a class="btn btn-success btn-sm" href="{{ url('fasilitas/' . $kl->id . '/create') }}">
																					<i class="fa fa-plus" aria-hidden="true"></i>
																					Fasilitas	
																				</a>
																			</div>
																		</h3>
																	</div>
																	<div class="panel-body">
																		<div class="panel-group" id="daftar_fasilitas" role="tablist" aria-multiselectable="true">
																			@foreach( $kl->portofolio as $k => $fasilitas )
																				<div class="panel panel-default">
																					<div class="panel-heading" role="tab" id="heading{{ $k }}">
																						<h4 class="panel-title">
																							<a role="button" data-toggle="collapse" data-parent="#daftar_fasilitas" href="#collapse{{ $k }}" aria-expanded="true" aria-controls="collapse{{ $k }}"

																																				   @if( !$k )
																																					   class="collapsed" 
																																				   @endif
											  >
											  {{ $fasilitas[0]->jenisFasilitas->jenis_fasilitas }}
											  Sebanyak 
											  {{ count($fasilitas)}}
																							</a>
																						</h4>
																					</div>
																					<div id="collapse{{ $k }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $k }}">
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
																										@if(count($fasilitas) > 0)
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
																			@endforeach
																		</div>

																	</div>
																</div>
															</div>
														</div>
														<br />
														<div class="row">
															<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																<div class="panel panel-warning">
																	<div class="panel-heading">
																		<h3 class="panel-title">
																			<div class="panelLeft">
																				Daftar Mitra {{ $kl->nama }}
																			</div>	
																			<div class="panelRight">
																				<a class="btn btn-success btn-sm" href="{{ url('fasilitas/' . $kl->id . '/create') }}">
																					<i class="fa fa-plus" aria-hidden="true"></i>
																					Mitra	
																				</a>
																			</div>
																		</h3>
																	</div>
																	<div class="panel-body">
																		<div class="panel-group" id="daftar_fasilitas" role="tablist" aria-multiselectable="true">
																			@foreach( $kl->portofolio as $k => $fasilitas )
																				<div class="panel panel-default">
																					<div class="panel-heading" role="tab" id="heading{{ $k }}">
																						<h4 class="panel-title">
																							<a role="button" data-toggle="collapse" data-parent="#daftar_fasilitas" href="#collapse{{ $k }}" aria-expanded="true" aria-controls="collapse{{ $k }}"

																																				   @if( !$k )
																																					   class="collapsed" 
																																				   @endif
											  >
											  {{ $fasilitas[0]->jenisFasilitas->jenis_fasilitas }}
											  Sebanyak 
											  {{ count($fasilitas)}}
																							</a>
																						</h4>
																					</div>
																					<div id="collapse{{ $k }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $k }}">
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
																										@if(count($fasilitas) > 0)
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
																			@endforeach
																		</div>

																	</div>
																</div>
															</div>
														</div>
														<br />
														<div class="row">
															<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																<div class="panel panel-success">
																	<div class="panel-heading">
																		<h3 class="panel-title">
																			<div class="panelLeft">
																				Daftar Pesaing {{ $kl->nama }}
																			</div>	
																			<div class="panelRight">
																				<a class="btn btn-primary btn-sm" href="{{ url('fasilitas/' . $kl->id . '/create') }}">
																					<i class="fa fa-plus" aria-hidden="true"></i>
																					Pesaing
																				</a>
																			</div>
																		</h3>
																	</div>
																	<div class="panel-body">
																		<div class="panel-group" id="daftar_fasilitas" role="tablist" aria-multiselectable="true">
																			@foreach( $kl->portofolio as $k => $fasilitas )
																				<div class="panel panel-default">
																					<div class="panel-heading" role="tab" id="heading{{ $k }}">
																						<h4 class="panel-title">
																							<a role="button" data-toggle="collapse" data-parent="#daftar_fasilitas" href="#collapse{{ $k }}" aria-expanded="true" aria-controls="collapse{{ $k }}"

																																				   @if( !$k )
																																					   class="collapsed" 
																																				   @endif
											  >
											  {{ $fasilitas[0]->jenisFasilitas->jenis_fasilitas }}
											  Sebanyak 
											  {{ count($fasilitas)}}
																							</a>
																						</h4>
																					</div>
																					<div id="collapse{{ $k }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $k }}">
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
																										@if(count($fasilitas) > 0)
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
																			@endforeach
																		</div>

																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





@endsection
