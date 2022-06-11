<label @if($required) class="required" @endif for="{{ $name }}">{{ $label }}</label>
<textarea class="form-control {{ $class??'ckeditor' }}   {{ $errors->has($name) ? 'is-invalid' : '' }}"
          name="{{ $name }}"
          id="{{ $name }}" @if($required) required @endif>{!! old($name, $value) !!}</textarea>
@if($errors->has($name))
    <span class="text-danger">{{ $errors->first($name) }}</span>
@endif
<span class="help-block">{{ $helper }}</span>
