@extends('layouts.main')

@section('content')
    @section('title', "Новая группа")

    <x-forms.form :action="route('groups.store')" method="POST" class="card mt-3">
        <div class="card-header">Новая Группа</div>

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

            <button type="submit" class="btn btn-primary">Создать</button>
            <a href="{{ route("groups.index") }}" class="btn btn-primary">Назад</a>
        </div>
    </x-forms.form>
@endsection