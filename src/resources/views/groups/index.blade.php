@extends('layouts.main')

@section('content')
    @section('title', "Группы")

    <x-forms.form :action="route('groups.index')" method="GET" class="mt-3">
        <x-forms.input-group class="mb-3">
            <x-forms.span>
                Поиск
            </x-forms.span>
            <x-forms.input type="text" name="title" :value="isset($filtersData['title']) ? $filtersData['title'] : ''"/>
        </x-forms.input-group>

        <div class="d-flex mb-3">
            <fieldset>
                <x-forms.form-check name="date" value="new" content="Сначала новые" target="flexRadioDefault" :checked="isset($filtersData['date']) ? $filtersData['date'] === 'new' ? true : false : true" />
                <x-forms.form-check name="date" value="old" content="Сначала старые" target="flexRadioDefault2" :checked="isset($filtersData['date']) && $filtersData['date'] === 'old' ? true : false" />
            </fieldset>
        </div>

        <button type="submit" class="btn btn-primary">Выполнить сортировку</button>
    </x-forms.form>

    @forelse ($groups as $group)
    <x-groups.card :group="$group">
        <x-slot name="controls">
            <a href="{{ route("groups.show", $group) }}" class="btn btn-primary mt-3">Показать</a>
        </x-slot>
    </x-groups.card>
    @empty
        <h2 class="m-3 text-center text-muted">Групп нет</h2>
    @endforelse
    <div class="mt-3">
        {{ $groups->withQueryString()->links() }}
    </div>
@endsection