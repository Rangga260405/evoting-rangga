<x-app-layout>

    <div class="min-h-screen bg-slate-950 text-white px-6 py-10">

        <!-- HEADER -->
        <div class="max-w-5xl mx-auto mb-10">

            <div
                class="relative overflow-hidden rounded-[32px] bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-700 p-8 shadow-2xl border border-indigo-500/30">

                <!-- Glow -->
                <div class="absolute -top-20 -right-20 w-72 h-[260px] sm:h-[320px] md:h-[380px] lg:h-[420px] xl:h-[500px] bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 w-72 h-[260px] sm:h-[320px] md:h-[380px] lg:h-[420px] xl:h-[500px] bg-purple-400/20 rounded-full blur-3xl"></div>

                <div class="relative z-10">

                    <div
                        class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-4 py-2 rounded-full mb-5 backdrop-blur-xl">

                        <span class="animate-pulse">⚙️</span>

                        <span class="text-sm font-semibold">
                            Pengaturan Akun
                        </span>

                    </div>

                    <h1 class="text-4xl md:text-5xl font-black mb-4 leading-tight">

                        Profile Pengguna

                    </h1>

                    <p class="text-indigo-100 text-base md:text-lg leading-relaxed max-w-2xl">

                        Kelola informasi akun, password, dan keamanan akun EvoTingEasy kamu.

                    </p>

                </div>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="max-w-5xl mx-auto space-y-8">

            <!-- PROFILE -->
            <div
                class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 shadow-2xl">

                <div class="mb-6">

                    <h2 class="text-base md:text-xl font-black mb-2">
                        👤 Informasi Profile
                    </h2>

                    <p class="text-slate-400">
                        Update nama dan email akun kamu.
                    </p>

                </div>

                @include('profile.partials.update-profile-information-form')

            </div>

            <!-- PASSWORD -->
            <div
                class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 shadow-2xl">

                <div class="mb-6">

                    <h2 class="text-base md:text-xl font-black mb-2">
                        🔐 Update Password
                    </h2>

                    <p class="text-slate-400">
                        Gunakan password yang aman agar akun tetap terlindungi.
                    </p>

                </div>

                @include('profile.partials.update-password-form')

            </div>

            <!-- DELETE ACCOUNT -->
            <div
                class="bg-slate-900/80 backdrop-blur-xl border border-red-500/20 rounded-3xl p-8 shadow-2xl">

                <div class="mb-6">

                    <h2 class="text-base md:text-xl font-black text-red-400 mb-2">
                        ⚠️ Hapus Akun
                    </h2>

                    <p class="text-slate-400">
                        Setelah akun dihapus, seluruh data akan hilang permanen.
                    </p>

                </div>

                @include('profile.partials.delete-user-form')

            </div>

        </div>

    </div>

</x-app-layout>