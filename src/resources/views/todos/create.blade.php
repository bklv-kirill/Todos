@extends('layouts.main')

@section('content')
    @section('title', "Новая задача")

    <x-forms.form :action="route('todos.store')" method="POST" class="card mt-3">
        <div class="card-header">Новая задача</div>

        <div class="card-body">
            <div class="mb-3">
                @if ($errors->has("title"))
                    <label class="form-label text-danger">{{ $errors->first("title") }}</label>
                @endif

                <x-forms.input-group>
                    <x-forms.span>
                        Название
                    </x-forms.span>
                    <x-forms.input type="text" name="title" :value="old('title')" />
                </x-forms.input-group>
            </div>

            <div class="mb-3">
                @if ($errors->has("discription"))
                    <label class="form-label text-danger">{{ $errors->first("discription") }}</label>
                @endif

                <x-forms.input-group>
                    <x-forms.span>
                        Описание
                    </x-forms.span>
                    <x-forms.textarea name="discription">
                        {{ old("discription") }}
                    </x-forms.textarea>
                </x-forms.input-group>
            </div>

            <div class="mb-3">
                <x-forms.input-group>
                    <x-forms.span id="inputGroup-sizing-default">
                        Группа
                    </x-forms.span>
                    <x-forms.select name="group_id">
                        <x-slot name="first">
                            Без группы
                        </x-slot>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->title }}</option>
                        @endforeach
                    </x-forms.select>
                </x-forms.input-group>
            </div>

            <button type="submit" class="btn btn-primary">Создать</button>
            <a href="{{ route("todos.index") }}" class="btn btn-primary">Назад</a>
        </div>
    </x-forms.form>
@endsection