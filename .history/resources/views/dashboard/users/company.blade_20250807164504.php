@extends('layouts.dashboard.master')

@section('title', __('dashboard.users'))

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="card-text">{{ __('dashboard.table_paragraph') }}.</p>

            <div class="table-responsive">
                <table id="yajra_table" class="table table-striped table-bordered language-file">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('dashboard.type') }}</th>
                            <th>{{ __('dashboard.company_name') }}</th>
                            <th>{{ __('dashboard.email') }}</th>
                            <th>{{ __('dashboard.phone') }}</th>
                            <th>{{ __('dashboard.national_id') }}</th>
                            <th>{{ __('dashboard.company_type') }}</th>
                            <th>{{ __('dashboard.email_notification') }}</th>
                            <th>{{ __('dashboard.created_at') }}</th>
                            <th>{{ __('dashboard.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody></tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>{{ __('dashboard.type') }}</th>
                            <th>{{ __('dashboard.company_name') }}</th>
                            <th>{{ __('dashboard.email') }}</th>
                            <th>{{ __('dashboard.phone') }}</th>
                            <th>{{ __('dashboard.national_id') }}</th>
                            <th>{{ __('dashboard.company_type') }}</th>
                            <th>{{ __('dashboard.email_notification') }}</th>
                            <th>{{ __('dashboard.created_at') }}</th>
                            <th>{{ __('dashboard.actions') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(function () {
            var lang = "{{ app()->getLocale() }}";

            $('#yajra_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.users.company') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'type', name: 'type' },
                    { data: 'company_name', name: 'company_name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'national_id', name: 'national_id' },
                    { data: 'company_type', name: 'company_type' },
                    { data: 'email_notification', name: 'email_notification' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
                responsive: true,
                colReorder: true,
                fixedHeader: true,
                dom: 'Blfrtip',
                buttons: ['colvis', 'copy', 'print', 'excel', 'pdf'],
                language: lang === 'ar' ? {
                    url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/ar.json',
                } : {},
            });
        });
    </script>
@endpush
