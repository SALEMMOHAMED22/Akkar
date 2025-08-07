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
     var lang = "{{ app()->getLocale() }}";

     $('#yajra_table').DataTable({
            processing: true,
            serverSide: true,
            fixedHeader: true,

            colReorder: true,
            // rowReorder: true,
            // scroller: true,
            // scrollY: 900,
            select: true,
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Details for user ' + data['name'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            ajax: "{{ route('dashboard.users.company') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'type',
                    // name: 'name',
                },
                {
                    data: 'company_name',
                    // name: 'logo',
                },
                {
                    data: 'email',
                    // name: 'status',
                },
                {
                    data: 'phone',
                    // name: 'status',
                },
                {
                    data: 'national_id',
                    // name: 'products_count',
                },
                {
                    data: 'company_type',
                    // name: 'created_at'

                },
                {
                    data: 'email_notification',
                    // name: 'created_at'

                },

                {
                    data: 'created_at',
                    // name: 'created_at'

                },
                {
                    data: 'action',
                    searchable: false,
                    orderable: false,
                },

            ],
            layout: {
                topStart: {
                    buttons: ['colvis', 'copy', 'print', 'excel', 'pdf']
                }
            },


            language: lang === 'ar' ? {
                url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/ar.json',
            } : {},


        });
   </script>
@endpush
