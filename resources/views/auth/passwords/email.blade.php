@extends('layouts.admin')

@section('titlePage', 'Сброс пароля')

@section('content')
<div class="back-auth-form">
	<form method="POST" action="{{ route('password.email')}}">
		@csrf
		<h1>Сбросить пароль</h1>

		@if(session('status'))
			<div class="alert alert-succses">
				<span style="color: #ffefd4; font-weight: 600">{{ session('status') }}</span>
			</div>
		@endif
		@if($errors->has('email'))
			<div>
                <span style="color: red; font-weight: 600" class="text-danger">{{ $errors->first('email') }}</span>
            </div>
         @endif
		<div>
			<label for="email">Email</label>
			<input type="text" name="email" placeholder=" ">
			
		</div>

		<button type="submit">Получить ссылку для сброса пароля</button>
	</form>
</div>
@endsection