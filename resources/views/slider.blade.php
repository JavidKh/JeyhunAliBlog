@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            @include('partials.buttons.add', ['url'=>route('slider.create')])
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Slider
        </div>

        <div class="card-body">
            <div class="row">
                @foreach($photos as $photo)
                    <div class="form-group col-lg-4">
                        <form method="POST" action={{route('slider.update', $photo->id)}}
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-lg-10">
                                <img src={{$photo->image}} >
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input name="photo" class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <br>
                            <div style="display: inline-block" class="form-group">
                                @include('partials.buttons.save')
                            </div>
                        </form>
                        <div style="display: inline-block">
                            <form action="{{ route('slider.delete', $photo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-danger" style="width: 5vw; display: inline-block; margin-top: -8.5vh; margin-left: 6vw" value="{{ trans('global.delete') }}">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <hr/>
                @include('partials.buttons.back', ['url'=>route('home')])
            </div>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        var tnum = 0;

        function addTitle(title, value) {
            $('#titles').append("<div class='customTitle'>"
                + "<input type='text' class='form-control col-lg-2 bold' name='titles[" + tnum + "]' id='ctitle" + tnum + "'>"
                + "<input type='text' class='form-control col-lg-10' name='values[" + tnum + "]' id='cval" + tnum + "'>"
                + "</div>"
            );
            $('#ctitle' + tnum).val(title);
            $('#cval' + tnum).val(value);
            tnum++;
        }
    </script>
@endsection
