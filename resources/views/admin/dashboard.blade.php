@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">لوحة التحكم - المشرف</h1>
    <div class="grid md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="text-3xl mb-2">👥</div>
            <h3 class="text-lg font-semibold">المستخدمين</h3>
            <p class="text-3xl font-bold text-teal-600">{{ $stats->users_count ?? '0' }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="text-3xl mb-2">👨‍⚕️</div>
            <h3 class="text-lg font-semibold">الأطباء</h3>
            <p class="text-3xl font-bold text-teal-600">{{ $stats->doctors_count ?? '0' }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="text-3xl mb-2">📅</div>
            <h3 class="text-lg font-semibold">المواعيد</h3>
            <p class="text-3xl font-bold text-teal-600">{{ $stats->pending_appointments ?? '0' }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="text-3xl mb-2">✅</div>
            <h3 class="text-lg font-semibold">أطباء موثقين</h3>
            <p class="text-3xl font-bold text-teal-600">{{ $stats->verified_doctors ?? '0' }}</p>
        </div>
    </div>
</div>
@endsection
