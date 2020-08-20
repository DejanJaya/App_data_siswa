@extends('layouts.master')

@section('header')
<link href="{{url('/asset/css/bootstrap-editable.css')}}" rel="stylesheet"/>
@stop
@section('content')


			<section class="content-header">
			          <h1>
			           Profile Guru
			          </h1>
			          <ol class="breadcrumb">
			            <li><a href="#"><i class="fa fa-home"></i>Profile Guru</a></li>
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
			        <img class="profile-user-img img-responsive img-circle" src="" alt="User profile picture">

			        <h3 class="profile-username text-center">{{$guru->nama}}</h3>

			        <p class="text-muted text-center">Guru</p>

			        <hr>
			      </div>
			      <!-- /.box-body -->
			    </div>
			    <!-- /.box -->

			  </div>
			  <!-- /.col -->
			  <div class="col-md-9">
			   				 
			              <div class="box">
			                <div class="box-header">

			                  <h3 class="box-title">Mata Pelajaran yang diajar oleh guru {{$guru->nama}}</h3>
			                  
			                </div>
			                <!-- /.box-header -->
			                <div class="box-body table-responsive no-padding">
			                  <table class="table table-hover">
			                    <thead>
			                    	<tr>
			                    		<th>NAMA</th>
			                    		<th>SEMESTER</th>
			                    	</tr>
			                    </thead>
			                    <tbody>
			                    	@foreach($guru->mapel as $mapel)
			                    	<tr>
			                    		<td>{{$mapel->nama}}</td>
			                    		<td>{{$mapel->semester}}</td>
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
		

	</section>

@stop

@section('footer')
	
@stop