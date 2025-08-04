@extends('layouts.dashboard.master')


@section('title', 'Create Admin')

@section('content')
 <div class="row justify-content-center mt-4">
    <div class="col-md-9">
        <div class="card shadow rounded-4">
            <div class="card-header text-center">
                <h5 class="mb-0">Create Admin</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.admins.store') }}" method="POST">
                    @csrf

                    <!-- Full Name -->
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                            <input name="name" type="text" class="form-control" placeholder="Enter Name" />
                            @error()
                                
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input name="email" type="email" class="form-control" placeholder="Enter Email" />
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-lock"></i></span>
                            <input name="password" type="password" class="form-control" placeholder="Enter Password" />
                        </div>
                    </div>

                    <!-- Password Confirmation -->
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-lock"></i></span>
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" />
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="mb-3">
                        <label class="form-label">Select Role</label>
                        <select class="form-select" name="role_id">
                            <option selected disabled>Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ app()->getLocale() == 'ar' ? $role->role_ar : $role->role_en }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label class="form-label">Select Status</label>
                        <select class="form-select" name="status">
                            <option selected disabled>Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
