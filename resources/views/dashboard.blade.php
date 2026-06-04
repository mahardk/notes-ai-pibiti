@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-3xl font-bold dark:text-white">Welcome Back</h2>
        <p class="text-slate-500 dark:text-slate-400 mt-1">Ready to learning today?</p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        <x-card>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Total Catatan</p>
            <h3 class="text-3xl font-bold mt-2 dark:text-white">12</h3>
        </x-card>
        <x-card>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Total Quiz</p>
            <h3 class="text-3xl font-bold mt-2 dark:text-white">13</h3>
        </x-card>
        <x-card>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Total Keseluruhan</p>
            <h3 class="text-3xl font-bold mt-2 dark:text-white">14</h3>
        </x-card>
    </div>

    <x-card>
        <h3 class="font-bold mb-4 dark:text-white">Aktivitas Terbaru</h3>
        <ul class="space-y-3 text-slate-600 dark:text-slate-300">
            <li class="flex items-center gap-2">
                Membuat Quiz
            </li>
            <li class="flex items-center gap-2">
                Mengupload Image
            </li>
        </ul>
    </x-card>
</div>
@endsection