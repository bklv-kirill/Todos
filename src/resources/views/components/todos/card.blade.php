<div class="card mt-3">
    <div class="card-header">Задача №{{ $todo->id }}</div>
    <div class="card-body">
        <h5 class="card-title">{{ $todo->title }}</h5>
        <h5 class="card-text">Группа:
            {{ $todo->group->title }}
        </h5>
        <p class="card-text {{ $todo->is_done ? "text-success" : "text-muted" }}">
            Статус: {{ $todo->is_done ? "Выполнена" : "Невыполнена" }}
        </p>

        {{ $slot }}

        <div class="d-flex flex-wrap">
            {{ $controls }}

            <x-forms.form :action="route('todos.delete', [$todo, 'from' => $from])" method="DELETE" class="m-1">
                <button type="submit" class="btn btn-danger">Удалить</button>
            </x-forms.form>
        </div>
    </div>
</div>