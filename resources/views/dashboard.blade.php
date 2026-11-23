<<<<<<< HEAD
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
=======
@extends('layouts.app', ['title' => 'Dashboard · VeteranMart'])

@section('content')
<main class="mx-auto max-w-5xl px-6 py-10">
    <header class="flex items-center justify-between border-b border-slate-800 pb-6">
        <div><p class="text-sm font-semibold uppercase tracking-[0.2em] text-amber-400">VeteranMart</p><h1 class="mt-2 text-3xl font-bold">Halo, {{ Auth::user()->name }} 👋</h1></div>
        <form method="POST" action="{{ route('logout') }}">@csrf<button class="rounded-xl border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:border-amber-400 hover:text-amber-300">Keluar</button></form>
    </header>
    <section class="mt-8 rounded-3xl border border-slate-800 bg-slate-900 p-8"><p class="text-slate-400">Login berhasil sebagai</p><p class="mt-2 text-xl font-semibold">{{ Auth::user()->email }}</p><p class="mt-4 text-slate-400">Dashboard ini siap dikembangkan untuk fitur marketplace mahasiswa UPNVJ.</p></section>
</main>
@endsection
>>>>>>> b4f0ca7d999cb51d820686d29cf0e8a951f145ac
