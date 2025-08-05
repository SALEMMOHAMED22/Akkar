@extends('layouts.dashboard.master')

@section('title', 'Faqs')

@section('content')


    <div class="card-content">
        <div class="card-body">

            {{-- create coupon modal --}}
            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#faqCreateModal">
                <i class="la la-plus"></i> {{ __('dashboard.create_faq') }}
            </button>


            {{-- modal --}}
            @include('dashboard.faqs._create')
            {{-- end create&edit coupon modal --}}

            <div class="col-xl-12 col-lg-12 text-center">
                <h4 class="fw-bold mb-3 text-primary">
                    <i class="la la-question-circle"></i> {{ __('dashboard.Faqs') }}
                </h4>
                <br>
                <div class="accordion faq_row" id="faqAccordion">
                    @forelse ($faqs as $item)
                        <div class="accordion-item border rounded shadow-sm mb-3" id="faq_div_{{ $item->id }}">
                            <h2 class="accordion-header" id="heading_{{ $item->id }}">
                                <button
                                    class="accordion-button @if (!$loop->first) collapsed @endif bg-light fw-semibold"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $item->id }}"
                                    aria-expanded="@if ($loop->first) true @else false @endif"
                                    aria-controls="collapse_{{ $item->id }}">
                                    <i class="la la-question-circle me-2 text-success"></i>
                                    {{ app()->getLocale() == 'ar' ? $item->question_ar : $item->question_en }}
                                </button>
                            </h2>
                            <div id="collapse_{{ $item->id }}"
                                class="accordion-collapse collapse @if ($loop->first) show @endif"
                                aria-labelledby="heading_{{ $item->id }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body position-relative">
                                    <p class="mb-2">{{ app()->getLocale() == 'ar' ? $item->answer_ar : $item->answer_en }}
                                    </p>
                                    <div class="position-absolute end-0 bottom-0 m-2">
                                        <a faq-id="{{ $item->id }}"
                                            class="btn btn-sm btn-outline-danger me-2 delete_confirm_btn">
                                            <i class="la la-trash"></i> Delete
                                        </a>
                                        <a class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#faqEditModal_{{ $item->id }}">
                                            <i class="la la-edit"></i> Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @include('dashboard.faqs._edit')
                    @empty
                        <div class="alert alert-warning text-center">
                            <i class="la la-info-circle me-2"></i> {{ __('dashboard.no_data') }}
                        </div>
                    @endforelse

                </div>
            </div>

        </div>
    </div>



@endsection
@push('css')
    <style>
        .accordion-button {
            transition: all 0.3s ease-in-out;
        }

        .accordion-button:not(.collapsed) {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .accordion-body {
            padding-bottom: 3rem;
        }
    </style>
@endpush

@push('js')
    <script>
        // create Faq Using Ajax
        $(document).on('submit', '#createFaq', function(e) {
            e.preventDefault();
            var data = new FormData($(this)[0]);
            var local = "{{ app()->getLocale() }}"; // ar , en

            $.ajax({
                url: "{{ route('dashboard.faqs.store') }}",
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 'error') {
                        Swal.fire({
                            position: "top-center",
                            icon: "error",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        var faqId = data.faq.id;
                        var question = local == 'ar' ? data.faq.question_ar : data.faq.question_en;
                        var answer = local == 'ar' ? data.faq.answer_ar : data.faq.answer_en;
                        $('#createFaq')[0].reset();
                        $('#faqModal').modal('hide');
                        $('.faq_row').prepend(` <div class="accordion-item border border-success mb-2" id="faq_div_${faqId}">
                <h2 class="accordion-header" id="heading_${faqId}">
                    <button class="accordion-button text-success collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse_${faqId}"
                        aria-expanded="false" aria-controls="collapse_${faqId}">
                        ${question}
                    </button>
                </h2>
                <div id="collapse_${faqId}" class="accordion-collapse collapse"
                    aria-labelledby="heading_${faqId}" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        ${answer}
                        <div class="float-end">
                            <a faq-id="${faqId}" class="delete_confirm_btn me-2" href="#">
                                <i class="la la-trash text-danger">Delete</i>
                            </a>
                            <a data-bs-toggle="modal" data-bs-target="#faqEditModal_${faqId}" href="#">
                                <i class="la la-edit text-primary">Edit</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>`);
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        // close modal
                        $('#faqCreateModal').modal('hide');
                    }
                },
                error: function(data) {
                    if (data.responseJSON.errors) {
                        $('#error_list').empty();
                        $('#error_div').show();
                        $.each(data.responseJSON.errors, function(key, value) {
                            $('#error_list').append('<li>' + value[0] + '</li>');
                            // $('#error_div').show();
                        });
                    }
                }

            })
        });

        // update faq using ajax
        $(document).on('submit', '.update_faq_form', function(e) {
            e.preventDefault();
            var local = "{{ app()->getLocale() }}"; // ar , en

            var faq_id = $(this).attr('faq-id');
            var data = new FormData($(this)[0]);
            data.append('_method', 'PUT');
            // var url = "{{ route('dashboard.faqs.update', ':id') }}".replace('id', faq_id),
            $.ajax({
                url: "{{ route('dashboard.faqs.update', 'id') }}".replace('id', faq_id),
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.success == 'error') {
                        Swal.fire({
                            position: "top-center",
                            icon: "error",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        var question = local == 'ar' ? data.faq.question_ar : data.faq.question_en;
                        var answer = local == 'ar' ? data.faq.answer_ar : data.faq.answer_en;

                        $('#faqEditModal_' + faq_id).modal('hide');
                        $('#question_' + faq_id).empty().text(question);
                        $('#answer_' + faq_id).empty().text(answer);

                        // delete success class and add danger class

                        $('#question_' + faq_id).removeClass('success').addClass('danger');

                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }

                },
                error: function(data) {
                    if (data.responseJSON.errors) {
                        $('#error_list_' + faq_id).empty();
                        $.each(data.responseJSON.errors, function(key, value) {
                            $('#error_list_' + faq_id).append('<li>' + value[0] + '</li>');
                            $('#error_div_' + faq_id).show();
                        });
                    }
                }

            })

        });

        // delete faq using ajax
        $(document).on('click', '.delete_confirm_btn', function(e) {
            e.preventDefault();
            var faq_id = $(this).attr('faq-id');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('dashboard.faqs.destroy', 'id') }}".replace('id', faq_id),
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                $('#faq_div_' + faq_id).remove();
                                Swal.fire({
                                    title: response.status,
                                    text: response.message,
                                    icon: "success"
                                });
                            } else {
                                Swal.fire({
                                    title: response.status,
                                    text: response.message,
                                    icon: "error"
                                });
                            }
                        }
                    });

                }
            });

        });
    </script>
@endpush
