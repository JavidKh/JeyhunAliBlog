<div class="alert alert-info small">
    <i class="fa fa-comment"></i>
    &nbsp;&nbsp;Drag &amp; Drop {{ $title }} from the left over to the right side.
</div>
<br/>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;Available {{ ucfirst($title) }}
            </div>
            <div class="panel-body well">
                <ul id="in_available_fields" name="in_available_fields"
                    class="sortable-list fixed-panel ui-sortable">
                    @foreach($items as $key => $item)
                        <li class="sortable-item allowPrimary" data-fid="{{ $item->id }}">

                            @if(isset($imageKey))
                                <div class="admin-image-outer"
                                     style="height:15px; width:50px; float:left; padding-right:10px;">
                                    {{ $item->$imageKey }}
                                </div>
                            @endif
                            {{ $item->$titleKey }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary primaryPanel">
            <div class="panel-heading"><i class="fa fa-star"></i>&nbsp;&nbsp;Selected {{ ucfirst($title) }}</div>
            <div class="panel-body well">
                <div class="alert alert-warning small">
                    No {{ ucfirst($title) }} Selected
                </div>
                <ul name="in_primary_fields" id="in_primary_fields" class="sortable-list primaryDropzone fixed-panel">
                    @foreach($selected??[] as $key => $item)
                        <li class="sortable-item allowPrimary ui-sortable-handle" data-fid="{{ $item->id }}">
                            @if(isset($imageKey))
                                <div class="admin-image-outer"
                                     style="height:15px; width:50px; float:left; padding-right:10px;">
                                    {{ $item->$imageKey }}
                                </div>
                            @endif
                            {{ $item->$titleKey }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <select name="{{ $name }}[]" id="in_primary_select" multiple></select>
    </div>
</div>
