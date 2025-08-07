@extends('layouts.dashboard.master')

@section('title', 'Users')

@section('content')

    <p class="card-text">{{ __('dashboard.table_paragraph') }}.</p>
    <table id="yajra_table" class="table table-striped table-bordered language-file">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('dashboard.type') }}</th>
                <th>{{ __('dashboard.name') }}</th>
                <th>{{ __('dashboard.email') }}</th>
                <th>{{ __('dashboard.phone') }}</th>
                <th>{{ __('dashboard.age') }}</th>
                <th>{{ __('dashboard.job_title') }}</th>
                <th>{{ __('dashboard.email_notification') }}</th>
                <th>{{ __('dashboard.national_id') }}</th>
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
                <th>{{ __('dashboard.type') }}</th>
                <th>{{ __('dashboard.name') }}</th>
                <th>{{ __('dashboard.email') }}</th>
                <th>{{ __('dashboard.phone') }}</th>
                <th>{{ __('dashboard.age') }}</th>
                <th>{{ __('dashboard.job_title') }}</th>
                <th>{{ __('dashboard.email_notification') }}</th>
                <th>{{ __('dashboard.national_id') }}</th>
                <th>{{ __('dashboard.created_at') }}</th>
                <th>{{ __('dashboard.actions') }}</th>
            </tr>
        </tfoot>
    </table>
@endsection

@push('js')
   script
@endpush
