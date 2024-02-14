<div class="form-check">
    <input type="radio" name="{{ $attributes["name"] }}" value="{{ $attributes["value"] }}" id="{{ $attributes["target"] }}" class="form-check-input" {{ $attributes["checked"] ? "checked" : "" }}>
    <label for="{{ $attributes["target"] }}" class="form-check-label">
      {{ $attributes["content"] }}
    </label>
</div>