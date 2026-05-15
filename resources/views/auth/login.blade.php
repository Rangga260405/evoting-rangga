<x-guest-layout>

    <div class="min-h-screen bg-slate-950 flex items-center justify-center px-6 py-10 relative overflow-hidden">

        <!-- BACKGROUND -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-indigo-600/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-32 -right-32 w-[500px] h-[500px] bg-purple-600/20 rounded-full blur-3xl animate-pulse"></div>
        </div>

        <!-- CARD -->
        <div class="relative z-10 w-full max-w-5xl bg-slate-900/80 backdrop-blur-2xl border border-slate-800 rounded-[40px] shadow-2xl grid md:grid-cols-2 overflow-hidden">

            <!-- LEFT -->
            <div class="hidden md:flex flex-col justify-center bg-gradient-to-br from-indigo-600 to-purple-700 p-12 text-white">

                <div class="w-20 h-20 bg-white/10 rounded-2xl flex items-center justify-center mb-8">
                    <x-application-logo class="w-12 h-12 fill-current text-white"/>
                </div>

                <h1 class="text-5xl font-black mb-4">EvoTingEasy</h1>
                <p class="text-indigo-100">Sistem E-Voting Mahasiswa Modern</p>

            </div>

            <!-- RIGHT -->
            <div class="p-4 md:p-6 xl:p-8">

                <h2 class="text-4xl font-black text-white mb-3">
                    Login
                </h2>

                <p class="text-slate-400 mb-8">
                    Masuk menggunakan NIM & password
                </p>

                <!-- 🔥 GLOBAL ERROR -->
                @if($errors->any())
                    <div class="mb-6 bg-red-500/10 border border-red-500/30 text-red-400 px-5 py-4 rounded-2xl">
                        <ul class="text-sm space-y-1">
                            @foreach($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- SUCCESS -->
                @if(session('status'))
                    <div class="mb-6 bg-green-500/10 border border-green-500/30 text-green-400 px-5 py-4 rounded-2xl">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- NIM -->
                    <div>
                        <label class="text-slate-300 text-sm font-bold mb-2 block">
                            NIM
                        </label>

                        <input type="text"
                            name="nim"
                            value="{{ old('nim') }}"
                            class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white focus:border-indigo-500 outline-none">

                        @error('nim')
                            <p class="text-red-400 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- PASSWORD -->
                    <div>
                        <label class="text-slate-300 text-sm font-bold mb-2 block">
                            Password
                        </label>

                        <input type="password"
                            name="password"
                            class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white focus:border-indigo-500 outline-none">
                    </div>

                    <!-- REMEMBER -->
                    <div class="flex justify-between items-center">

                        <label class="flex items-center gap-2 text-sm text-slate-400">
                            <input type="checkbox" name="remember">
                            Ingat Saya
                        </label>

                        <a href="{{ route('password.request') }}"
                           class="text-indigo-400 text-sm hover:underline">
                           Lupa Password?
                        </a>

                    </div>

                    <!-- BUTTON -->
                    <button class="w-full bg-indigo-600 hover:bg-indigo-500 py-3 rounded-xl font-bold transition">
                        🚀 Login
                    </button>

                    <!-- REGISTER -->
                    <p class="text-center text-slate-400 text-sm mt-4">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-indigo-400 font-bold">
                            Daftar
                        </a>
                    </p>

                </form>

            </div>

        </div>

    </div>

</x-guest-layout>