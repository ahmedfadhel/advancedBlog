<nav class="navbar has-shadow">
	<div class="container">
		<div class="navbar-brand">
			<a href="{{route('home')}}" class="navbar-item">
				<img src="{{asset('images/devmarketer-logo.png')}}" alt="Advanced Blog">
			</a>
			@if (Request::segment(1) == 'manage')
				<a class="navbar-item is-hidden-desktop" id="admin-sidemenu-button">
					<span class="icon">	<i class="fa fa-fw fa-lg fa-arrow-circle-o-right"></i></span>
				</a>
			@endif
			<button class="button navbar-burger">
				<span></span>
				<span></span>
				<span></span>
			</button>
		</div>
		<div class="navbar-menu">
			<div class="navbar-start">
				<a href="#" class="navbar-item is-tab is-hidden-mobile m-l-10">Learn</a>
				<a href="#" class="navbar-item is-tab is-hidden-mobile">Discuss</a>
				<a href="#" class="navbar-item is-tab is-hidden-mobile">Share</a>
			</div>
			<div class="navbar-end">
				@if (Auth::guest())
					<a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
					<a href="{{route('register')}}" class="navbar-item is-tab">Join Us</a>
				@else
					<button class="dropdown is-aligned-right navbar-item is-tab">
						Hey {{Auth::user()->name}} <span class="icon"><i class="fa fa-fw m-l-5 fa-caret-down"></i></span>
						
						<ul class="dropdown-menu">
							<li><a href="#">
								<span class="icon"><i class="fa fa-fw m-l-5 fa-user-circle-o"></i></span>
								Profile</a></li>
							<li><a href="#">
									<span class="icon"><i class="fa fa-fw m-l-5 fa-bell"></i></span>
									Notifications</a></li>
							<li><a href="{{route('manage.dashboard')}}">
								<span class="icon"><i class="fa fa-fw m-l-5 fa-cog"></i></span>
								Settings</a></li>
							<li class="sperator"></li>
							<li>
								<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<span class="icon"><i class="fa fa-fw m-l-5 fa-sign-out"></i></span>
									Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{csrf_field()}}
								</form>
							</li>
						</ul>

					</button>	
				@endif
			</div>
		</div>
	</div>
</nav>