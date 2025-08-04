@extends('layouts.dashboard.master')

@section('title', 'Settings')

@section('content')

    <div class="card shadow" style="max-width:90%;">
        <div class="card-header border-0">
            <h4 class="card-title text-center">{{ __('dashboard.settings') }}</h4>
        </div>
        <div class="card-body p-4 pt-5 ">
            <form action="{{ route('dashboard.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data"
                class="row g-3 setting_form" id="settingForm">
                @csrf
                @method('PUT')
                {{-- Name Row --}}
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.site_name_ar') }}</label>
                        <input readonly type="text" class="form-control" name="site_name_ar"
                            value="{{ $setting->site_name_ar }}">
                        @error('site_name_ar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.site_name_en') }}</label>
                        <input readonly type="text" class="form-control" name="site_name_en"
                            value="{{ $setting->site_name_en }}">
                        @error('site_name_en')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                {{-- Email Row --}}
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.site_email') }}</label>
                        <input readonly type="email" class="form-control" name="site_email"
                            value="{{ $setting->site_email }}">
                        @error('site_email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.email_support') }}</label>
                        <input readonly type="email" class="form-control" name="email_support"
                            value="{{ $setting->email_support }}">
                        @error('email_support')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- Address Row --}}
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.site_address_ar') }}</label>
                        <input readonly type="address" class="form-control" name="site_address_ar"
                            value="{{ $setting->site_address_ar }}">
                        @error('site_address_ar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.site_address_en') }}</label>
                        <input readonly type="address" class="form-control" name="site_address_en"
                            value="{{ $setting->site_address_en }}">
                        @error('site_address_en')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- Phone Row --}}
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.site_phone') }}</label>
                        <input readonly type="phone" class="form-control" name="site_phone"
                            value="{{ $setting->site_phone }}">
                        @error('site_phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.whatsapp') }}</label>
                        <input readonly type="phone" class="form-control" name="whatsapp_number"
                            value="{{ $setting->whatsapp_number }}">
                        @error('whatsapp_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                </div>

                {{-- meta description --}}
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.meta_description_ar') }}</label>
                        <textarea readonly class="form-control" name="meta_description_ar" rows="4">{{ $setting->meta_description_ar }}</textarea>
                        @error('meta_description_ar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.meta_description_en') }}</label>
                        <textarea readonly class="form-control" name="meta_description_en" rows="4">{{ $setting->meta_description_en }}</textarea>
                        @error('meta_description_en')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- Site Description --}}
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.site_desc_ar') }}</label>
                        <textarea readonly class="form-control" name="site_desc_ar" rows="5">{{ $setting->site_desc_ar }}</textarea>
                        @error('site_desc_ar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.site_desc_en') }}</label>
                        <textarea readonly class="form-control" name="site_desc_en" rows="5">{{ $setting->site_desc_en }}</textarea>
                        @error('site_desc_en')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- Works Hours --}}
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.working_hours_ar') }}</label>
                        <input readonly type="text" class="form-control" name="working_hours_ar"
                            value="{{ $setting->working_hours_ar }}">
                        @error('working_hours_ar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.working_hours_en') }}</label>
                        <input readonly type="text" class="form-control" name="working_hours_en"
                            value="{{ $setting->working_hours_en }}">
                        @error('working_hours_en')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                {{-- copyright --}}
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.site_copyright_ar') }}</label>
                        <input readonly type="text" class="form-control" name="site_copyright_ar"
                            value="{{ $setting->site_copyright_ar }}">
                        @error('site_copyright_ar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.site_copyright_en') }}</label>
                        <input readonly type="text" class="form-control" name="site_copyright_en"
                            value="{{ $setting->site_copyright_en }}">
                        @error('site_copyright_en')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                {{-- Social Media --}}

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.facebook') }}</label>
                        <input readonly type="text" class="form-control" name="facebook_url"
                            value="{{ $setting->facebook_url }}">
                        @error('facebook_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.twitter') }}</label>
                        <input readonly type="text" class="form-control" name="twitter_url"
                            value="{{ $setting->twitter_url }}">
                        @error('twitter_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.youtube') }}</label>
                        <input readonly type="text" class="form-control" name="youtube_url"
                            value="{{ $setting->youtube_url }}">
                        @error('youtube_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.linkedin') }}</label>
                        <input readonly type="text" class="form-control" name="linkedin_url"
                            value="{{ $setting->linkedin_url }}">
                        @error('linkedin_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.behance') }}</label>
                        <input readonly type="text" class="form-control" name="behance_url"
                            value="{{ $setting->behance_url }}">
                        @error('behance_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __('dashboard.promotion_video_url') }}</label>
                        <input readonly type="text" class="form-control" name="promotion_video_url"
                            value="{{ $setting->promotion_video_url }}">
                        @error('promotion_video_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label" >{{ __('dashboard.logo') }}</label>
                        <input type="file"  name="logo" id="logo-image" class="form-control">
                        @error('logo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >{{ __('dashboard.favicon') }}</label>
                        <input type="file" name="favicon" id="favicon-image" class="form-control" >
                        @error('favicon')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


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
@push('js')
    {{-- <script>
        var lang = "{{ app()->getLocale() }}";
        $(function() {
                    $('#logo-image').fileinput({
                        theme: 'fa5',
                        language: lang,
                        allowedFileTypes: ['image'],
                        maxFileCount: 1,
                        enableResumableUpload: false,
                        showUpload: false,
                        initialPreviewAsData: true,
                        initialPreview: [
                            "{{ asset($setting->logo) }}",
                        ],

                    });
                    $('#favicon-image').fileinput({
                        theme: 'fa5',
                        language: lang,
                        allowedFileTypes: ['image'],
                        maxFileCount: 1,
                        enableResumableUpload: false,
                        showUpload: false,
                        initialPreviewAsData: true,
                        initialPreview: [
                            "{{ asset($setting->favicon) }}",
                        ],

                    });
                });

    </script> --}}

    <script>
    var lang = "{{ app()->getLocale() }}";
    $(function () {
        $('#logo-image').fileinput({
            theme: 'fa5',
            language: lang,
            allowedFileTypes: ['image'],
            maxFileCount: 1,
            showUpload: false,
            showRemove: true,
            browseOnZoneClick: true,
            initialPreviewAsData: true,
            initialPreview: ["{{ asset($setting->logo) }}"]
        });

        $('#favicon-image').fileinput({
            theme: 'fa5',
            language: lang,
            allowedFileTypes: ['image'],
            maxFileCount: 1,
            showUpload: false,
            showRemove: true,
            browseOnZoneClick: true,
            initialPreviewAsData: true,
            initialPreview: ["{{ asset($setting->favicon) }}"]
        });
    });
</script>
     <script>
        $(document).on('click', '#edit_btn', function() {
            $('#edit_btn').attr('hidden', true);
            $('#submit_btn').removeAttr('hidden');
            $('#cancel_btn').removeAttr('hidden');
            $('.setting_form input').removeAttr('readonly');
            $('.setting_form textarea').removeAttr('readonly');
        });

        // when click on cancel button
        $(document).on('click', '#cancel_btn', function() {
            // remove additional text add to inputs and textarea
            // task

            $('#edit_btn').removeAttr('hidden');
            $('#submit_btn').attr('hidden', true);
            $('#cancel_btn').attr('hidden', true);
            $('.setting_form input').attr('readonly', true);
            $('.setting_form textarea').attr('readonly', true);
        });
    </script>
@endpush
