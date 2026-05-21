@extends('layouts.app')

@section('title', 'Doctor Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">لوحة التحكم - الطبيب</h1>
    <div class="grid md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="text-3xl mb-2">📅</div>
            <h3 class="text-lg font-semibold">المواعيد اليوم</h3>
            <p class="text-3xl font-bold text-teal-600">0</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="text-3xl mb-2">👥</div>
            <h3 class="text-lg font-semibold">إجمالي المرضى</h3>
            <p class="text-3xl font-bold text-teal-600">0</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="text-3xl mb-2">⭐</div>
            <h3 class="text-lg font-semibold">التقييم</h3>
            <p class="text-3xl font-bold text-teal-600">0.0</p>
        </div>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-xl font-semibold mb-4">مواعيد اليوم</h2>
        <p class="text-gray-500">لا توجد مواعيد اليوم.</p>
    </div>
</div>
@endsection
