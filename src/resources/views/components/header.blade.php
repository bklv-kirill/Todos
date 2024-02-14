<nav class="navbar navbar-expand-md bg-body-tertiary">
    <div class="container-fluid">
        <a class="nav-link {{ Request::is('todos') ? "active" : "text-muted"}}" href="{{ route("todos.index") }}">Todos</a>
        <button type="button" class="navbar-toggler"  data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link {{ Request::is('groups') ? "active" : "text-muted"}}" aria-current="page" href="{{ route("groups.index") }}">Groups</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link {{ Request::is('todos/create') ? "active" : "text-muted"}}" aria-current="page" href="{{ route("todos.create") }}">Add new Todo</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link {{ Request::is('groups/create') ? "active" : "text-muted"}}" aria-current="page" href="{{ route("groups.create") }}">Add new Group</a>
            </div>
        </div>
        <span class="text-primary">{{ Auth::user()->login }}</span>
        <div class="navbar-nav">
            <a class="nav-link" aria-current="page" href="{{ route("user.logout") }}">Log Out</a>
        </div>
    </div>
</nav>