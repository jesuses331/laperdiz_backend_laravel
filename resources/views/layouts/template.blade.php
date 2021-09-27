<!DOCTYPE html>
<html>
<head>
	<!-- Define Charset -->
	<meta charset="utf-8"/>

	<!-- Page Title -->
	<title>La Perdiz</title>

	<!-- Responsive Metatag -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	   
	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Slider Revolution -->
	<link rel="stylesheet" href="plugins/revolution/css/settings.css">

    <!-- Font icons -->
    <link rel="stylesheet" href="css/fontello.css" >
    <!--[if IE 7]>
    <link rel="stylesheet" href="css/fontello-ie7.css" ><![endif]-->

	<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>


    <link rel="stylesheet" href="plugins/grid/css/component.css" />
	
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/styles.css" />
	
	<!-- Custom Media-Queties -->
	<link rel="stylesheet" href="css/media-queries.css" />

	<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        
	<![endif]-->

	<!-- Media queries -->
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
</head>




<!-- Header -->
<header>
<nav class="navbar navbar-fixed-top" role="navigation">
<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="index.html"><img src="img/LogoAlpha.png"  alt="Logo" /></a>
	</div>
	
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li @if(request()->is('/')) class="active" @endif><a href="{{ url('/') }}">Inicio</a></li>
			<li @if(request()->is('adopciones')) class="active" @endif><a href="{{ route('paginas.adopciones') }}">{{ __('Adopciones') }}</a></li>
			<li @if(request()->is('denuncia')) class="active" @endif><a href="{{ route('paginas.denuncias') }}">{{ __('Denuncias') }}</a></li>
			<li @if(request()->is('noticia')) class="active" @endif><a href="{{ route('paginas.noticias') }}">Noticias</a></li>
			<li><a href="impresiones.html">Impresiones en Bolivia</a></li>
			
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Servicios<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li ><a href="#">Transporte</a></li>
					<li><a href="#">Alojamiento</a></li>
					<li ><a href="#">Otros Servicios</a></li>
					<li ><a href="{{ route('paginas.capacitaciones') }}">Cursos y capacitaciones</a></li>
				</ul>
			</li>
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="referencias">Referencias<span class="caret"></span></a>
				<ul class="dropdown-menu" aria-labelledby="referencias">
					<li ><a href="veterinarias.html">Veterinarias</a></li>
					<li><a href="#">Autoridades</a></li>
					<li ><a href="#">Refugios en Bolivia</a></li>
					
				</ul>
			</li>
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Leyes<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li ><a href="#">Leyes Vigentes en Bolivia</a></li>
					<li><a href="#">Legislacion Internacional</a></li>
				</ul>
			</li>
			<li ><a href="{{ route('home') }}">Iniciar Sesion</a></li>
			<!--<li><a href="pricing-table.html">Pricing</a></li>
		</ul>

		<form class="navbar-form navbar-right search" role="search">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-btn">
						<button class="btn" type="button"><i class="icon-search"></i></button>
					</span>
					<input type="text" class="form-control" placeholder="Search">
				</div>
			</div>
		</form>

	</div><!--/.nav-collapse -->
</div>
</nav>
</header>
<!-- end Header -->
<body>
@yield('content')
  	

@yield('denuncias')
<!-- Footer -->
<footer>

	<!-- begin Contact -->
	<article class="contact">
	<div id="map"></div>
	<div id="contact_bg">
		<div class="container">
			 
			<div class="row">
			<div class="col-sm-12">
				<div class="title">
					<div class="centered"><div><h2>Contactanos</h2></div></div>
					<p>Llámenos o envíenos un correo electrónico con cualquier pregunta o inquietud que pueda tener. O si estás en las cercanías.</p>
				</div>
			</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<address>
					<i class="icon-home"></i> B/ La Colorada C/Lunita Camba #35,Santa Cruz de la Sierra<br>
					<i class="icon-phone"></i> Phone:  +531 75321525<br />
					<i class="icon-mail"></i> Email:  <a href="mailto:support@company.com">lardiz@gmail.com</a><br />
					<i class="icon-facebook"></i> Facebook:  <a href="#">facebook.com/LaPerdiz</a><br />
					<i class="icon-twitter"></i> Twitter:  <a href="#">twitter.com/LaPerdiz</a><br />
					</address>
				</div> 

				<div class="col-sm-6">
					<form class="form-inline" role="form">
						<div class="form-group pull-left">
							<label class="sr-only" for="name">Nombre</label>
							<input type="text" class="form-control" id="name" placeholder="Name">
						</div>

						<div class="form-group pull-right">
							<label class="sr-only" for="email">Email</label>
							<input type="email" class="form-control" id="email" placeholder="Email">
						</div>

						<textarea class="form-control pull-left" rows="8"></textarea>

						<button type="submit" class="btn btn-default pull-right">ENVIAR</button>
					</form>
				</div>   
			 </div>

		 </div>
	</div>
	</article>
	<!-- end Contact -->

	<div class="bottom-foot">
		<p>© 2021 La Perdiz. Todos los derechos reservados.<br /><a href="#">By BOLIVIAN-SOFTWARE</a></p>
	</div>

</footer>   
<!-- end Footer --> 

<a href="#" class="scrollup"><i class="icon-up-open"></i></a>



	<!-- ======================= JQuery libs =========================== -->

		<!-- jQuery -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>window.jQuery || document.write("<script src=\"js/jquery-1.9.1.min.js\"")</script>
		
		<!-- Respond.js media queries for IE8 -->
		<script src="js/respond.min.js"></script>
		
		<!-- Bootstrap-->
		<script src="js/bootstrap.min.js" ></script>
	 
		<!-- Retina.js -->
		<script src="js/retina.js" ></script>

		<!-- Placeholder.js http://widgetulous.com/placeholderjs/ -->
		<!--[if lt IE 9]>
		<script src="js/placeholder.js" ></script>
		<script>Placeholder.init();</script>
		<![endif]-->

		
		

		<script>
			 ClassicEditor
        		.create( document.querySelector( '#descripcion' ) )
        		.catch( error => {
            console.error( error );
        });
		</script>

		<!-- Slider Revolution -->
		<script src="plugins/revolution/js/jquery.themepunch.plugins.min.js"></script>
		<script src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>

		<!-- grid -->
		<script src="plugins/grid/js/modernizr.custom.js"></script>
		<script src="plugins/grid/js/classie.js"></script>
		<script src="plugins/grid/js/thumbnailGridEffects.js"></script>

		<!-- BlockUI -->
		<script src="js/jquery.blockUI.js"></script>
		
		<!-- scrollTo -->
		<script src="js/jquery.scrollTo-1.4.3.1-min.js"></script>

		<!-- Gmaps -->
		<script src="http://maps.google.com/maps/api/js?sensor=true" ></script>
		<script src="js/gmaps.js" ></script>

		<!-- Nicescroll -->
		<script src="js/jquery.nicescroll.js"></script>

		<!-- Custom -->
		<script src="js/script.js"  ></script>



		

	<!-- ======================= End JQuery libs ======================= -->
</body>
</html>