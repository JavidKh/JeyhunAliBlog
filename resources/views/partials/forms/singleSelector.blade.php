<label @if($required) class="required" @endif>{{ $label }}</label>
<select class="form-control select2 {{ $errors->has($name) ? 'is-invalid' : '' }}"
        name="{{ $name }}" id="{{ $name }}" @if($required) required @endif
        @if(isset($onchange)) onchange="{{ $onchange }}" @endif
>
    @foreach($options as $id => $entry)
        <option value="{{ $id }}" {{ old($name, $value) == $id ? 'selected' : '' }}>{{ $entry }}</option>
    @endforeach
</select>
@if($errors->has($name))
    <span class="text-danger">{{ $errors->first($name) }}</span>
@endif
<span class="help-block">{{ $helper }}</span>
