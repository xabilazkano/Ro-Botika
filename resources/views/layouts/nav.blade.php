<nav class="navbar text-uppercase" id="mainNav">
	<div class="row">
		<!-- Hamburguesa -->
		<div class="col-1">
			<a class="text-dark fa-3x" data-toggle="dropdown" href="#">
				<i class="fa fa-bars"></i>
			</a>
			<ul class="dropdown-menu">

				<br>
				<li class="d-flex justify-content-center align-items-center">
					<a href="{{route('beds.index')}}" style="text-align:center"><i class="fa fa-question-circle fa-3x text-dark"></i></a>
					<i class="fa fa-lock fa-3x text-dark" onclick="whenUserIdle()" style="text-align:center"></i>
				</li>
				<hr>
				<li class="text-center"><a tabindex="-1" class="landingpage nav-link py-0 px-0 px-lg-0 rounded js-scroll-trigger text-dark" href="{{route('landingpage')}}">Landing Page</a></li>
			</ul>
		</div>
		<!-- FIN Hamburguesa -->

		<div class="col-2 d-flex justify-content-center align-items-center">
			<img src="/img/logo.png">
		</div>

		<div class="col-6 d-flex justify-content-center align-items-center">
			<h2 style="width:auto">@yield("titulua")</h2>
		</div>

		<div class="col-3 d-flex flex-row">
			<div class="menueskubi d-flex align-items-center">
				<a href="{{route('homeNurse')}}"><i class="fa fa-home fa-3x"></i></a>
			</div>
			<!-- Idiomas -->
			<div class="menueskubi btn-group btn-group-inline">
				<button class="btn" data-toggle="dropdown">
					<span class="caret"><i class="fa fa-language fa-2x"></i></span>
				</button>
				<ul class="dropdown-menu">
					<li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/en') }}">EN</a></li>
					<li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/es') }}">ES</a></li>
					<li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/eu') }}">EUS</a></li>
				</ul>
			</div>
			<!-- FIN Idiomas -->
			<div class="menueskubi d-flex align-items-center">
				<ul>
					<a tabindex="-1" class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						<span class="caret"><i class="fa fa-arrow-right fa-2x text-dark"></i></span>
					</a>
				<form id="logout-form" action="{{route('logout')}}" method="POST" >
					@csrf
				</form>
			</ul>
		</div>
	</div>
</div>
</nav>
