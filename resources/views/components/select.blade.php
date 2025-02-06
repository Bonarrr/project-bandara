<select name="{{ $name }}" id="{{ $name }}" class="form-select">
    <option value="" disabled {{ $selected ? '' : 'selected' }}>
        {{ $placeholder }}
    </option>
    @foreach ($options as $key => $value)
        <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>
            {{ $value }}
        </option>
    @endforeach
</select>
