<!-- Modal -->
<div class="modal fade" id="faqCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard.create_faq') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                {{-- validations error --}}
                <div class="alert alert-danger" id="error_div" style="display: none;">
                    <ul id="error_list"></ul>
                </div>

                <form action="" id="createFaq" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label>{{ __('dashboard.question_ar') }}</label>
                        <input type="text" name="question_ar" class="form-control" placeholder="{{ __('dashboard.question_ar') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>{{ __('dashboard.question_en') }}</label>
                        <input type="text" name="question_en" class="form-control" placeholder="{{ __('dashboard.question_en') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>{{ __('dashboard.answer_ar') }}</label>
                        <textarea class="form-control" name="answer_ar"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label>{{ __('dashboard.answer_en') }}</label>
                        <textarea class="form-control" name="answer[en]"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="ft-x"></i> {{ __('dashboard.close') }}
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> {{ __('dashboard.save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
