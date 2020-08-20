<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="@if(auth()->user()->role == 'siswa')
                {{auth()->user()->siswa->getAvatar()}}
                @else
                  /images/default.jpg
                @endif" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{auth()->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
         <li><a href="{{url('/dashboard')}}"><i class="fa fa-home"></i> <span>Dashboards</span></a></li>
           @if(auth()->user()->role == 'admin')
        <li class="header">Master data</li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/siswa')}}"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Data Jurusan</a></li>
          </ul>
        </li>
        
        <li class="header">Analisis Data Siswa</li>
        
         <li><a href="{{url('/siswa/analisis')}}"><i class="fa fa-calendar"></i> <span>Grafik data</span></a></li>
            <li><a href="{{url('/siswa/datanilai')}}"><i class="fa fa-book"></i> <span>Nilai Siswa</span></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Siswa</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/siswa/analisisnilai')}}"><i class="fa fa-circle-o"></i> Analisis 2015/2016</a></li>
                <li><a href="{{url('/siswa/analisisnilai1617')}}"><i class="fa fa-circle-o"></i> Analisis 2016/2017</a></li>
                <li><a href="{{url('/siswa/analisisnilai1718')}}"><i class="fa fa-circle-o"></i> Analisis 2017/2018</a></li>
                <li><a href="{{url('/siswa/analisisnilai1819')}}"><i class="fa fa-circle-o"></i> Analisis 2018/2019</a></li>
              </ul>
            </li> 
         @endif 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>