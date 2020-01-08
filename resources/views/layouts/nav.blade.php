<nav class="navbar text-uppercase" id="mainNav">
	<div class="row">
		<!-- Hamburguesa -->
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

							@endif
							<li>
								<a tabindex="-1" class="dropdown-item" href="{{ route('homeAdmin')}}">
									@if(Auth::user()->hasRole('admin'))
									{{__('messages.Panel de administrador')}}
									@else
									{{__('messages.Panel estándar')}}
									@endif
								</a>
							</li>
							<li>
								<a tabindex="-1" class="dropdown-item" href="{{ route('usuarios.edit',Auth::user()->id) }}">
									{{ __('messages.Modificar usuario') }}
								</a>
							</li>
							<li>
								<a tabindex="-1" class="dropdown-item" href="{{ route('usuarios.delete',Auth::user()->id) }}">
									{{ __('messages.Eliminar usuario') }}
								</a>
							</li>
							<li>
								<a tabindex="-1" class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								{{ __('messages.Cerrar sesión') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" >
								@csrf
							</form>
						</li>
					</ul>
				</a>
			</li>
			@endif
			@endguest
			<br>
			<li class="text-center"><a href="{{route('beds.index')}}"><i class="fa fa-question-circle fa-3x text-dark"></i></a></li>
			<hr>
			<li class="text-center"><a tabindex="-1" class="landingpage nav-link py-0 px-0 px-lg-0 rounded js-scroll-trigger text-dark" href="{{route('landingpage')}}">Landing Page</a></li>
		</ul>
	</div>
	<!-- FIN Hamburguesa -->

	<div class="col-8"></div>

	<div class="col-3 d-flex flex-row">
		<div class="">
			<a href="{{route('homeNurse')}}"><i class="patienticon fa fa-home"></i></a>
		</div>
		<!-- Idiomas -->
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
		<!-- FIN Idiomas -->
	</div>
</div>
</nav>
