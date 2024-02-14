@extends('layouts.main')

@section('content')
    @section('title', "Группа №$group->id")

    <x-groups.card :group="$group">
        <x-slot name="controls">
            <a href="{{ route("groups.edit", $group) }}" class="btn btn-primary mt-3">Редактировать</a>
            <a href="{{ route("groups.index") }}" class="btn btn-primary mt-3">Назад</a>
            <form action="{{ route("groups.delete", $group) }}" method="POST">
                @csrf
                @method("DELETE")
    
                <button type="submit" class="btn btn-danger mt-3">Удалить</button>
            </form>
        </x-slot>
    </x-groups.card>
@endsection