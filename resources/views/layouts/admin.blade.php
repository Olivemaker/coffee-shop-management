<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin-style.css') }}">
	@yield('style')

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('titlePage') | Пряный рай</title>

	<link rel="shortcut icon" type="image/jpg" href="{{ asset('images/icons/logo-dark.svg') }}">


	<!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Cormorant+Infant:ital,wght@0,300..700;1,300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
</head>
<body>
	<header>
		<nav>
			<a href="">
				<img src="{{ asset('images/icons/logo-full-dark.svg') }}">
			</a>

			<div>
				@if(Auth::check())
				<p>{{ Auth::user()->name }} | <a href="{{ route('logout')}}" >Выйти из системы</a>

				</p>
				@else
				<a href="{{ route('login')}}">Авторизация</a> | <a href="#">Регистраиця</a>
				@endif
			</div>
		</nav>
	</header>

	<main>
		@if(Auth::check())
		<div class="sidebar">
		@else
		<div class="sidebar" style="display: none;">
		@endif
			<h2>Инструменты</h2>
			<a href="{{ route('menu', ['section' =>'menu'])}}" class="tool">Меню</a>
			<a href="{{ route('menu', ['section' =>'sesonal-offers'])}}" class="tool item">Акции</a>
			<hr>
			<a href="{{ route('staff', ['section' => 'staff'])}}" class="tool">Сотрудники</a>
			<hr>
			<a href="{{ route('schedule', ['section' => 'schedule']) }}" class="tool">Расписание смен</a>
			<a href="{{ route('schedule', ['section' => 'manage-schedule']) }}" class="tool item">Управление расписанием</a>
			<hr>
			<a href="{{ route('product-record', ['section' => 'warehouse']) }}" class="tool">Склад</a>
			<a href="{{ route('product-record', ['section' => 'inventory']) }}" class="tool item">Внести инвентаризацию</a>
			<a href="{{ route('product-record', ['section' => 'delivery']) }}" class="tool item">Внести поставку</a>
			<a href="{{ route('product-record', ['section' => 'supplier']) }}" class="tool item">Добавить поставщика</a>
			<hr>
			<a href="{{ route('finance-record', ['section' => 'finance'])}}" class="tool">Финансовый учет</a>
		</div> 
		@yield('content')
	</main>

	<footer>
		<a href="">
			<img src="{{ asset('images/icons/logo-full-light.svg') }}">
		</a>
		<div>
			<a href=""><img src="{{ asset('images/icons/whatsapp.svg') }}">
			<p>+7 (900) 900-90-90</p></a>

		</div>
		<div>
			<a href=""> <img src="{{ asset('images/icons/telegram.svg') }}">
			<p>t.me/PryanyRai</p> </a>
		</div>
		<div>
			<p>г. Краснодар, мкр Центральный, ул. Красная, д. 124</p>
		</div>
		
	</footer>

</body>
<!-- jQuery -->

</html>