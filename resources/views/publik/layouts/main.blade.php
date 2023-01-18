<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Wikrama's Shop | {{ $title }}</title>

		{{-- Icon --}}
		<link rel="icon" href="{{ asset('assets/img/logo-wk.png') }}">

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/slick.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/slick-theme.css') }}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/nouislider.min.css') }}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/style.css') }}"/>
		{{-- <link rel="stylesheet" href="/assets/css/login.css"> --}}

		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<style>
			body{
				font-weight: 500;
			}
			body::before {
				content: '';
				background-image: linear-gradient(
					rgba(255, 255, 255, .97),
					rgba(255, 255, 255, .97)
				),
				url({{ asset('/assets/img/bg.jpg') }}) ;
				background-repeat: no-repeat;
				background-size: cover;
				height: 100%;
				width: 100%;
				background-position: center;
				position: fixed;
				top: 0;
				left: 0;
				bottom: 0;
				z-index: -1;
			}

			/* HOT DEAL */
			
			#hot-deal.section {
			padding: 60px 0px;
			margin: 30px 0px;
			background-color: #E4E7ED;
			background-image: 
			linear-gradient(
				rgba(44, 44, 44, 0.322),
				rgba(51, 51, 51, 0.349)
			)
			,url({{ asset('/assets//img/GedungWikrama.jpg') }});
			background-position: center;
			background-repeat: no-repeat;
			}

			#hot-deal4.section {
			padding: 60px 0px;
			margin: 30px 0px;
			background-color: #E4E7ED;
			background-image: 
			linear-gradient(
				rgba(44, 44, 44, 0.322),
				rgba(51, 51, 51, 0.349)
			)
			,url({{ asset('/assets/img/pplg.jpg') }});
			background-position: center;
			background-repeat: no-repeat;
			}

			#hot-deal5.section {
			padding: 60px 0px;
			margin: 30px 0px;
			background-color: #E4E7ED;
			background-image: 
			linear-gradient(
				rgba(44, 44, 44, 0.322),
				rgba(51, 51, 51, 0.349)
			)
			,url({{ asset('/assets/img/animeduduk.jpg') }});
			background-position: center;
			background-repeat: no-repeat;
			}

			/* {{ 'biar code dibawahnya gk jadi language mode CSS' }} */
		</style>

    </head>
	<body>
		
		@include('publik.layouts.partials.header')

		@include('publik.layouts.partials.navigation')

        {{-- SECTION --}}
        @yield('section')
        {{-- /SECTION --}}

		@include('publik.layouts.partials.footer')

		{{-- Sweet Alert --}}
		@include('sweetalert::alert')

		<!-- jQuery Plugins -->
		<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/assets/js/slick.min.js') }}"></script>
		<script src="{{ asset('/assets/js/nouislider.min.js') }}"></script>
		<script src="{{ asset('/assets/js/jquery.zoom.min.js') }}"></script>
		<script src="{{ asset('/assets/js/main.js') }}"></script>
		<script src="{{ asset('/assets/js/login.js') }}"></script>
		<script>
			function loginDulu(){
				Swal.fire({
					title: 'Kamu Harus Login Dulu',
					backgroundOpacity: .5,
					position: 'left-start',
					// width: 300,
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Login',
					cancelButtonText: 'Tidak'
					}).then((result) => {
					if (result.isConfirmed) {
						window.location.href= '{{ route("login.index") }}'
					}
				})
			}
		</script>
	</body>
</html>
