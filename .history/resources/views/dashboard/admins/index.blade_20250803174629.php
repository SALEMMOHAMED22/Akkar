@extends('layouts.dashboard.master')


@section('title', 'Admins')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card shadow rounded-4">
                <div class="card-header text-center">
                    <h5 class="mb-0">Admins</h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($admins as $admin)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ app()->getLocale() == 'ar' ? $admin->role->role_ar : $admin->role->role_en }}
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $admin->status ? 'success' : 'secondary' }}">
                                            {{ $admin->status }}
                                        </span>
                                    </td>
                                    <td>{{ $admin->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.admins.edit', $admin->id) }}"
                                            class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>

                                        <form action="{{ route('dashboard.admins.destroy', $admin->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')"
                                                class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                                        </form>
                                        
                                        <form id="delete-form-{{ $admin->id }}"
                                            action="{{ route('dashboard.admins.destroy', $admin->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" data-id="{{ $admin->id }}"
                                                class="btn btn-sm btn-outline-danger delete-btn">
                                                <i class="fas fa-trash me-1"></i>
                                                {{ __('dashboard.delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No admins found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination (if needed) -->
                    <div class="d-flex justify-content-center">
                        {{ $admins->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success me-2",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });

            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function() {
                    const id = this.getAttribute("data-id");
                    const form = document.getElementById(`delete-form-${id}`);

                    swalWithBootstrapButtons.fire({
                        title: "{{ __('dashboard.are_you_sure') }}",
                        text: "{{ __('dashboard.delete_message') }}",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "{{ __('dashboard.yes_delete_it') }}",
                        cancelButtonText: "{{ __('dashboard.no_cancel') }}",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire({
                                title: "{{ __('dashboard.cancelled') }}",
                                text: "{{ __('dashboard.cancelled_message') }}",
                                icon: "error"
                            });
                        }
                    });
                });
            });
        });
    </script>
@endpush
