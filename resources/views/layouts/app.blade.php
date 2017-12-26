<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
		<div id="app">
			<nav class="navbar has-shadow">
				<div class="container">
					<div class="navbar-menu">
						<div class="navbar-start">
								<a href="{{'home'}}" class="navbar-item">
										<img src="{{asset('images/devmarketer-logo.png')}}" alt="Advanced Blog">
								</a>
								<a href="" class="navbar-item is-tab is-hidden-mobile m-l-10">Learn</a>
								<a href="" class="navbar-item is-tab is-hidden-mobile">Discuss</a>
								<a href="" class="navbar-item is-tab is-hidden-mobile">Share</a>
							</div>
							<div class="navbar-end">
								@if (!Auth::guest())
									<a href="#" class="navbar-item is-tab">Login</a>
									<a href="#" class="navbar-item is-tab">Join Us</a>
								@else
									<button class="dropdown is-aligned-right navbar-item is-tab">
										Hey User <span class="icon"><i class="fa fa-fw m-l-5 fa-caret-down"></i></span>
										
										<ul class="dropdown-menu">
											<li><a href="#">
												<span class="icon"><i class="fa fa-fw m-l-5 fa-user-circle-o"></i></span>
												Profile</a></li>
											<li><a href="#">
													<span class="icon"><i class="fa fa-fw m-l-5 fa-bell"></i></span>
												Notifications</a></li>
											<li><a href="#">
													<span class="icon"><i class="fa fa-fw m-l-5 fa-cog"></i></span>
												Settings</a></li>
											<li class="sperator"></li>
											<li><a href="#">
													<span class="icon"><i class="fa fa-fw m-l-5 fa-sign-out"></i></span>
												Logout</a></li>
										</ul>
		
									</button>	
								@endif
							</div>
					</div>
					
				</div>
			</nav>

			@yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>