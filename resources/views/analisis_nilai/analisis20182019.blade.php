@extends('layouts.master')

@section('content')

  
      <!-- Content Header (Page header) -->
        
          <section class="content-header">
                  <h1>
                    Analisis Siswa 2018/2019
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Analisis 2018/2019</a></li>
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
            categories: {!!json_encode($categori)!!},
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
            name: 'Tahun_ajaran',
            data: {!!json_encode($data)!!}
        }]
    });
    </script>
   @stop
      
     