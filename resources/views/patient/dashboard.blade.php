@extends('layouts.app')

@section('title', 'Patient Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">لوحة التحكم - المريض</h1>
    <div class="grid md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="text-3xl mb-2">📅</div>
            <h3 class="text-lg font-semibold">المواعيد القادمة</h3>
            <p class="text-3xl font-bold text-teal-600">0</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="text-3xl mb-2">📋</div>
            <h3 class="text-lg font-semibold">السجلات الطبية</h3>
            <p class="text-3xl font-bold text-teal-600">0</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="text-3xl mb-2">⭐</div>
            <h3 class="text-lg font-semibold">تقييماتي</h3>
            <p class="text-3xl font-bold text-teal-600">0</p>
        </div>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-xl font-semibold mb-4">مواعيدي القادمة</h2>
        <p class="text-gray-500">لا توجد مواعيد حالياً. ابحث عن طبيب واحجز موعدك الآن!</p>
        <a href="/" class="inline-block mt-4 bg-teal-600 text-white px-6 py-2 rounded-lg hover:bg-teal-700">البحث عن أطباء</a>
    </div>
</div>
@endsection
