@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">تسجيل الدخول</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500 @error('email') border-red-500 @enderror">
                @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">كلمة المرور</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
            </div>
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="ml-2">
                <label for="remember">تذكرني</label>
            </div>
            <button type="submit" class="w-full bg-teal-600 text-white py-2 rounded-lg hover:bg-teal-700">دخول</button>
        </form>
        <p class="text-center mt-4 text-gray-600">ليس لديك حساب؟ <a href="{{ route('register') }}" class="text-teal-600">سجل الآن</a></p>
    </div>
</div>
@endsection
