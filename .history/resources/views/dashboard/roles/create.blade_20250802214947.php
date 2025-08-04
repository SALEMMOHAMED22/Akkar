@extends('layouts.dashboard.master')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12 col-xl-10 mx-auto">
                    <form method="post" action="">
                        @csrf

                        <!-- Card for Role Name -->
                        <div class="card shadow-sm rounded-3 border-0">
                            <div class="card-body">
                                <h5 class="fw-bold text-primary mb-3">
                                    <i class="fas fa-user-tag me-2"></i> {{ __('dashboard.role_name') }}
                                </h5>
                                <input type="text" name="role" class="form-control rounded-pill shadow-sm"
                                    placeholder="{{ __('dashboard.Enter Role Name') }}">
                            </div>
                        </div>

                        <!-- Permissions Section -->
                        <div class="card shadow-sm rounded-3 border-0 mt-4">
                            <div class="card-body">
                                <h5 class="fw-bold text-primary mb-3">
                                    <i class="fas fa-shield-alt me-2"></i> {{ __('dashboard.Assign Permissions') }}
                                </h5>

                                <!-- Select All Checkbox -->
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <input type="checkbox" id="check" class="form-check-input"
                                        style="transform: scale(1.3); cursor: pointer;">
                                    <label for="check"
                                        class="form-check-label fw-bold text-danger">{{ __('Select All') }}</label>
                                </div>

                                <!-- Permissions Grid in Accordion -->
                                <div class="accordion" id="permissionsAccordion">
                                    <div class="accordion-item border-0 mb-2 shadow-sm">

                                        @foreach (config('permission') as $ )
                                            
                                        @endforeach


                                    </div>
                                </div>
                            </div>

                            <!-- Save Button -->
                            <button type="submit" class="btn btn-primary mt-4 w-100 shadow-sm rounded-pill">
                                <i class="fas fa-save me-2"></i> {{ __('Save') }}
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

{{-- @push('scripts')
<script>
document.getElementById('check').addEventListener('change', function() {
    document.querySelectorAll('.checkbox').forEach(checkbox => checkbox.checked = this.checked);
});

document.querySelectorAll('.checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        document.getElementById('check').checked = [...document.querySelectorAll('.checkbox')].every(cb => cb.checked);
    });
});
</script>
@endpush --}}
