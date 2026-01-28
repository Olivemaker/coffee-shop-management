@extends('layouts.admin')

@section('titlePage', 'Новый пароль')

@section('content')
<div class="back-auth-form">
	<form method="POST" action="{{ route('password.update')}}">
		@csrf
		<h1>Новый пароль</h1>
			<input type="hidden" name="token" value="{{ $token }}">
		<div style="width: 600px">
			<label for="login">Логин</label>
			<input type="text" name="login" placeholder=" ">
			@error('login')
                <span style="color: red; font-weight: 600" class="text-danger">{{ $message }}</span>
            @enderror
		</div>

		<div style="width: 600px">
			<label for="password">Пароль</label>
			<input type="password" name="password" placeholder=" ">
			@error('password')
                <span style="color: red; font-weight: 600" class="text-danger">{{ $message }}</span>
            @enderror
		</div>

		<div>
			<label for="password_confirmation">Подвердите пароль</label>
			<input type="password" name="password_confirmation" placeholder=" ">
		</div>

		<button type="submit">Сохранить новый пароль</button>
	</form>
</div>
@endsection