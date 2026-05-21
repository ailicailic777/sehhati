@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">إنشاء حساب جديد</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">الاسم الكامل</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500 @error('name') border-red-500 @enderror">
                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500 @error('email') border-red-500 @enderror">
                @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">رقم الهاتف</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">كلمة المرور</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500 @error('password') border-red-500 @enderror">
                @error('password')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
            </div>
            <button type="submit" class="w-full bg-teal-600 text-white py-2 rounded-lg hover:bg-teal-700">تسجيل</button>
        </form>
        <p class="text-center mt-4 text-gray-600">لديك حساب بالفعل؟ <a href="{{ route('login') }}" class="text-teal-600">دخول</a></p>
    </div>
</div>
@endsection
