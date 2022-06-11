@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            @include('partials.buttons.add', ['url'=>route('work_history.create')])
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Work History
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
                            Content
                        </th>
                        <th width="75">
                            From
                        </th>
                        <th width="75">
                            To
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($work_history as $history)
                        <tr>
                            <td style="padding-left: 1vw">{{$history->id}}</td>
                            <td>{{$history->content}}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($history->from)->format('d/m/Y')}}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($history->to)->format('d/m/Y')}}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('work_history.edit', $history->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                                <form action="{{ route('work_history.delete', $history->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

