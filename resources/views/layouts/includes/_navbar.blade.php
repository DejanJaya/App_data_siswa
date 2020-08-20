		<header class="main-header">
		  <!-- Logo -->
		  <a href="../../index2.html" class="logo">
		    <!-- mini logo for sidebar mini 50x50 pixels -->
		    <span class="logo-mini"><b>A</b>LT</span>
		    <!-- logo for regular state and mobile devices -->
		    <span class="logo-lg"><b>Sistem</b>Akademik</span>
		  </a>
		  <!-- Header Navbar: style can be found in header.less -->
		  <nav class="navbar navbar-static-top">
		    <!-- Sidebar toggle button-->
		    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </a>

		  

		    <div class="navbar-custom-menu">
		      <ul class="nav navbar-nav">
		        <!-- dropdown.less -->
		        <li class="dropdown user user-menu">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		            <img src="
								@if(auth()->user()->role == 'siswa')
								{{auth()->user()->siswa->getAvatar()}}
								@else
									/images/default.jpg
								@endif
								" class="user-image" alt="User Image">
		            <span class="hidden-xs">{{auth()->user()->name}}</span>
		          </a>
		          <ul class="dropdown-menu">
		            <!-- User image -->
		            <li class="user-header">
		              <img src="/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">

		              <p>
		                {{auth()->user()->name}} - Web Developer
		                <small>Member since 2016</small>
		              </p>
		            </li>
		            
		            <!-- Menu Footer-->
		            <li class="user-footer">
		              <div class="pull-left">
		                <a href="{{url('/profilsaya')}}" class="btn btn-default btn-flat">Profile</a>
		              </div>
		              <div class="pull-right">
		                <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Logout</a>
		              </div>
		            </li>
		          </ul>
		        </li>
		       
		      </ul>
		    </div>
		  </nav>
		</header>