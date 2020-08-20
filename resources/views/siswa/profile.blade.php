@extends('layouts.master')

@section('header')
<link href="{{url('/asset/css/bootstrap-editable.css')}}" rel="stylesheet"/>
@stop
@section('content')
	<section class="content-header">
			          <h1>
			           Profile Siswa
			          </h1>
			          <ol class="breadcrumb">
			            <li><a href="#"><i class="fa fa-home"></i>Profile Siswa</a></li>
			          </ol>
			        </section>

			
				<section class="content">
					@if(session('sukses'))
					<div class="alert alert-success" role="alert">
					  {{session('sukses')}}
					</div>
					@endif

					@if(session('error'))
					<div class="alert alert-danger" role="alert">
					  {{session('error')}}
					</div>
					@endif
					
				<div class="row">
					
				  <div class="col-md-3">

				    <!-- Profile Image -->
				    <div class="box box-primary">
				      <div class="box-body box-profile">
				        <img class="profile-user-img img-responsive img-circle" src="{{$siswa->getAvatar()}}" alt="User profile picture">

				        <h3 class="profile-username text-center">{{$siswa->nama_depan}}</h3>

				        <p class="text-muted text-center">Software Engineer</p>

				        <ul class="list-group list-group-unbordered">
				          <li class="list-group-item">
				            <b>Mata Pelajaran</b> <a class="pull-right">{{$siswa->mapel->count()}}</a>
				          </li>
				          <li class="list-group-item">
				            <b>Rata-rata Nilai</b> <a class="pull-right">{{$siswa->rataRataNilai()}}</a>
				          </li>
				          <li class="list-group-item">
				            
				          </li>
				        </ul>

				        
				      </div>
				      <!-- /.box-body -->
				    </div>
				    <!-- /.box -->

				    <!-- About Me Box -->
				    <div class="box box-primary">
				      <div class="box-header with-border">
				        <h3 class="box-title">Data Diri</h3>
				      </div>
				      <!-- /.box-header -->
				      <div class="box-body">
				        <strong><i class="fa fa-book margin-r-5"></i> Jenis Kelamin</strong>

				        <p class="text-muted">
				          {{$siswa->jenis_kelamin}}
				        </p>

				        <hr>

				        <strong><i class="fa fa-map-marker margin-r-5"></i> Agama</strong>

				        <p class="text-muted">{{$siswa->agama}}</p>

				        <hr>


				        <strong><i class="fa fa-file-text-o margin-r-5"></i> Alamat</strong>

				        <p>{{$siswa->alamat}}</p>
				        <a href="{{url('/siswa/edit/'.$siswa->id)}}" class="btn btn-warning btn-block"><b>Edit Profile</b></a>
				      </div>
				      <!-- /.box-body -->
				    </div>
				    <!-- /.box -->
				  </div>
				  <!-- /.col -->
				  <div class="col-md-9">
				   				 
				              <div class="box">
				                <div class="box-header">

				                  <h3 class="box-title">Mata Pelajaran</h3>
				                  <div class="pull-right">
				                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				                		  Tambah Nilai
				                		</button>
				                		</div>
				                </div>
				                <!-- /.box-header -->
				                <div class="box-body table-responsive no-padding">
				                  <table class="table table-hover">
				                    <thead>
				                    	<tr>
				                    		<th>KODE</th>
				                    		<th>NAMA</th>
				                    		<th>SEMESTER</th>
				                    		<th>NILAI</th>
				                    		<th>GURU</th>
				                    		<th>AKSI</th>
				                    	</tr>
				                    </thead>
				                    <tbody>
				                    	@foreach($siswa->mapel as $mapel)
				                    	<tr>		                
				                    		<td>{{$mapel->kode}}</td>
				                    		<td>{{$mapel->nama}}</td>
				                    		<td>{{$mapel->semester}}</td>
				                    		<td><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="{{url('/api/siswa/editnilai/'.$siswa->id)}}" data-title="Masukan Nilai">{{$mapel->pivot->nilai}}</a></td>
				                    		<td><a href="{{url('/guru/profile/'.$mapel->guru_id)}}">{{$mapel->guru->nama}}</a></td>
				                    		<td><a href="{{url('/siswa/deletenilai/'.$siswa->id,$mapel->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Delete</a></td>
				                    	</tr>
				                    	@endforeach
				                    </tbody>
				              	  </table>
				                </div>
				                <!-- /.box-body -->
				              </div>
				              <div class="box">
									<div id="chartNilai">
										
									</div>
								</div>
				              <!-- /.box -->
				            
				  </div>

				  <!-- /.col -->
				</div>
			
			<!-- END MAIN CONTENT -->
		

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	       	 <form action="{{ url('/siswa/addnilai/'.$siswa->id) }}" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
				    <label for="mapel">Mata Pelajaran</label>
				    <select class="form-control" id="mapel" name="mapel">
				      @foreach($matapelajaran as $mp)
				      	<option value="{{$mp->id}}">{{$mp->nama}}</option>
				      @endforeach
				    </select>
				</div>
				<div class="form-group{{$errors->has('nilai') ? ' has-error' : ''}}">
					<label for="exampleInputEmail1">Nilai</label>
					<input name="nilai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai" value="{{old('nilai')}}">
					@if($errors->has('nilai'))
						<span class="help-block">{{$errors->first('nilai')}}</span>
					 @endif
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary">Simpan</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
</section>

@stop

@section('footer')
	<script src="{{url('/asset/js/bootstrap-editable.min.js')}}"></script>
	<script src="{{url('/asset/js/highcharts.js')}}"></script>
	<script>
	Highcharts.chart('chartNilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Nilai Siswa'
    },
    xAxis: {
        categories: {!!json_encode($categories)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Nilai',
        colorByPoint: true,
        data: {!!json_encode($data)!!}

    }]
});
		    $(document).ready(function() {
		        $('.nilai').editable();
		    });
	</script>
@stop


