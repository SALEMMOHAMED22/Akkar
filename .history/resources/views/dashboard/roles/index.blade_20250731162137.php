<div class="content_wrapper with-sidenav">
    <div class="">
        <div class="row mb-5">
            <div class="col-12 col-xl-12">
                <div style="background-color: transparent !important" class="card">
                    <div class="add d-flex justify-content-end p-2">
                        {{-- @can('roles-create') --}}
                        @can('roles-create')
                            <a href="{{ route('roles.create') }}" class="btn btn-primary">
                                <i class="fas fa-add"></i> {{ __('إضافه') }}
                            </a>
                        @endcan
                        {{-- @endcan --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('الاسم') }}</th>
                                        <th>{{ __('عدد الصلاحيات') }}</th>
                                        <th>{{ __('عدد المستخدمين') }}</th>
                                        <th>{{ __('العمليات') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ count($role->permissions) }}</td>
                                            <td>{{ count($role->users) }}</td>
                                            <td>
                                                {{-- @can('roles-delete') --}}
                                                @can('roles-delete')
                                                    <button type="button" class="btn btn-danger w-25 delete-country-btn"
                                                        data-id="{{ $role->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                @endcan
                                                {{-- @endcan --}}
                                                {{-- @can('roles-update') --}}
                                                <a href="{{ route('roles.edit', $role) }}" class="btn btn-info w-25">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @can(abilities: 'roles-update')
                                                @endcan
                                                {{-- @endcan --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">{{ __('No data available!') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div style="padding:5px;direction: ltr;">
                                {!! $roles->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content_wrapper with-sidenav">
    <div class="">
        <div class="row mb-5">
            <div class="col-12 col-xl-12">
                <div style="background-color: transparent !important" class="card">
                    <div class="add d-flex justify-content-end p-2">
                        {{-- @can('roles-create') --}}
                        @can('roles-create')
                            <a href="{{ route('roles.create') }}" class="btn btn-primary">
                                <i class="fas fa-add"></i> {{ __('إضافه') }}
                            </a>
                        @endcan
                        {{-- @endcan --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('الاسم') }}</th>
                                        <th>{{ __('عدد الصلاحيات') }}</th>
                                        <th>{{ __('عدد المستخدمين') }}</th>
                                        <th>{{ __('العمليات') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ count($role->permissions) }}</td>
                                            <td>{{ count($role->users) }}</td>
                                            <td>
                                                {{-- @can('roles-delete') --}}
                                                @can('roles-delete')
                                                    <button type="button" class="btn btn-danger w-25 delete-country-btn"
                                                        data-id="{{ $role->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                @endcan
                                                {{-- @endcan --}}
                                                {{-- @can('roles-update') --}}
                                                <a href="{{ route('roles.edit', $role) }}" class="btn btn-info w-25">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @can(abilities: 'roles-update')
                                                @endcan
                                                {{-- @endcan --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">{{ __('No data available!') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div style="padding:5px;direction: ltr;">
                                {!! $roles->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
