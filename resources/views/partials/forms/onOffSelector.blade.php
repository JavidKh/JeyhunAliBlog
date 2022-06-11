<label @if($required) class="required" @endif>{{ $label }}</label>
<select class="form-control select2 {{ $errors->has($name) ? 'is-invalid' : '' }}"
        name="{{ $name }}" id="{{ $name }}" @if($required) required @endif >
    <option value="0">
        Off
    </option>
    <option value="1" {{ (int) old('status', $value) === 1 ? 'selected' : '' }}>
        On
    </option>
</select>
@if($errors->has($name))
    <span class="text-danger">{{ $errors->first($name) }}</span>
@endif
<span class="help-block">{{ $helper }}</span>
