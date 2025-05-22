@extends('layouts.admin')

@section('titlePage', 'Авторизация')


@section('content')
<div class="back-auth-form">
	<form method="POST" action="{{ route('login')}}">
		@csrf
		<h1>Авторизация</h1>
		@if($errors->any())
		<div>
			<strong>{{ $errors->first() }}</strong>
		</div>
		@endif
		<div>
			<label for="login">Логин</label>
			<input type="text" name="login" placeholder=" " required>
		</div>

		<div>
			<label for="password">Пароль</label>
			<input type="password" name="password" placeholder=" " required>
		</div>

		<button type="submit">Войти</button>

		<a href="{{ route('password.request') }}">Забыли пароль?</a>
	</form>
</div>

@endsection