<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Music Links is collection of direct download links of Music for Free" />
	<meta name="author" content="mrunknown0001" />

	<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}" />

	<!-- Google reCAPTCHA
	<script src='https://www.google.com/recaptcha/api.js'></script> -->

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<![endif]-->

</head>
<body>

	@yield('content')

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip({trigger: "hover"});
	});
</script>

</body>
</html>