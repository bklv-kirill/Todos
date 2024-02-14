@extends('layouts.main')

@section('content')
    @section('title', "Задача №$todo->id")

    <x-todos.card :todo="$todo" :from="$from">
        <p class="card-text">Описание: {{ $todo->discription ?? "Неуказано" }}</p>
        <p class="card-text">Дата создания: {{ $todo->created_at ?? "Неуказано" }}</p>
        <p class="card-text">Дата редактирования: {{ $todo->updated_at ?? "Неуказано" }}</p>

        <x-slot name="controls">
            <a href="{{ route("todos.edit", [$todo, "from" => $from]) }}" class="btn btn-primary m-1">Редактировать</a>
            <a href="{{ ($from === "todos" || $from === "groups") ? ($from === "todos" ? route("todos.index") : route("groups.index")) : route("groups.show", $from) }}"
            class="btn btn-primary m-1">Назад</a>
        </x-slot>
    </x-todos.card>
@endsection