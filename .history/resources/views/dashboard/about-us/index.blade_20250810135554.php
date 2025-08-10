@extends('layouts.dashboard.master')

@section('title', 'About Us')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">About Us</h5>
        <a href="{{ route('about.edit') }}" class="btn btn-primary">
            {{ __('dashboard.edit') }} <i class="la la-edit"></i>
        </a>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label>{{ __('dashboard.desc_ar') }}</label>
            <div class="border p-3">
                {!! $aboutUs->desc_ar !!}
            </div>
        </div>
        <div class="mb-3">
            <label>{{ __('dashboard.desc_en') }}</label>
            <div class="border p-3">
                {!! $aboutUs->desc_en !!}
            </div>
        </div>
    </div>
</div>
@endsection
