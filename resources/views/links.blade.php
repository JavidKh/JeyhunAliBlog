@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Links
        </div>

        <div class="card-body">
            <form method="POST" action={{route('links.update')}}
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-6">
                        @include('partials.forms.input', [
                                'value' => $links->twitter,
                                'name' => 'twitter',
                                'type' => 'text',
                                'required' => false,
                                'label' => 'Twitter',
                                'helper' => '',
                                'errors' => $errors
                            ]
                        )
                    </div>
                    <div class="form-group col-lg-6">
                        @include('partials.forms.input', [
                                'value' => $links->instagram,
                                'name' => 'instagram',
                                'type' => 'text',
                                'required' => false,
                                'label' => 'Instagram',
                                'helper' => '',
                                'errors' => $errors
                            ]
                        )
                    </div>
                    <div class="form-group col-lg-6">
                        @include('partials.forms.input', [
                                'value' => $links->facebook,
                                'name' => 'facebook',
                                'type' => 'text',
                                'required' => false,
                                'label' => 'Facebook',
                                'helper' => '',
                                'errors' => $errors
                            ]
                        )
                    </div>
                    <div class="form-group col-lg-6">
                        @include('partials.forms.input', [
                                'value' => $links->linkedin,
                                'name' => 'linkedin',
                                'type' => 'text',
                                'required' => false,
                                'label' => 'Linkedin',
                                'helper' => '',
                                'errors' => $errors
                            ]
                        )
                    </div>
                    <div class="form-group col-lg-6">
                        @include('partials.forms.input', [
                                'value' => $links->youtube,
                                'name' => 'youtube',
                                'type' => 'text',
                                'required' => false,
                                'label' => 'Youtube',
                                'helper' => '',
                                'errors' => $errors
                            ]
                        )
                    </div>
                    <div class="form-group col-lg-6">
                        @include('partials.forms.input', [
                                'value' => $links->whatsapp,
                                'name' => 'whatsapp',
                                'type' => 'text',
                                'required' => false,
                                'label' => 'Whatsapp',
                                'helper' => '',
                                'errors' => $errors
                            ]
                        )
                    </div>
                </div>
                <div class="form-group">
                    <hr/>
                    @include('partials.buttons.save')
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
