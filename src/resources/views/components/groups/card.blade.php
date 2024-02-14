<div class="card text-center mt-3">
    <div class="card-header">
        Группа № {{ $group->id }}
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $group->title }}</h5>
        <p class="card-text">{{ $group->discription }}</p>
        @forelse ($group->todos as $todo)
            <div class="list-group">
                <a href="{{ route("todos.show", [$todo, "from" => $group->id]) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $todo->title }}</h5>
                        <small class="text-body-secondary">{{ $todo->created_at }}</small>
                    </div>
                    <p class="mb-1">{{ $todo->discription ?? "Описание отсутствует" }}</p>
                    <small class="{{ $todo->is_done ? "text-success" : "text-muted" }}">Статус: {{ $todo->is_done ? "Выполнена" : "Невыполнена" }}</small>
                </a>
            </div>
        @empty
            <p class="mb-1">В группе пока нет задач</p>
        @endforelse
        {{ $controls }}
    </div>
    <div class="card-footer text-body-secondary">
        {{ $group->created_at }}
    </div>
</div>