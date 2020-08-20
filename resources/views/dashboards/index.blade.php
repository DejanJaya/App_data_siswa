@extends('layouts.master')

@section('content')

	
	    <!-- Content Header (Page header) -->
	    	
	        <section class="content-header">
	    	          <h1>
	    	            Dashboard
	    	          </h1>
	    	          <ol class="breadcrumb">
	    	            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
	    	          </ol>
	    	        </section>
	    
	    <section class="content">
	      <div class="row">
	        <!-- /.col -->
	        <div class="col-md-6">
	          <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Ranking 5 Besar</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body no-padding">
	             	<table class="table table-bordered">
	                  <thead>
	                  	<tr>
	                  		<th>RANKING</th>
	                  		<th>NAMA</th>
	                  		<th>NILAI</th>
	                  	</tr>
	                  </thead>
	                 <tbody>
	                 	@php
	                 		$ranking =1;
	                 	@endphp
	                 	@foreach(ranking5Besar() as $s)
	                 	<tr>
	                 		<td>{{$ranking}}</td>
	                 		<td>{{$s->nama_lengkap()}}</td>
	                 		<td>{{$s->rataRataNilai}}</td>
	                 	</tr>
	                 	@php
	                 		$ranking++;
	                 	@endphp
	                 	@endforeach
	                 </tbody>
	                </table>
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->
	        </div>
	        <!-- /.col -->

	        <div class="col-md-3 col-xs-6">
	          <div class="small-box bg-aqua">
	            <div class="inner">
	              <h3><i class="fa fa-graduation-cap"></i> {{totalGuru()}}</h3>
	              <p>Tenaga Pendidik</p>
	            </div>
	            <div class="icon">
	              <i></i>
	            </div>
	            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>

	        <div class="col-md-3 col-xs-6">
	          <div class="small-box bg-green">
	            <div class="inner">
	              <h3><i class="fa fa-users"></i> {{totalSiswa()}}<sup style="font-size: 20px"></sup></h3>
	              <p>Siswa</p>
	            </div>
	            <div class="icon">
	              <i></i>
	            </div>
	            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>

	      </div>
	      <!-- /.row -->

	            
	      
	    </section>
	    
	    <!-- /.content -->
	  
@stop


   
			
	   