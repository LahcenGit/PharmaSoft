<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PharmaSoft</title>
        
        <!-- Standard Favicon -->
	    <link rel="icon" type="image/x-icon" href="{{URL::asset('images//favicon.ico')}}" />

        <!-- Fonts -->
        <!-- Library - Google Font Familys -->
        <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Philosopher:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        

        <!-- Library - Bootstrap v3.3.5 -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('libraries/bootstrap/bootstrap.min.css')}}">
        
        <!-- Font Icons -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('libraries/fonts/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('libraries/fonts/elegant-icons.css')}}">

        <!-- Library - OWL Carousel V.2.0 beta -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('libraries/owl-carousel/owl.carousel.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('libraries/owl-carousel/owl.theme.css')}}">
        
        <!-- Library - Animate CSS -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('libraries/animate/animate.min.css')}}">

        <!-- Library - Magnific Popup -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('libraries/magnific-popup/magnific-popup.css')}}">

        <!-- Custom - Common CSS -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/plugins.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/navigation-menu.css')}}">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-   wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">    
 

        <!--[if IE]>
            <link rel="stylesheet" type="text/css" href="css/all-ie-only.css" />
        <![endif]-->
        
        <!-- Custom - Theme CSS -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="css/shortcodes.css">

        <style type="text/css"> .espace{  margin-left: 5px;} </style>  
	
        <style>

            .ifram-costum{

                width : 1200px;
                padding : 0px; 
                margin : 0px ; 
                height : 600px;
                
                border-style: none;
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body data-offset="200" data-spy="scroll" data-target=".ow-navigation">

    <!--<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ url('Dashbord/register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif



        </div>!-->
        <!-- Loader -->
	<div id="site-loader" class="load-complete">
		<div class="loader">
			<div class="loader-inner ball-clip-rotate">
				<div></div>
			</div>
		</div>
	</div><!-- Loader /- -->
	
	<a id="top"></a>
	<!-- Main Container -->
	<div class="main-container">
		<!-- Header -->
		<header class="header-main">
			<!-- Top Header -->
			<div class="top-header container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<p>Nous pensons que chaque interaction avec nos patients est une opportunité!!</p>
						</div>
						<div class="col-md-6 text-right">
							<ul>
								<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>	
								<li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" title="Google+"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" title="Tumblr"><i class="fa fa-tumblr"></i></a></li>
							</ul>
                            @auth
							<a href="{{ url('Dashbord/index') }}" title="Book Appointment"></span>Dashbord</a>
                            @else
                            <a href="{{ route('login') }}" title="Login"><span><i class="fa fa-user"></i></span>Se connecter</a>
                            @endauth
						</div>
					</div>
				</div><!-- container /- -->
			</div><!-- Top Header /- -->
			<!-- Logo Block -->
			<div class="middle-header container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<div class="row">
						<div class="col-md-3 logo-block pull-left">
							<a href="#" title="Logo"><img src="images/logo.png" alt="Logo" /></a>
						</div>
						<div class="col-md-9 text-right pull-right">
							<div class="location">
								<h3><img src="images/location-ic.png" alt="Location" /> Notre Localisation</h3>
								<p>941 - Oudjlida, Tlemcen - 13</p>
							</div>
							<div class="phone">
								<h3><img src="images/phone-ic.png" alt="phone" /> (+213) 43 36 02 37</h3>
								<p>Appelez nous 24/7</p>
							</div>
						</div>
					</div>
				</div><!-- Container -->
			</div><!-- Logo Block /- -->
			<!-- Navigation -->
			<nav class="navbar ow-navigation">
				<div class="container">
					<div class="row">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li class="active"><a href="{{url('')}}">Home</a></li>
								<li><a href="{{url('medicsFront')}}">Médicaments</a></li>
								
								
								<li><a href="{{url('contact')}}">Contact</a></li>
							</ul>						
						</div>
					</div>
				</div>
			</nav>
		</header>