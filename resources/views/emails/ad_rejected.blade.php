<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تم رفض إعلانك</title>
</head>
<body>
    <h2>مرحبا {{ $ad->user->name }}</h2>
    <p>نأسف لإبلاغك أن إعلانك بعنوان: <strong>{{ $ad->ad_name_ar }}</strong> قد تم رفضه.</p>
    <p><strong>سبب الرفض:</strong> {{ $reason }}</p>
    <p>إذا كان لديك أي استفسارات، لا تتردد في التواصل معنا.</p>
    <br>
    <p>فريق الدعم</p>
</body>
</html>
