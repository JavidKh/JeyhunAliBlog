<label @if($required) class="required" @endif>{{ $label }} (<span id="{{ $name }}_selected"></span>)</label>
<div style="padding-bottom: 4px">
    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
</div>
<select
    class="form-control select2 {{ $errors->has($name) ? 'is-invalid' : '' }}"
    name="{{ $name }}[]" id="{{ $name }}" multiple
    onchange="$('#{{ $name }}_selected').html($('#{{ $name }} :selected').length)">
    @foreach($options as $id => $entry)
        <option value="{{ $id }}" {{ (in_array($id, old($name, [])) || ($value && $value->contains($id))) ? 'selected' : '' }}>{{ $entry }}</option>
    @endforeach
</select>
@if($errors->has($name))
    <span class="text-danger">{{ $errors->first($name) }}</span>
@endif
<span class="help-block">{{ $helper }}</span>
<script type="text/javascript">
    $(document).ready(function () {
        $('#{{ $name }}_selected').html($('#{{ $name }} :selected').length);
    });
</script>
