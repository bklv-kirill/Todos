@extends('layouts.main')

@section('content')
    @section('title', "Редактирование задачи №$todo->id")
    
    <x-forms.form :action="route('todos.update', [$todo, 'from' => $from])"  method="PATCH" class="card mt-3">
        <div class="card-header">Задача №{{ $todo->id }}</div>

        <div class="card-body">
            <div class="mb-3">
                @if ($errors->has("title"))
                    <label class="form-label text-danger">{{ $errors->first("title") }}</label>
                @endif
                <x-forms.input-group>
                    <x-forms.span>
                        Название
                    </x-forms.span>
                    <x-forms.input type="text" name="title" :value="old('title') ?? $todo->title"/>
                </x-forms.input-group>
            </div>

            <div class="mb-3">
                @if ($errors->has("discription"))
                    <label class="form-label text-danger">{{ $errors->first("discription") }}</label>
                @endif
                <x-forms.input-group style="height: 100px">
                    <x-forms.span>
                        Описание
                    </x-forms.span>
                    <x-forms.textarea name="discription">
                        {{ old("discription") ?? $todo->discription }}
                    </x-forms.textarea>
                </x-forms.input-group>
            </div>

            <div class="mb-3">
                <x-forms.input-group>
                    <x-forms.span>
                        Статус
                    </x-forms.span>
                    <x-forms.select name="is_done">
                        <x-slot name="first" value="1">
                            Выполнена
                        </x-slot>
                        <option value="0" {{ $todo->is_done ? "" : "selected"}}>Невыполнена</option>
                    </x-forms.select>
                </x-forms.input-group>
            </div>

            <div class="mb-3">
                <x-forms.input-group>
                    <x-forms.span>
                        Группа
                    </x-forms.span>
                    <x-forms.select name="group_id">
                        <x-slot name="first">
                            Без группы
                        </x-slot>
                        @foreach ($groups as $group)
                            <option {{ $group->id === $todo->group_id ? "selected" : "" }}
                            value="{{ $group->id }}">{{ $group->title }}</option>
                        @endforeach
                    </x-forms.select>
                </x-forms.input-group>
            </div>

            <div class="d-flex flex-wrap">
                <button type="submit" class="btn btn-primary m-1">Сохранить</button>
                <a class="btn btn-primary m-1" href="{{ route("todos.show", [$todo, "from" => $from]) }}">Назад</a>
            </div>
        </div>
    </x-forms.form>
@endsection