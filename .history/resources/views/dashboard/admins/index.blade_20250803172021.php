@extends('layouts.dashboard.master')


@section('title' , 'Admins')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div class="card shadow rounded-4">
            <div class="card-header text-center">
                <h5 class="mb-0">Admins List</h5>
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
                                <td>{{ app()->getLocale() == 'ar' ? $admin->role->role_ar : $admin->role->role_en }}</td>
                                <td>
                                    <span class="badge bg-{{ $admin->status ? 'success' : 'secondary' }}">
                                        {{ $admin->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $admin->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('dashboard.admins.edit', $admin->id) }}" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                    <form action="{{ route('dashboard.admins.destroy', $admin->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
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

