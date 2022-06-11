<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jeyhun Ali</title>
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"/>
    <link href="{{ asset('css/libs/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/libs/jquery-ui.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/libs/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/libs/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/libs/jquery.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/libs/buttons.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/libs/select.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/libs/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/libs/dropzone.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/libs/noty.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/libs/adminlte.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @yield('styles')

    <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
</head>

<body class="sidebar-mini layout-fixed" style="height: auto;">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        @if(count(config('panel.available_languages', [])) > 1)
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach(config('panel.available_languages') as $langLocale => $langName)
                            <a class="dropdown-item"
                               href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
                                ({{ $langName }})</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        @endif


    </nav>

    @include('partials.menu')
    <div class="content-wrapper" style="min-height: 917px;">
        <!-- Main content -->
        <section class="content" style="padding-top: 20px">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> {{ config('app.version') }}
        </div>
        <strong> &copy; {{ trans('panel.project_title') }}</strong> - {{ trans('global.allRightsReserved') }}
    </footer>
</div>
<script src="{{ asset('js/libs/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/libs/popper.min.js') }}"></script>
<script src="{{ asset('js/libs/select2.full.min.js') }}"></script>
<script src="{{ asset('js/libs/moment.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/libs/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/libs/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/libs/dataTables.select.min.js') }}"></script>
<script src="{{ asset('js/libs/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('js/libs/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/libs/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/libs/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/libs/vfs_fonts.min.js') }}"></script>
<script src="{{ asset('js/libs/jszip.min.js') }}"></script>
<script src="{{ asset('js/libs/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/libs/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/libs/dropzone.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery.mjs.nestedSortable.js') }}"></script>
<script src="{{ asset('js/libs/noty.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    $(function () {
        let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
        let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
        let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
        let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
        let printButtonTrans = '{{ trans('global.datatables.print') }}'
        let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
        let selectAllButtonTrans = '{{ trans('global.select_all') }}'
        let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

        let languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };

        $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                url: languages['{{ app()->getLocale() }}']
            },
            columnDefs: [{
                orderable: false,
                className: 'select-checkboxs',
                targets: 0
            }, {
                orderable: false,
                searchable: false,
                targets: -1
            }],
            order: [],
            scrollX: true,
            pageLength: 100,
            dom: 'lBfrtip<"actions">',
            buttons: [
                {
                    extend: 'copy',
                    className: 'btn btn-default',
                    text: copyButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    className: 'btn btn-default',
                    text: csvButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn btn-default',
                    text: excelButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-default',
                    text: pdfButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-default',
                    text: printButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    className: 'btn btn-default',
                    text: colvisButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ]
        });

        $.fn.dataTable.ext.classes.sPageButton = '';
    });

</script>
<script>
    $(document).ready(function () {
        $(".notifications-menu").on('click', function () {
            if (!$(this).hasClass('open')) {
                $('.notifications-menu .label-warning').hide();
                $.get('/admin/user-alerts/read');
            }
        });
    });
</script>
@if(session('message'))
    <script>
        $(document).ready(function () {
            showNotySuccess("{{ session('message') }}");
        })
    </script>
@endif

@if($errors->count() > 0)
    @foreach($errors->all() as $error)
        <script>
            $(document).ready(function () {
                showNotyError("{{ $error }}");
            })
        </script>
    @endforeach
@endif
<script src="{{ asset('js/libs/adminlte.min.js') }}"></script>
@yield('scripts')
</body>

</html>
