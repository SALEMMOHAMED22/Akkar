@extends('layouts.dashboard.master')

@section('title', __('dashboard.users'))

@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('dashboard.users_list') }}</h5>
            <small class="text-muted">{{ __('dashboard.table_paragraph') }}.</small>
        </div>

        <div class="card-body">
            <div class="table-responsive">
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
                            <th>{{ __('dashboard.is_active') }}</th>
                            <th>{{ __('dashboard.national_id') }}</th>
                            <th>{{ __('dashboard.created_at') }}</th>
                            <th>{{ __('dashboard.image') }}</th>
                            <th>{{ __('dashboard.personal_photo') }}</th>
                            <th>{{ __('dashboard.national_id_front') }}</th>
                            <th>{{ __('dashboard.national_id_back') }}</th>
                            <th>{{ __('dashboard.engineer_card_front') }}</th>
                            <th>{{ __('dashboard.engineer_card_back') }}</th>
                            <th>{{ __('dashboard.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
                            <th>{{ __('dashboard.is_active') }}</th>
                            <th>{{ __('dashboard.national_id') }}</th>
                            <th>{{ __('dashboard.created_at') }}</th>
                            <th>{{ __('dashboard.image') }}</th>
                            <th>{{ __('dashboard.personal_photo') }}</th>
                            <th>{{ __('dashboard.national_id_front') }}</th>
                            <th>{{ __('dashboard.national_id_back') }}</th>
                            <th>{{ __('dashboard.engineer_card_front') }}</th>
                            <th>{{ __('dashboard.engineer_card_back') }}</th>
                            <th>{{ __('dashboard.actions') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-transparent border-0 shadow-none">
                <img src="" class="img-fluid rounded" alt="Preview">
            </div>
        </div>
    </div>


@endsection

@push('css')
    <style>
        #yajra_table td,
        #yajra_table th {
            vertical-align: middle;
            text-align: center;
        }

        #yajra_table img {
            border-radius: 8px;
            transition: transform 0.2s ease-in-out;
        }

        #yajra_table img:hover {
            transform: scale(1.3);
        }
    </style>
@endpush

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
            ajax: "{{ route('dashboard.users.individual') }}",
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
                    data: 'name',
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
                    data: 'age',
                    // name: 'products_count',
                },
                {
                    data: 'job_title',
                    // name: 'created_at'

                },
                {
                    data: 'email_notification',
                    // name: 'created_at'

                },

                {
                    data: 'is_active',
                    // name: 'created_at'

                },
                {
                    data: 'national_id',
                    // name: 'created_at'

                },

                {
                    data: 'created_at',
                    // name: 'created_at'

                },
                {
                    data: 'image',
                    // name: 'created_at'

                },
                {
                    data: 'personal_photo',
                    // name: 'created_at'

                },
                {
                    data: 'national_id_front',
                    // name: 'created_at'

                },
                {
                    data: 'national_id_back',
                    // name: 'created_at'

                },
                {
                    data: 'engineer_card_front',
                    // name: 'created_at'

                },
                {
                    data: 'engineer_card_back',
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


    <script>
        $(document).on('click', '.datatable-image', function() {
            var src = $(this).attr('src');
            $('#imageModal img').attr('src', src);
            $('#imageModal').modal('show');
        });
    </script>

    <script>
        // change Status
        $(document).on('click', '.status_btn', function(e) {
            e.preventDefault();

            var currentPage = $('#yajra_table').DataTable().page(); // get the current page number

            var user_id = $(this).attr('user-id');

            $.ajax({
                url: "{{ route('dashboard.users.status') }}",
                method: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: user_id,

                }

                ,

                success: function(data) {
                    if (data.status == 'success') {
                        $('#yajra_table').DataTable().page(currentPage).draw(false);
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            position: "top-center",
                            icon: "error",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }

                },
                error: function(data) {
                    if (data.responseJSON.errors) {
                        $.each(data.responseJSON.errors, function(key, value) {
                            $('#error_list').append('<li>' + value[0] + '</li>');
                            $('#error_div').show();
                        });
                    }
                }
            });
        });
    </script>
@endpush
