@extends('layouts.main')

@section('content')
    @section('title', "Задачи")

    <x-forms.form :action="route('todos.index')" method="GET" class="mt-3">
        <x-forms.input-group class="mb-3">
            <x-forms.span>
                Поиск
            </x-forms.span>
            <x-forms.input type="text" name="title" :value="isset($filtersData['title']) ? $filtersData['title'] : ''" />
        </x-forms.input-group>

        <x-forms.input-group class="mb-3"> 
            <x-forms.span>
                Группа
            </x-forms.span>
            <x-forms.select name="group_id">
                <x-slot name="first">
                    Без группы
                </x-slot>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}" {{ isset($filtersData["group_id"]) && $filtersData["group_id"] == $group->id ? "selected" : "" }}>{{ $group->title }}</option>
                @endforeach
            </x-forms.select>
        </x-forms.input-group>

        <div class="d-flex mb-3">
            <fieldset>
                <x-forms.form-check name="status" value="all" content="Все" target="flexRadioDefault" :checked="isset($filtersData['status']) ? ($filtersData['status'] === 'all' ? true : false) : true" />
                <x-forms.form-check name="status" value="done" content="Только выполненные" target="flexRadioDefault2" :checked="isset($filtersData['status']) && $filtersData['status'] === 'done' ? true : false" />
                <x-forms.form-check name="status" value="ndone" content="Только невыполненные" target="flexRadioDefault3" :checked="isset($filtersData['status']) && $filtersData['status'] === 'ndone' ? true : false" />
            </fieldset>
            <fieldset>
                <x-forms.form-check name="date" value="new" content="Сначала новые" target="flexRadioDefault4" :checked="isset($filtersData['date']) ? $filtersData['date'] === 'new' ? true : false : true" />
                <x-forms.form-check name="date" value="old" content="Сначала старые" target="flexRadioDefault5" :checked="isset($filtersData['date']) && $filtersData['date'] === 'old' ? true : false" />
            </fieldset>
        </div>

        <button type="submit" class="btn btn-primary">Выполнить сортировку</button>
    </x-forms.form>

    @forelse ($todos as $todo)
        <x-todos.card :todo="$todo" from="todos">
            <x-slot name="controls">
                <a class="btn btn-primary m-1" href="{{ route("todos.show", [$todo, "from" => "todos"] ) }}">Показать</a>
            </x-slot>
        </x-todos.card>
    @empty
        <h2 class="m-3 text-center text-muted">Задач нет</h2>
    @endforelse
    <div class="mt-3">
        {{ $todos->withQueryString()->links() }}
    </div>
@endsection