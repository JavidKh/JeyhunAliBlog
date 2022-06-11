<div class="form-check {{ $errors->has($name) ? 'is-invalid' : '' }}">
    <input type="hidden" name="{{ $name }}" value="0">
    <input class="form-check-input" type="checkbox" name="{{ $name }}" id="{{ $name }}"
           value="1" {{ old($name, $value) == 1 ? 'checked' : '' }}>
    <label class="form-check-label"
           for="external">{{ $label }}</label>
</div>
@if($errors->has($name))
    <span class="text-danger">{{ $errors->first($name) }}</span>
@endif
<span class="help-block">{{ $helper }}</span>
