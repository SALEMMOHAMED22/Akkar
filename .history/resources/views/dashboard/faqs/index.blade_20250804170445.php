@extends('layouts.dashboard.master')

@section('title', 'Faqs')

@section('content')
    <div class="card-content">
    <div class="card-body">

        {{-- create coupon modal --}}
        <button type="button" class="btn btn-outline-success mb-1 me-1" data-bs-toggle="modal"
            data-bs-target="#faqCreateModal">
            {{ __('dashboard.create_faq') }}
        </button>

        {{-- modal --}}
        @include('dashboard.faqs._create')
        {{-- end create&edit coupon modal --}}

        <div class="col-xl-12 col-lg-12">
            <div class="mb-1">
                <h5 class="mb-0">Collapsible with Border Color</h5>
            </div>

            <div class="accordion" id="faqAccordion">

                @forelse ($faqs as $item)
                    <div class="accordion-item border border-success mb-2" id="faq_div_{{ $item->id }}">
                        <h2 class="accordion-header" id="heading_{{ $item->id }}">
                            <button class="accordion-button @if (!$loop->first) collapsed @endif text-success" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse_{{ $item->id }}"
                                aria-expanded="@if ($loop->first) true @else false @endif"
                                aria-controls="collapse_{{ $item->id }}">
                                {{ app()->getLocale() == 'ar' ? $item->question_ar : $item->question_en }}
                            </button>
                        </h2>

                        <div id="collapse_{{ $item->id }}" class="accordion-collapse collapse @if ($loop->first) show @endif"
                            aria-labelledby="heading_{{ $item->id }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $item->answer }}

                                <div class="float-end">
                                    <a faq-id="{{ $item->id }}" class="delete_confirm_btn me-2" href="#">
                                        <i class="la la-trash text-danger"></i>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#faqEditModal_{{ $item->id }}" href="#">

@endsection