@extends('layouts.dashboard.master')


@section('title', 'Edit Admin')

@section('content')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="card shadow rounded-4">
                <div class="card-header text-center">
                    <h5 class="mb-0">Edit Admin</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.admins.update', $admin->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                <input name="name" type="text" class="form-control"
                                    value="{{ old('name', $admin->name) }}" placeholder="Enter Name" />
                            </div>
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input name="email" type="email" class="form-control"
                                    value="{{ old('email', $admin->email) }}" placeholder="Enter Email" />
                            </div>
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div class="mb-3">
                            <label class="form-label">Select Role</label>
                            <select class="form-select" name="role_id">
                                <option disabled>Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ $admin->role_id == $role->id ? 'selected' : '' }}>
                                        {{ app()->getLocale() == 'ar' ? $role->role_ar : $role->role_en }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label class="form-label">Select Status</label>
                            <select class="form-select" name="status">
                                <option disabled>Select Status</option>
                                <option value="1" {{ $admin->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $admin->status == 'Inactve' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@endsection
