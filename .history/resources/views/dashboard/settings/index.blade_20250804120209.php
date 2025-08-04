@extends('layouts.dashboard.master')

@section('title', 'Settings')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('dashboard.settings') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data"
                class="row g-3" id="settingForm">
                @csrf
                @method('PUT')

               <div class="row">

               </div>

                {{-- مثال لواحد تاني --}}
                <div class="col-md-6">
                    <label class="form-label">{{ __('dashboard.site_email') }}</label>
                    <input readonly type="email" class="form-control" name="site_email"
                        value="{{ $setting->site_email }}">
                    @error('site_email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- ... باقي العناصر بنفس النمط أعلاه ... --}}

                <div class="d-flex justify-content-end mt-4">
                    <button hidden type="button" id="cancel_btn" class="btn btn-secondary me-2">
                        {{ __('dashboard.cancel') }}
                    </button>
                    <button hidden type="submit" id="submit_btn" class="btn btn-success">
                        {{ __('dashboard.save') }}
                    </button>
                    <button type="button" id="edit_btn" class="btn btn-info">
                        {{ __('dashboard.edit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
