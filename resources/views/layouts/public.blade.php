	<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кофейня "Пряный рай" | Авторский кофе и десерты в Краснодаре</title>
    <meta name="description" content="Кофейня Пряный рай - уютное место с авторскими кофейными напитками, пряными десертами и атмосферой тепла. Закажите фирменный раф или попробуйте наш хитовый чизкейк.">
    
    <!-- Основные мета-теги -->
    <meta name="keywords" content="кофейня, пряный рай, авторский кофе, кафе [город], кофе с собой, десерты, уютное кафе, кофейные напитки, завтраки, раф, капучино, чизкейк">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Кофейня Пряный рай">
    
    <!-- OpenGraph / Социальные сети -->
    <meta property="og:title" content="Кофейня Пряный рай | Авторский кофе и десерты">
    <meta property="og:description" content="Уютная кофейня с уникальными кофейными напитками и пряными десертами">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://https://pryanij-raj.ru">
    <meta property="og:image" content="https://https://pryanij-raj.ru/images/og-image.jpg">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/svg+xml" href="images/icons/logo-dark.svg">
    <link rel="apple-touch-icon" href="images/icons/apple-touch-icon.png">
    
    <!-- Предзагрузка важных ресурсов -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="css/public-style.css" as="style">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Cormorant+Infant:ital,wght@0,300..700;1,300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" as="style">
    
    <!-- Основные стили -->
    <link rel="stylesheet" type="text/css" href="css/public-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Cormorant+Infant:ital,wght@0,300..700;1,300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <!-- Каноническая ссылка (если есть дубли страниц) -->
    <link rel="canonical" href="https://https://pryanij-raj.ru">
</head>
<body>

	<header>
		<nav>
			<a href="">
				<img src="images/icons/logo-full-light.svg">
			</a>

			<input type="checkbox" id="myInput">
		    <label for="myInput">
		      <span class="bar top"></span>
		      <span class="bar middle"></span>
		      <span class="bar bottom"></span>
		    </label>

			<ul>
				<li><a href="#sesonal-offers">Сезонные предложения</a></li>
				<li><a href="#menu">Меню</a></li>
				<li><a href="#work">Работа у нас</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<div class="welcome" >
			<h1>Пряный рай</h1>
			<p>Здесь вы найдете любимые напитки по доступным ценам</p>
			<p>А также можете попробовать что-нибудь новенькое из нашего меню!</p>
		</div>
		
		@foreach($sesonalOffers as $offer)
		@if($offer->published)
		<div class="marketing" id="{{$offer->style}}">
	        <h3>{{$offer->title}}</h3>
	        <div>
	          <p>{{$offer->description}}</p>
	        </div>
	        <div class="img-offers" style="
	          background: url({{ asset('storage/'.$offer->image_path) }}) no-repeat center center / cover;
	          border-radius: 12px;">  
	        </div>
	    </div>
		@endif
		@endforeach
		<h2 id="menu">Взгляните на наше мею</h2>
		<p>Вам обязательно что-нибудь придется по душе!</p>


        <div class="category-menu">
            <h2>Горячие напитки</h2>
                @foreach($hot as $category)
                @foreach($category->menu as $item)
                @if($item->status === 'active')
            <div class="menu-item">
				@if($item->drinkimage)
        		<div class="menu-item-image" style="background: url({{ asset('storage/'.$item->drinkimage->image_path) }}) no-repeat center center / cover;"></div>
        		@endif
				<div class="menu-item-info">
					<h3>{{$item->name}}</h3>
					<table class="drinks">

					@php
						$sizeVolumes = [
							'S' => '300мл',
							'M' => '400мл',
							'L' => '500мл',
						];
					@endphp
					@foreach($item->drinksize as $size)
			            <tr>
			            	<td>{{ $size->size }}</td>
			                <td>{{ $sizeVolumes[$size->size] ?? 'Неизвестный размер' }}</td>
			                <td>{{ $size->price }} р</td> 
						</tr>
			        @endforeach
					</table>
				</div>
			</div>
			@endif
                @endforeach
                @endforeach
        </div>


		<div class="category-menu">
			<h2>Холодные напитки</h2>
                @foreach($cold as $category)
                @foreach($category->menu as $item)
                @if($item->status === 'active')

            <div class="menu-item">
				@if($item->drinkimage)
        		<div class="menu-item-image" style="background: url({{ asset('storage/'.$item->drinkimage->image_path) }}) no-repeat center center / cover;"></div>
        		@endif
				<div class="menu-item-info">
					<h3>{{$item->name}}</h3>
					<table class="drinks">

					@php
						$sizeVolumes = [
							'S' => '300мл',
							'M' => '400мл',
							'L' => '500мл',
						];
					@endphp
					@foreach($item->drinksize as $size)
			            <tr>
			            	<td>{{ $size->size }}</td>
			                <td>{{ $sizeVolumes[$size->size] ?? 'Неизвестный размер' }}</td>
			                <td>{{ $size->price }} р</td> 
						</tr>
			        @endforeach
					</table>
				</div>
			</div>


			@endif

                @endforeach
                @endforeach
        </div>

        <div class="category-menu">
			<h2>Перекусы</h2>
                @foreach($snacks as $category)
            <div class="menu-item">
				
        		<div class="menu-item-image" id="{{$category->name}}"></div>
        		
				<div class="menu-item-info snacks">

				@php
					$categoryName = [
					'Sandwich' => 'Сендвичи',
					'Salad' => 'Салаты',
					'Mochi' => 'Моти',
					'Donat' => 'Донаты',
					'Cheesecake' => 'Чизкейки',
					];
				@endphp
					<h3>{{$categoryName[$category->name]}}</h3>

					<p>
					    @foreach($category->menu as $item)
					        @if($item->status === 'active')
					            {{ $item->name }}@if(!$loop->last), @endif
					        @endif
					    @endforeach
					</p>

					<p>{{$category->foodprice->price}} р</p>
				</div>
			</div>
                @endforeach	
		</div>

		<div id="background">

			<div class="marketing" id="work">
				<h3>Приглашаем на работу</h3>
				<div>
					<p>Приходи в наш веселый коллектив и пробуй все новинки первее всех!</p>
					<p>У нас есть: <br> Гибкий график <br> Бесплатное Питание (любые напитки или закуски из меню)</p>
					<p>Обращайся по номеру: <br> +7 (900) 900-90-90
				</div>
				<div class="img-offers" style="
					background: url('images/coffee/barista.jpg') no-repeat center center / cover;
					border-radius: 12px;">	
				</div>

			</div>
		</div>

	</main>
	
	 <footer>
		<a href="">
			<img src="images/icons/logo-full-light.svg">
		</a>
		<div>
			<a href=""><img src="images/icons/whatsapp.svg">
			<p>+7 (900) 900-90-90</p></a>

		</div>
		<div>
			<a href=""> <img src="images/icons/telegram.svg">
			<p>t.me/PryanyRai</p> </a>
		</div>
		<div>
			<p>г. Краснодар, мкр Центральный, ул. Красная, д. 124</p>
		</div>
		
	</footer>
</body>
</html>