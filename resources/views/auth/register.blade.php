<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-slate-950 px-6 py-10 relative overflow-hidden">

        <!-- BACKGROUND -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-72 h-[260px] sm:h-[320px] md:h-[380px] lg:h-[420px] xl:h-[500px] bg-indigo-500/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-72 h-[260px] sm:h-[320px] md:h-[380px] lg:h-[420px] xl:h-[500px] bg-purple-500/20 rounded-full blur-3xl"></div>
        </div>

        <!-- CARD -->
        <div class="relative z-10 w-full max-w-xl bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-3xl shadow-2xl p-4 md:p-6 xl:p-8">

            <!-- HEADER -->
            <div class="text-center mb-10">

                <!-- LOGO -->
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 rounded-3xl bg-gradient-to-r from-indigo-600 to-purple-600 flex items-center justify-center shadow-2xl hover:scale-110 transition duration-300">
                        <x-application-logo class="w-12 h-12 text-white fill-current" />
                    </div>
                </div>

                <h2 class="text-4xl font-black text-white mb-2">
                    DAFTAR AKUN
                </h2>

                <p class="text-slate-400">
                    Daftar akun mahasiswa untuk mulai voting
                </p>

            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- NAME -->
                <div>
                    <label class="text-slate-300 font-semibold text-sm">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full mt-2 bg-slate-800 border border-slate-700 rounded-2xl px-5 py-3 text-white focus:border-indigo-500 outline-none">
                    @error('name')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIM -->
                <div>
                    <label class="text-slate-300 font-semibold text-sm">NIM</label>
                    <input type="text" name="nim" value="{{ old('nim') }}" required
                        class="w-full mt-2 bg-slate-800 border border-slate-700 rounded-2xl px-5 py-3 text-white focus:border-indigo-500 outline-none">
                    @error('nim')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- EMAIL -->
                <div>
                    <label class="text-slate-300 font-semibold text-sm">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full mt-2 bg-slate-800 border border-slate-700 rounded-2xl px-5 py-3 text-white focus:border-indigo-500 outline-none">
                    @error('email')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="text-slate-300 font-semibold text-sm">Password</label>
                    <input type="password" name="password" required
                        class="w-full mt-2 bg-slate-800 border border-slate-700 rounded-2xl px-5 py-3 text-white focus:border-indigo-500 outline-none">
                    @error('password')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CONFIRM PASSWORD -->
                <div>
                    <label class="text-slate-300 font-semibold text-sm">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full mt-2 bg-slate-800 border border-slate-700 rounded-2xl px-5 py-3 text-white focus:border-indigo-500 outline-none">
                    @error('password_confirmation')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ACTION -->
                <div class="flex items-center justify-between pt-4">

                    <a href="{{ route('login') }}"
                        class="text-sm text-indigo-400 hover:text-indigo-300">
                        Sudah punya akun?
                    </a>

                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-500 px-6 py-3 rounded-2xl font-bold transition duration-300 hover:scale-105 shadow-xl">
                        🚀 Daftar
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-guest-layout>