@extends('layouts.master')

@section('content')

	
	    <!-- Content Header (Page header) -->
	    	
<section class="content-header">
	 <h1>
	 	Nilai Siswa
	 </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i>Nilai Siswa</a></li>
	  </ol>
</section>

<section class="content">
<div class="row">
  <div class="col-md-12">
   				 
              <div class="box">
                <div class="box-header">

                  <h3 class="box-title">Data Nilai</h3>
                  <div class="pull-right">
                    <a href="" type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#importNilai">Import Excel</a>
                	</div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <thead>
                    	<tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>kelas</th>
                            <th>jenis kelamin</th>
                            <th>tahun pelajaran</th>
                            <th>fisika</th>
                            <th>PKN</th>
                            <th>B jepang</th>
                            <th>B.Inggris</th>
                            <th>MTK</th>
                            <th>B.indo</th>
                            <th>kejuruan khusus</th>
                    	</tr>
                    </thead>
                    <tbody>
                      @php
                        $no =1;
                      @endphp
                    @foreach($nilai as $n)
                    	<tr>
                      <td>{{$no}}</td>
                    	<td>{{$n->siswa->nama_depan}}</td>
                      <td>{{$n->kelas->nama_kelas}}</td>
                      <td>{{$n->siswa->jenis_kelamin}}</td>
                      <td>{{$n->tahun_ajaran}}</td>
                      <td>{{$n->nilai_fisika}}</td>
                      <td>{{$n->nilai_pkn}}</td>
                      <td>{{$n->nilai_bjepang}}</td>
                      <td>{{$n->nilai_binggris}}</td>
                      <td>{{$n->nilai_mtk}}</td>
                      <td>{{$n->nilai_bindo}}</td>
                      <td>{{$n->nilai_kejuruan}}</td>
                    	</tr>
                        @php
                          $no++;
                        @endphp
                      @endforeach
                    </tbody>
              	  </table>
                </div>
                <!-- /.box-body -->
              </div>
              
              <!-- /.box -->
            
  </div>
</div>

<!-- modal import siswa -->
        <div class="modal fade" id="importNilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {!!Form::open(['route' =>'nilai.import', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}

                {!!Form::file('data_nilai')!!}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-sm btn-primary" value="Import">
            </form>
              </div>
            </div>
          </div>
        </div>

</section>
	    
	    <!-- /.content -->
	  
@stop