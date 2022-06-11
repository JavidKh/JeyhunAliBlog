@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Work History
        </div>

        <div class="card-body">
            <form method="POST" action={{route('work_history.add')}}
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-6">
                        @include('partials.forms.input', [
                                'value' => "",
                                'name' => 'from',
                                'type' => 'date',
                                'format' => 'dd-mm-yyyy',
                                'required' => true,
                                'label' => 'From',
                                'helper' => '',
                                'errors' => $errors
                            ]
                        )
                    </div>
                    <div class="form-group col-lg-6">
                        @include('partials.forms.input', [
                                'value' => "",
                                'name' => 'to',
                                'type' => 'date',
                                'required' => true,
                                'label' => 'To',
                                'helper' => '',
                                'errors' => $errors
                            ]
                        )
                    </div>
                    <div class="form-group col-lg-12">
                        @include('partials.forms.ckeditor', [
                                    'value' => "",
                                    'name' => 'content',
                                    'required' => true,
                                    'label' => 'Content',
                                    'helper' => '',
                                    'errors' => $errors
                                ]
                            )
                    </div>
                </div>
                <div class="form-group">
                    <hr/>
                    @include('partials.buttons.save')
                    @include('partials.buttons.back', ['url'=>route('work_history')])
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
