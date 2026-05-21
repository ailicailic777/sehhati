@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="bg-gradient-to-br from-teal-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 py-20">
        <div class="text-center">
            <h1 class="text-5xl font-bold text-gray-900 mb-6">منصة صحتي للصحة الرقمية</h1>
            <p class="text-xl text-gray-600 mb-8">أول منصة جزائرية لحجز المواعيد الطبية أونلاين والتواصل مع الأطباء</p>
            <div class="flex justify-center space-x-4 space-x-reverse">
                <a href="{{ route('register') }}" class="bg-teal-600 text-white px-8 py-3 rounded-lg text-lg hover:bg-teal-700">ابدأ الآن</a>
                <a href="#features" class="bg-white text-teal-600 px-8 py-3 rounded-lg text-lg border-2 border-teal-600 hover:bg-teal-50">تعرف أكثر</a>
            </div>
        </div>
    </div>
</div>

<div id="features" class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-center mb-12">مميزات المنصة</h2>
    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-xl shadow-md text-center">
            <div class="text-4xl mb-4">📅</div>
            <h3 class="text-xl font-semibold mb-2">حجز المواعيد</h3>
            <p class="text-gray-600">احجز موعدك مع أفضل الأطباء في الجزائر بكل سهولة</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md text-center">
            <div class="text-4xl mb-4">💬</div>
            <h3 class="text-xl font-semibold mb-2">استشارة مباشرة</h3>
            <p class="text-gray-600">تواصل مع طبيبك عبر المحادثة النصية المباشرة</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md text-center">
            <div class="text-4xl mb-4">📋</div>
            <h3 class="text-xl font-semibold mb-2">ملف طبي رقمي</h3>
            <p class="text-gray-600">جميع سجلاتك الطبية في مكان واحد وآمن</p>
        </div>
    </div>
</div>

<div class="bg-teal-600 py-16">
    <div class="max-w-7xl mx-auto px-4 text-center text-white">
        <h2 class="text-3xl font-bold mb-4">انضم إلى آلاف المستخدمين</h2>
        <p class="text-xl mb-8">سجل الآن واستفيد من خدمات صحتي المجانية</p>
        <a href="{{ route('register') }}" class="bg-white text-teal-600 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-teal-50">إنشاء حساب مجاني</a>
    </div>
</div>

<footer class="bg-gray-900 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p>© 2024 صحتي - منصة الصحة الرقمية الجزائرية</p>
    </div>
</footer>
@endsection
