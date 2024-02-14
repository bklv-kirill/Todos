@extends('layouts.main')

@section('content')
    @section('title', "Редактирование группы №$group->id")

    <x-forms.form :action="route('groups.update', $group)" method="PATCH" class="card mt-3">
        <div class="card-header">Группа №{{ $group->id }}</div>

        <div class="card-body">
            <div class="mb-3">
                @if ($errors->has("title"))
                    <label class="form-label text-danger">{{ $errors->first("title") }}</label>
                @endif
                <x-forms.input-group>
                    <x-forms.span>
                        Название
                    </x-forms.span>
                    <x-forms.input type="text" name="title" :value="old('title') ?? $group->title"/>
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
                        {{ old("discription") ?? $group->discription }}
                    </x-forms.textarea>
                </x-forms.input-group>
            </div>

            <div class="d-flex flex-wrap">
                <button type="submit" class="btn btn-primary m-1">Сохранить</button>
                <a class="btn btn-primary m-1" href="{{ route("groups.show", $group) }}">Назад</a>
            </div>
        </div>
    </x-forms.form>
@endsection