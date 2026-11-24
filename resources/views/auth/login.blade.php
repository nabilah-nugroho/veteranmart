@extends('layouts.app', ['title' => 'Masuk · VeteranMart'])

@section('content')
<main class="flex min-h-screen items-center justify-center bg-gradient-to-b from-[#e1f3e8] to-[#f5faf6] px-6 py-12">
    <div class="w-full max-w-md">
        <div class="mb-8 text-center">
            <div class="mx-auto mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#08733f] text-2xl font-black text-white shadow-lg shadow-[#08733f]/20">V</div>
            <p class="mb-2 text-sm font-semibold uppercase tracking-[0.25em] text-[#08733f]">VeteranMart</p>
            <h1 class="text-3xl font-bold tracking-tight">Selamat datang kembali</h1>
            <p class="mt-3 text-[#527064]">Masuk untuk mulai bertransaksi di lingkungan UPNVJ.</p>
        </div>

        <div class="rounded-3xl border border-[#d4e8db] bg-white p-8 shadow-xl shadow-[#145c38]/10">
            <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-[#123d29]">Email mahasiswa</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="nama@upnvj.ac.id" class="w-full rounded-xl border border-[#cfe2d6] bg-[#f8fcf9] px-4 py-3 text-[#123d29] outline-none transition placeholder:text-[#8aa398] focus:border-[#08733f] focus:ring-2 focus:ring-[#08733f]/20">
                    @error('email')<p class="mt-2 text-sm text-rose-400">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-[#123d29]">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password" placeholder="Masukkan password" class="w-full rounded-xl border border-[#cfe2d6] bg-[#f8fcf9] px-4 py-3 text-[#123d29] outline-none transition placeholder:text-[#8aa398] focus:border-[#08733f] focus:ring-2 focus:ring-[#08733f]/20">
                    @error('password')<p class="mt-2 text-sm text-rose-400">{{ $message }}</p>@enderror
                </div>
                <label class="flex items-center gap-2 text-sm text-slate-400">
                    <input type="checkbox" name="remember" class="rounded border-[#cfe2d6] text-[#08733f] focus:ring-[#08733f]"> Ingat saya
                </label>
                <button type="submit" class="w-full rounded-xl bg-[#08733f] px-4 py-3 font-bold text-white transition hover:bg-[#075b32] focus:outline-none focus:ring-2 focus:ring-[#08733f] focus:ring-offset-2">Masuk ke VeteranMart</button>
            </form>
            <div class="mt-6 rounded-xl border border-[#bde3cc] bg-[#effaf3] p-4 text-sm text-[#527064]">
                <p class="font-semibold text-[#08733f]">Akun dummy untuk demo</p>
                <p class="mt-2 font-medium text-[#123d29]">Mahasiswa</p>
                <p>mahasiswa@upnvj.ac.id</p>
                <p>Password: <span class="font-mono">password</span></p>
                <p class="mt-2 font-medium text-[#123d29]">Admin</p>
                <p>admin@upnvj.ac.id</p>
                <p>Password: <span class="font-mono">password</span></p>
            </div>
        </div>
        <p class="mt-6 text-center text-xs text-[#6b8b7b]">Khusus mahasiswa dengan email @upnvj.ac.id</p>
    </div>
</main>
@endsection
