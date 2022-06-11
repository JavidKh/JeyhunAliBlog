@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            @include('partials.buttons.add', ['url'=>route('youtube.create')])
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Youtube Videos
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" {{ config('panel.datatables.css') }} datatable-UserAlert">
                    <thead>
                    <tr>
                        <th>
                            id
                        </th>
                        <th>
                            Url
                        </th>
                        <th>

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($links as $link)
                        <tr>
                            <td style="padding-left: 1vw">{{$link->id}}</td>
                            <td>{{$link->url}}</td>
                            <td>
                                <form action="{{ route('youtube.delete', $link->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('partials.scripts.dataTableButtons', [
     'route'=>'user-alerts',
     'order'=>'[[ 1, "asc" ]]',
     'pageLength'=>10
    ])
@endsection
