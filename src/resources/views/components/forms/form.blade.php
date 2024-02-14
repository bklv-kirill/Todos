<form action="{{ $action }}" method="{{ in_array($method, ["GET", "POST"]) ? $method : "POST" }}" class="{{ $attributes["class"] }}">
    @csrf
    @method($method)

    {{ $slot }}
</form>