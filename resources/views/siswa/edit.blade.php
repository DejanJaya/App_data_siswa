@extends('layouts.master')

@section('content')
	<section class="content-header">
			          <h1>
			           Edit Profile
			          </h1>
			          <ol class="breadcrumb">
			            <li><a href="#"><i class="fa fa-home"></i>Edit Profile</a></li>
			          </ol>
			        </section>
		
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-primary">
								<div class="box-header">
									<h3 class="box-title">Inputs</h3>
								</div>
								<div class="box-body">
									<form action="{{ url('/siswa/update/'.$siswa->id) }}" method="POST" enctype="multipart/form-data">
									        	{{csrf_field()}}
											  <div class="form-group">
											    <label for="exampleInputEmail1">Nama Depan</label>
											    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
											  </div>
											  <div class="form-group">
											    <label for="exampleInputEmail1">Nama Belakang</label>
											    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
											  </div>
											  <div class="form-group">
											    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
											    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
											      <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
											      <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
											    </select>
											  </div>
											  <div class="form-group">
											    <label for="exampleInputEmail1">Agama</label>
											    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
											  </div>
											  <div class="form-group">
											    <label for="exampleFormControlTextarea1">Alamat</label>
											    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea>
											  </div>
											  <div class="form-group">
											    <label for="exampleFormControlTextarea1">Avatar</label>
											    <input type="file" name="avatar" class="form-control">
											  </div>
											  <button type="submit" class="btn btn-warning">Update</button>
									</form>
								</div>
							</div>
					</div>
				</div>
			
		</section>
	
@stop
@section('content1')

		<h1>Edit Data Siswa</h1>
		@if(session('sukses'))
		<div class="alert alert-success" role="alert">
		  {{session('sukses')}}
		</div>
		@endif
		<div class="row">
			<div class="col-lg-12">
				<form action="{{ url('/siswa/update/'.$siswa->id) }}" method="POST">
				        	{{csrf_field()}}
						  <div class="form-group">
						    <label for="exampleInputEmail1">Nama Depan</label>
						    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Nama Belakang</label>
						    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
						  </div>
						  <div class="form-group">
						    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
						    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
						      <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
						      <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
						    </select>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Agama</label>
						    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
						  </div>
						  <div class="form-group">
						    <label for="exampleFormControlTextarea1">Alamat</label>
						    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea>
						  </div>
						  <button type="submit" class="btn btn-warning">Update</button>
				</form>
			</div>
		</div>
@endsection
	