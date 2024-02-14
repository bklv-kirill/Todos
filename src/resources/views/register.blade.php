@extends('layouts.authreg')

@section('content')
    @section('title', "Регистрация")

    <x-forms.form :action="route('user.store')" method="POST" class="mt-3">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Логин</label>
            <input name="login" type="text" class="form-control" value="{{ old("login") }}" id="exampleInputEmail1" aria-describedby="emailHelp">
            @if ($errors->has("login"))
                <div id="emailHelp" class="form-text text-danger">{{ $errors->first("login") }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" value="{{ old("email") }}" id="exampleInputEmail1" aria-describedby="emailHelp">
            @if ($errors->has("email"))
            <div id="emailHelp" class="form-text text-danger">{{ $errors->first("email") }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @if ($errors->has("password"))
                <div id="emailHelp" class="form-text text-danger">{{ $errors->first("password") }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Зарегестрироваться</button><br>
        <a href="{{ route("user.login") }}">Авторизация</a>
    </x-forms.form>
@endsection