@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            @include('partials.buttons.add', ['url'=>route('offers.create')])
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Offers
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
                            Title
                        </th>
                        <th>
                            Content
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($offers as $offer)
                        <tr>
                            <td style="padding-left: 1vw">
                                {{$offer->id}}
                            </td>
                            <td>
                                {{$offer->title}}
                            </td>
                            <td>
                                {{$offer->content}}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('offers.edit', $offer->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                                <form action="{{ route('offers.delete', $offer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
