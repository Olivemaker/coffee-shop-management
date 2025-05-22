@extends('layouts.admin')

@section('titlePage', 'Регистрация')


@section('content')
<div class="back-auth-form">
	<form method="POST" action="{{ route('register')}}">
		@csrf
		<h1>Регистрация</h1>
		<div>
			<label for="name">Имя пользователя</label>
			<input type="text" name="name" placeholder=" ">
		</div>

		<div>
			<label for="email">Email</label>
			<input type="text" name="email" placeholder=" ">
		</div>

		<div>
			<label for="login">Логин</label>
			<input type="text" name="login" placeholder=" ">
		</div>

		<div>
			<label for="password">Пароль</label>
			<input type="password" name="password" placeholder=" ">
		</div>

		<div>
			<label for="password_confirmation">Подвердите пароль</label>
			<input type="password" name="password_confirmation" placeholder=" ">
		</div>

		<button type="submit">Зарегистрироваться</button>
	</form>
</div>
@endsection