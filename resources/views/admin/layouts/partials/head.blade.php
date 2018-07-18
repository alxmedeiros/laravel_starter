<!DOCTYPE html>
<html class="no-js css-menubar" lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

	<meta name="description" content="bootstrap admin template">
	<meta name="author" content="">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<link rel="apple-touch-icon" href="/themes/remark/assets/images/apple-touch-icon.png">
	<link rel="shortcut icon" href="/themes/remark/assets/images/favicon.ico">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="/themes/remark/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/themes/remark/assets/css/bootstrap-extend.min.css">
	<link rel="stylesheet" href="/themes/remark/assets/css/site.min.css">
	<!-- Plugins -->
	<link rel="stylesheet" href="/themes/remark/assets/vendor/animsition/animsition.css">
	<link rel="stylesheet" href="/themes/remark/assets/vendor/asscrollable/asScrollable.css">
	<link rel="stylesheet" href="/themes/remark/assets/vendor/switchery/switchery.css">
	<link rel="stylesheet" href="/themes/remark/assets/vendor/intro-js/introjs.css">
	<link rel="stylesheet" href="/themes/remark/assets/vendor/slidepanel/slidePanel.css">
	<link rel="stylesheet" href="/themes/remark/assets/vendor/flag-icon-css/flag-icon.css">

    <!-- Page Styles -->
    @if(isset($pageStyles))
        @foreach($pageStyles as $style)
        <link href="{{ asset($style) }}" rel="stylesheet">
        @endforeach
    @endif

	<!-- Fonts -->
	<link rel="stylesheet" href="/themes/remark/assets/fonts/web-icons/web-icons.min.css">
	<link rel="stylesheet" href="/themes/remark/assets/fonts/brand-icons/brand-icons.min.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <link rel="stylesheet" href="/themes/remark/assets/fonts/font-awesome/font-awesome.min.css?v2.2.0">

    <!-- Skin -->
    <link rel="stylesheet" href="/themes/remark/assets/skins/cyan.css">

	<!-- Custom Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="/themes/remark/assets/vendor/html5shiv/html5shiv.min.js"></script>
	<![endif]-->
	<!--[if lt IE 10]>
	<script src="/themes/remark/assets/vendor/media-match/media.match.min.js"></script>
	<script src="/themes/remark/assets/vendor/respond/respond.min.js"></script>
	<![endif]-->
	<!-- Scripts -->
	<script src="/themes/remark/assets/vendor/breakpoints/breakpoints.js"></script>
	<script>
        Breakpoints();
	</script>

	<script src="https://cdn.ravenjs.com/3.25.2/raven.min.js" crossorigin="anonymous"></script>
    <script>
        Raven.config('https://d30d7c889ee84222aa3237747edaa68c@sentry.io/1212029').install()
    </script>

    <style>
	    .sacola-thumb {
	    	align-items: center !important;
	    	display: flex !important;
	    }

	    .sacola-thumb img {
	    	width: 46px;
    		margin-right: 1rem !important;
    		margin-left: 1rem !important;
    		object-fit: cover;
    		object-position: center top;
    		max-width: 100%;
    		height: auto;
    		vertical-align: middle;
    		border-style: none;
		}
    </style>
</head>