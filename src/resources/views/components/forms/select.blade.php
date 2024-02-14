<select name="{{ $attributes["name"] }}" class="form-select" aria-label="Default select example">
    <option value="{{ $first->attributes["value"] }}">{{ $first }}</option>

    {{ $slot }}
</select>