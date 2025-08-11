@extends('layouts.dashboard.master')
@section('title', 'إضافة إعلان')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="mb-4">انشر إعلانك</h4>

            <form action="{{ route('dashboard.ads.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- النوع --}}
                {{-- <div class="mb-3">
                    <label class="form-label">النوع</label>
                    <select name="type" class="form-select" required>
                        <option value="">اختر النوع</option>
                        <option value="company">شركة</option>
                        <option value="individual">فرد</option>
                    </select>
                </div> --}}

                {{-- القسم --}}
                @livewire('category-drop-down-dependent')

                {{-- اسم الإعلان --}}
                <div class="mb-3">
                    <label class="form-label">اسم الإعلان</label>
                    <input type="text" name="ad_name_ar" class="form-control" required>
                </div>

                {{-- وصف قصير --}}
                <div class="mb-3">
                    <label class="form-label">وصف قصير</label>
                    <input type="text" name="short_desc" class="form-control">
                </div>

                {{-- صور الإعلان --}}
                <div class="mb-3">
                    <label class="form-label">صور الإعلان</label>
                    <div class="row g-3">
                        @for($i = 0; $i < 9; $i++)
                        <div class="col-4">
                            <label class="upload-box">
                                <input type="file" name="images[]" accept="image/*">
                                <div class="upload-content">
                                    <i class="bi bi-camera"></i>
                                    <span>رفع صورة</span>
                                </div>
                            </label>
                        </div>
                        @endfor
                    </div>
                </div>

                {{-- الموقع --}}
                <div class="mb-3">
                    <label class="form-label">الموقع</label>
                    <input type="text" name="location" class="form-control">
                </div>

                {{-- السعر --}}
                <div class="mb-3">
                    <label class="form-label">السعر</label>
                    <input type="number" name="price" class="form-control">
                </div>

                {{-- رابط --}}
                <div class="mb-3">
                    <label class="form-label">الرابط</label>
                    <input type="url" name="link" class="form-control">
                </div>

                {{-- تفاصيل إضافية --}}
                <div class="mb-3">
                    <label class="form-label">تفاصيل إضافية</label>
                    <textarea name="details" rows="4" class="form-control"></textarea>
                </div>

                {{-- زر الإرسال --}}
                <button type="submit" class="btn btn-dark px-5">انشر الآن</button>
            </form>
        </div>
    </div>
</div>

{{-- CSS --}}
<style>
.upload-box {
    display: block;
    border: 2px dashed #ccc;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: border-color 0.3s ease;
    height: 120px;
    background-color: #f9f9f9;
}
.upload-box:hover {
    border-color: #999;
}
.upload-box input {
    display: none;
}
.upload-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
}
.upload-content i {
    font-size: 24px;
    color: #888;
    margin-bottom: 5px;
}
.upload-content span {
    font-size: 14px;
    color: #666;
}
</style>
@endsection
