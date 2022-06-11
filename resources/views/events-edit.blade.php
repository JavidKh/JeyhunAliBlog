@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Events
        </div>

        <div class="card-body">
            <form method="POST" action={{route('events.update', $event->id)}}
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-10">
                        @include('partials.forms.input', [
                                'value' => $event->title,
                                'name' => 'title',
                                'type' => 'text',
                                'required' => true,
                                'label' => 'Title',
                                'helper' => '',
                                'errors' => $errors
                            ]
                        )
                    </div>
                    <div class="form-group col-lg-10">
                        @include('partials.forms.ckeditor', [
                                    'value' => $event->content,
                                    'name' => 'content',
                                    'required' => true,
                                    'label' => 'Content',
                                    'helper' => '',
                                    'errors' => $errors
                                ]
                            )
                    </div>
                    <div class="form-group col-lg-10">
                        <img src={{$event->photo}} >
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <input name="photo" class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <hr/>
                    @include('partials.buttons.save')
                    @include('partials.buttons.back', ['url'=>route('events')])
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
