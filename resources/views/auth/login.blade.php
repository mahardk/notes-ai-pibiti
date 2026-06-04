@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-slate-100 dark:bg-slate-900 transition-colors duration-300">
    <div class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-2 dark:text-white">Smart Notes AI</h1>
        <p class="text-slate-500 dark:text-slate-400 mb-6 text-sm">Masuk untuk melanjutkan</p>

        @if(session('error'))
            <div class="bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-600 dark:text-red-400 px-4 py-3 rounded-lg mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium dark:text-slate-300">Username</label>
                <input type="text" name="username" value="{{ old('username') }}"
                    class="w-full border dark:border-slate-600 rounded-lg px-4 py-2 bg-white dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium dark:text-slate-300">Password</label>
                <input type="password" name="password"
                    class="w-full border dark:border-slate-600 rounded-lg px-4 py-2 bg-white dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <x-button class="w-full justify-center">Login</x-button>
        </form>
    </div>
</div>
@endsection