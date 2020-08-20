@extends('layouts.master')

@section('content')

	
	    <!-- Content Header (Page header) -->
	    	
	        <section class="content-header">
	    	          <h1>
	    	            Analisis
	    	          </h1>
	    	          <ol class="breadcrumb">
	    	            <li><a href="#"><i class="fa fa-dashboard"></i>Analisis</a></li>
	    	          </ol>
	    	        </section>
	    
	    <section class="content">
	      <div class="row">
	        <!-- /.col -->
	        <div class="col-md-12">
	          <div class="box">
	            <div id="chartKelurahan">
	            	
	            </div>
	           
	          </div>
	          <!-- /.box -->
	        </div>
	        <!-- /.col -->


	      </div>
	      <!-- /.row -->	            
	      
	    </section>
	    
	    <!-- /.content -->
	  
@stop


   @section('footer')
   	<script src="{{url('/asset/js/bootstrap-editable.min.js')}}"></script>
   	<script src="{{url('/asset/js/highcharts.js')}}"></script>
   	<script>
   	Highcharts.chart('chartKelurahan', {
       chart: {
           type: 'column'
       },
       title: {
           text: 'Laporan Data Siswa'
       },
       xAxis: {
           categories: {!!json_encode($categori)!!},
           crosshair: true
       },
       yAxis: {
           min: 0,
           title: {
               text: 'Kelurahan'
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
           name: 'Kelurahan',
           colorByPoint: true,
           data: {!!json_encode($data)!!}

       }]
   });
   		    $(document).ready(function() {
   		        $('.nilai').editable();
   		    });
   	</script>
   @stop
			
	   