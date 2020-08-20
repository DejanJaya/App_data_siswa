<!-- <!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
 	/VENDOR CSS 
	<link rel="stylesheet" href="{{url('/admin/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('/admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{url('/admin/assets/vendor/linearicons/style.css')}}">
	//MAIN CSS
	<link rel="stylesheet" href="{{url('/admin/assets/css/main.css')}}">
	//FOR DEMO PURPOSES ONLY. You should remove this in your project 
	<link rel="stylesheet" href="{{url('/admin/assets/css/demo.css')}}">
	//GOOGLE FONTS
	<link href="{{url('/admin/assets/font.googleapis.css')}}" rel="stylesheet">
	//ICONS 
	<link rel="apple-touch-icon" sizes="76x76" href="{{url('/admin/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{url('/admin/assets/img/favicon.png')}}">
</head>

<body>
	//WRAPPER 
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{url('/admin/assets/main.png')}}" alt="Klorofil Logo"></div>
								<p class="lead">Login</p>
							</div>
							<form class="form-auth-small" action="{{url('/postlogin')}}" method="POST">
								{{csrf_field()}}
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input name="email" type="email" class="form-control" id="signin-email" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input name="password" type="password" class="form-control" id="signin-password" placeholder="Password">
								</div>
								<div class="form-group clearfix">
									
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Aplikasi Sistem Akademik</h1>
							<p>by SMK PGRI Rawalumbu</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	//END WRAPPER
</body>

</html>
 -->

 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>AdminLTE 3 | Log in</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{url('admin/assets/plugins/fontawesome-free/css/all.min.css')}}">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="{{url('admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{url('admin/assets/dist/css/adminlte.min.css')}}">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 </head>
 <body class="hold-transition login-page">
 <div class="login-box">
   <div class="login-logo">
     <a href="#">Form Login</a>
   </div>
   <!-- /.login-logo -->
   <div class="card">
     <div class="card-body login-card-body">
       <p class="login-box-msg">Sign in to start your session</p>

       <form action="{{url('/postlogin')}}" method="POST">
       	{{csrf_field()}}
         <div class="input-group mb-3">
           <input type="email" name="email" class="form-control" placeholder="Email">
           <div class="input-group-append">
             <div class="input-group-text">
               <span class="fas fa-envelope"></span>
             </div>
           </div>
         </div>
         <div class="input-group mb-3">
           <input type="password" name="password" class="form-control" placeholder="Password">
           <div class="input-group-append">
             <div class="input-group-text">
               <span class="fas fa-lock"></span>
             </div>
           </div>
         </div>
         <div class="row">
           <div class="col-8">
             <div class="icheck-primary">
               <input type="checkbox" id="remember">
               <label for="remember">
                 Remember Me
               </label>
             </div>
           </div>
           <!-- /.col -->
           <div class="col-4">
             <button type="submit" class="btn btn-primary btn-block">Sign In</button>
           </div>
           <!-- /.col -->
         </div>
       </form>

       

       <p class="mb-1">
         <a href="forgot-password.html">I forgot my password</a>
       </p>
       <p class="mb-0">
         <a href="register.html" class="text-center">Register a new membership</a>
       </p>
     </div>
     <!-- /.login-card-body -->
   </div>
 </div>
 <!-- /.login-box -->

 <!-- jQuery -->
 <script src="{{url('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
 <!-- Bootstrap 4 -->
 <script src="{{url('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <!-- AdminLTE App -->
 <script src="{{url('admin/assets/dist/js/adminlte.min.js')}}"></script>

 </body>
 </html>
