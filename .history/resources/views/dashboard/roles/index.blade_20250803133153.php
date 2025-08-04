@extends('layouts.dashboard.master')
{{-- @include('dashboard.layouts.header') --}}

@section('content')
    <div class="content_wrapper with-sidenav">
        <div class="">
            <div class="row mb-5">
                <div class="col-12 col-xl-12">
                    <div style="background-color: transparent !important" class="card">
                        <div class="add d-flex justify-content-end p-2">
                            {{-- @can('roles-create') --}}
                            {{-- @can('roles-create') --}}
                                <a href="{{ route('dashboard.roles.create') }}" class="btn btn-primary">
                                    <i class="fas fa-add"></i> {{ __('dashboard.add_role') }}
                                </a>
                           {{-- "" @endcan --}}
                            {{-- @endcan --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive text-center">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('#') }}</th>
                                            <th>{{ __('dashboard.role_name') }}</th>
                                            <th>{{ __('dashboard.permissions') }}</th>
                                            <th>{{ __('dashboard.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($roles as $role)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ app()->getLocale() == 'ar' ? $role->role_ar : $role->role_en }}</td>
                                                <td>
                                                    @foreach ($role->permissions as $perm)
                                                        {{ $perm }},
                                                    @endforeach
                                                </td>
                                                {{-- <td>{{ count($role->users) }}</td> --}}
                                                <td class="text-center align-middle">
                                                    <div class="d-inline-flex gap-2">

                                                        <a href="{{ route('dashboard.roles.edit', $role->id) }}"
                                                            class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-edit me-1"></i> {{ __('dashboard.edit') }}
                                                        </a>

                                                        
                                                        <form id="delete-form-{{ $role->id }}"
                                                            action="{{ route('dashboard.roles.destroy', $role->id) }}"
                                                            method="post"
                                                            onsubmit="return confirm('{{ __('dashboard.are_you_sure') }}')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                                <i class="fas fa-trash me-1"></i>
                                                                {{ __('dashboard.delete') }}
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>








                                            </tr>
                                            {{-- delete form  --}}
                                            {{-- <form id="delete-form-{{ $role->id }}"
                                                action="{{ route('dashboard.roles.destroy', $role->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form> --}}
                                        @empty
                                            <tr>
                                                <td colspan="5">{{ __('No data available!') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $roles->links() }}
                                {{-- <div style="padding:5px;direction: ltr;">
                                {!! $roles->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

{{-- 
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.delete-country-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let id = this.getAttribute('data-id');
                    console.log("Trying to delete role with ID:", id); // Debug

                    Swal.fire({
                        title: '{{ __('هل انت متأكد') }}',
                        text: "{{ __('هل تريد مسح هذا') }}",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#DC143C',
                        cancelButtonColor: '#696969',
                        cancelButtonText: "{{ __('Cancel') }}",
                        confirmButtonText: '{{ __('نعم!') }}'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let form = document.createElement('form');
                            form.action = '{{ url('/admin/roles') }}/' + id;
                            form.method = 'POST';
                            form.style.display = 'none';

                            let csrfInput = document.createElement('input');
                            csrfInput.type = 'hidden';
                            csrfInput.name = '_token';
                            csrfInput.value = '{{ csrf_token() }}';

                            let methodInput = document.createElement('input');
                            methodInput.type = 'hidden';
                            methodInput.name = '_method';
                            methodInput.value = 'DELETE';

                            form.appendChild(csrfInput);
                            form.appendChild(methodInput);
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush --}}
