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
            ajax: "{{ route('dashboard.users.all') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'name',
                    // name: 'name',
                },
                {
                    data: 'email',
                    // name: 'logo',
                },
                {
                    data: 'email_verified_at',
                    // name: 'status',
                },
                {
                    data: 'is_active',
                    // name: 'status',
                },
                {
                    data: 'country',
                    // name: 'products_count',
                },
                {
                    data: 'governorate',
                    // name: 'created_at'

                },
                {
                    data: 'city',
                    // name: 'created_at'

                },
                // {
                //     data: 'num_of_orders',
                //     // name: 'created_at'

                // },

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
@endpush