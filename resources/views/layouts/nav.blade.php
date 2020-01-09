<nav class="navbar text-uppercase" id="mainNav">
	<div class="row d-flex justify-content-between">
		<div class="col-1">
			<a class="text-dark fa-3x" data-toggle="dropdown" href="#">
				<i class="fa fa-bars"></i>
			</a>
			<ul class="dropdown-menu">
				@guest
				<li><a tabindex="-1" class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger text-dark" href="#loginModal" data-toggle="modal">{{ __('messages.Iniciar sesión') }}</a></li>
				@else
				@if (Auth::user()->hasRole("standar"))
				<li><a tabindex="-1" class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger text-dark" href="{{route('homeNurse')}}">HOME</a></li>
				@endif
				@if (Auth::user()->hasRole("admin"))
				<li><a tabindex="-1" class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger text-dark" href="{{route('homeAdmin')}}">HOME</a></li>
				@endif
				@endguest

				@guest
				@else
				@if (Auth::user()->hasVerifiedEmail())
				<li class="dropdown-submenu">
					<a class="test py-3 px-3 px-lg-3 rounded text-dark"  tabindex="-1" href="#">{{ Auth::user()->name }}
						<ul class="dropdown-menu">
							@if (Auth::user()->hasRole("nurse"))

		<div class="col-2 d-flex justify-content-center align-items-center">
			<img src="/img/logo.png">
		</div>

		<div class="col-6 d-flex justify-content-center align-items-center">
			<h2 style="width:auto">@yield("titulua")</h2>
		</div>

	<div class="col-1">
		<div class="btn-group btn-group-inline">
			<button class="btn" data-toggle="dropdown">
				<span class="caret"><i class="fa fa-language fa-3x"></i></span>
			</button>
			<ul class="dropdown-menu">
				<li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/en') }}">EN</a></li>
				<li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/es') }}">ES</a></li>
				<li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/eu') }}">EUS</a></li>
			</ul>
		</div>
	</div>
</div>
</nav>
