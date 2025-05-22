@extends('layouts.admin')

@section('titlePage', 'Сброс пароля')

@section('content')
<div class="back-auth-form">
	<form method="POST" action="{{ route('password.email')}}">
		@csrf
		<h1>Сбросить пароль</h1>

		@if(session('status'))
			<div class="alert alert-succses">{{ session('status') }}</div>
		@endif

		<div>
			<label for="email">Email</label>
			<input type="text" name="email" placeholder=" ">
			@error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
		</div>

		<button type="submit">Получить ссылку для сброса пароля</button>
	</form>
</div>
@endsection