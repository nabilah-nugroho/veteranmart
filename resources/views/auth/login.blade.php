@extends('layouts.app', ['title' => 'Masuk · VeteranMart'])

@section('content')
<main class="flex min-h-screen items-center justify-center px-6 py-12">
    <div class="w-full max-w-md">
        <div class="mb-8 text-center">
            <div class="mx-auto mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-400 text-2xl font-black text-slate-950">V</div>
            <p class="mb-2 text-sm font-semibold uppercase tracking-[0.25em] text-amber-400">VeteranMart</p>
            <h1 class="text-3xl font-bold tracking-tight">Selamat datang kembali</h1>
            <p class="mt-3 text-slate-400">Masuk untuk mulai bertransaksi di lingkungan UPNVJ.</p>
        </div>

        <div class="rounded-3xl border border-slate-800 bg-slate-900 p-8 shadow-2xl shadow-black/20">
            <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-200">Email mahasiswa</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="nama@upnvj.ac.id" class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-slate-100 outline-none transition placeholder:text-slate-600 focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                    @error('email')<p class="mt-2 text-sm text-rose-400">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-slate-200">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password" placeholder="Masukkan password" class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-slate-100 outline-none transition placeholder:text-slate-600 focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                    @error('password')<p class="mt-2 text-sm text-rose-400">{{ $message }}</p>@enderror
                </div>
                <label class="flex items-center gap-2 text-sm text-slate-400">
                    <input type="checkbox" name="remember" class="rounded border-slate-700 bg-slate-950 text-amber-400 focus:ring-amber-400"> Ingat saya
                </label>
                <button type="submit" class="w-full rounded-xl bg-amber-400 px-4 py-3 font-bold text-slate-950 transition hover:bg-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:ring-offset-2 focus:ring-offset-slate-900">Masuk ke VeteranMart</button>
            </form>
            <div class="mt-6 rounded-xl border border-amber-400/20 bg-amber-400/5 p-4 text-sm text-slate-300">
                <p class="font-semibold text-amber-300">Akun dummy untuk demo</p>
                <p class="mt-2 font-medium text-slate-200">Mahasiswa</p>
                <p>mahasiswa@upnvj.ac.id</p>
                <p>Password: <span class="font-mono">password</span></p>
                <p class="mt-2 font-medium text-slate-200">Admin</p>
                <p>admin@upnvj.ac.id</p>
                <p>Password: <span class="font-mono">password</span></p>
            </div>
        </div>
        <p class="mt-6 text-center text-xs text-slate-500">Khusus mahasiswa dengan email @upnvj.ac.id</p>
    </div>
</main>
@endsection
