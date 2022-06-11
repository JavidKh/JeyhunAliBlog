<label @if($required) class="required" @endif for="{{ $name }}">{{ $label }}</label>
<div class="input-group">
    @if(isset($prepend))
        <div class="input-group-prepend">
            <span class="input-group-text"><em class="{{ $prepend }}"></em></span>
        </div>
    @endif

    <input class="form-control @if(isset($class)) {{ $class }} @endif {{ $errors->has($name) ? 'is-invalid' : '' }}"
           type="{{ $type }}"
           @if(isset($step)) step="{{ $step }}" @endif
           name="{{ $name }}" id="{{ $name }}"
           value="{{ old($name, $value) }}" @if($required) required @endif
           @if(isset($disabled) && $disabled) disabled @endif
    >

    @if(isset($append))
        <div class="input-group-append">
            <span class="input-group-text"><em class="{{ $append }}"></em></span>
        </div>
    @endif

</div>
@if($errors->has($name))
    <span class="text-danger">{{ $errors->first($name) }}</span>
@endif
<span class="help-block">{{ $helper }}</span>
