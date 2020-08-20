@extends('layouts.master')

@section('content')

	
	    <!-- Content Header (Page header) -->
	    	
	        <section class="content-header">
	    	          <h1>
	    	            Analisis Siswa 2015/2016
	    	          </h1>
	    	          <ol class="breadcrumb">
	    	            <li><a href="#"><i class="fa fa-dashboard"></i>Analisis 2015/2016</a></li>
	    	          </ol>
	    	  </section>
	    
	    <section class="content">
	      <div class="row">
	        <!-- /.col -->
	        <div class="col-md-12">
	          <div class="box">
	            <div id="chartNilai">
	            	
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
        Highcharts.chart('chartNilai', {
            chart: {
                type: 'area'
            },
            title: {
                text: 'Historic and Estimated Worldwide Population Growth by Region'
            },
            subtitle: {
                text: 'Source: Wikipedia.org'
            },
            xAxis: {
                categories: ['1750', '1800', '1850', '1900', '1950', '1999', '2050'],
                tickmarkPlacement: 'on',
                title: {
                    enabled: false
                }
            },
            yAxis: {
                title: {
                    text: 'Billions'
                },
                labels: {
                    formatter: function () {
                        return this.value / 1000;
                    }
                }
            },
            tooltip: {
                split: true,
                valueSuffix: ' millions'
            },
            plotOptions: {
                area: {
                    stacking: 'normal',
                    lineColor: '#666666',
                    lineWidth: 1,
                    marker: {
                        lineWidth: 1,
                        lineColor: '#666666'
                    }
                }
            },
            series: [{
                name: 'X',
                data: [502, 635, 809, 947, 1402, 3634, 5268]
            }, {
                name: 'XI',
                data: [106, 107, 111, 133, 221, 767, 1766]
            }, {
                name: 'XII',
                data: [163, 203, 276, 408, 547, 729, 628]
            }]
        });
                 
   	</script>
   @stop
			
	   