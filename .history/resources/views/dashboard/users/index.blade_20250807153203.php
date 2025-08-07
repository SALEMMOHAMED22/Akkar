@extends('layouts.dashboard.master')

@section('title', 'Users')

@section('content')

    <p class="card-text">{{ __('dashboard.table_paragraph') }}.</p>
    <table id="yajra_table" class="table table-striped table-bordered language-file">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('dashboard.name') }}</th>
                <th>{{ __('dashboard.email') }}</th>
                <th>{{ __('dashboard.email_verified_at') }}</th>
                <th>{{ __('dashboard.status') }}</th>
                <th>{{ __('dashboard.country') }}</th>
                <th>{{ __('dashboard.governorate') }}</th>
                <th>{{ __('dashboard.city') }}</th>
                {{-- <th>{{ __('dashboard.num_of_orders') }}</th> --}}
                <th>{{ __('dashboard.created_at') }}</th>
                <th>{{ __('dashboard.actions') }}</th>
            </tr>
        </thead>

        <body>
            {{-- empty --}}
        </body>
        <tfoot>
            <tr>
                <th>#</th>
                <th>{{ __('dashboard.name') }}</th>
                <th>{{ __('dashboard.email') }}</th>
                <th>{{ __('dashboard.email_verified_at') }}</th>
                <th>{{ __('dashboard.status') }}</th>
                <th>{{ __('dashboard.country') }}</th>
                <th>{{ __('dashboard.governorate') }}</th>
                <th>{{ __('dashboard.city') }}</th>
                {{-- <th>{{ __('dashboard.num_of_orders') }}</th> --}}
                <th>{{ __('dashboard.created_at') }}</th>
                <th>{{ __('dashboard.actions') }}</th>
            </tr>
        </tfoot>
    </table>
@endsection
