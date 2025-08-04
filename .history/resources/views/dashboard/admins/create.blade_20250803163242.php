@extends('layouts.dashboard.master')


@section('title', 'Create Admin')

@section('content')
   <div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Admin</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.admins.store') }}" method="POST">
                    @csrf

                    {{-- Full Name --}}
                    <div class="mb-3">
                        <label class="form-label" for="admin-name">Full Name</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                            <input name="name" type="text" class="form-control" id="admin-name"
                                placeholder="Enter Full Name" />
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label" for="admin-email">Email</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input name="email" type="email" id="admin-email" class="form-control"
                                placeholder="Enter Email" />
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label class="form-label" for="admin-password">Password</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-lock"></i></span>
                            <input name="password" type="password" id="admin-password" class="form-control"
                                placeholder="Enter Password" />
                        </div>
                    </div>

                    {{-- Password Confirmation --}}
                    <div class="mb-3">
                        <label class="form-label" for="admin-password-confirmation">Confirm Password</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-lock"></i></span>
                            <input name="password_confirmation" type="password" id="admin-password-confirmation"
                                class="form-control" placeholder="Confirm Password" />
                        </div>
                    </div>

                    {{-- Role --}}
                    <div class="mb-3">
                        <label class="form-label" for="admin-role">Select Role</label>
                        <select class="form-control" name="role_id" id="admin-role">
                            <option selected disabled>Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ app()->getLocale() == 'ar' ? $role->role_ar : $role->role_en }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="mb-4">
                        <label class="form-label" for="admin-status">Select Status</label>
                        <select class="form-control" name="status" id="admin-status">
                            <option selected disabled>Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Create Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
