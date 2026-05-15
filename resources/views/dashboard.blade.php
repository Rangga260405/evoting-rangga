<x-app-layout>

    <div class="min-h-screen bg-slate-950 text-white px-6 py-10">

        {{-- ================= TAMBAHAN ================= --}}
        @php
            $setting = \App\Models\Setting::first();

            if (!$setting) {
                $setting = (object) [
                    'voting_status' => 'not_started'
                ];
            }

            $participant = \App\Models\VotingParticipant::where(
                'user_id',
                auth()->id()
            )->first();
        @endphp

        @if(session('success'))

            <div
                class="mb-6 bg-green-500/10 border border-green-500/20 text-green-400 px-6 py-4 rounded-2xl shadow-xl">

                {{ session('success') }}

            </div>

        @endif

        @if(session('error'))

            <div
                class="mb-6 bg-red-500/10 border border-red-500/20 text-red-400 px-6 py-4 rounded-2xl shadow-xl">

                {{ session('error') }}

            </div>

        @endif

        @if(auth()->user()->role === 'admin')

            <div class="mb-8 bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <div>

                        <h2 class="text-2xl font-black mb-2">
                            ⚙️ Kontrol Voting
                        </h2>

                        <p class="text-slate-400">
                            Kelola status event voting mahasiswa
                        </p>

                    </div>

                    <div class="flex flex-wrap gap-3">

                        <a href="/voting/not_started"
                            class="px-5 py-3 bg-gray-500 hover:bg-gray-400 rounded-xl text-sm font-bold transition-all duration-300 shadow-lg">

                            ⚪ Belum Dimulai

                        </a>

                        <a href="/voting/active"
                            class="px-5 py-3 bg-green-600 hover:bg-green-500 rounded-xl text-sm font-bold transition-all duration-300 shadow-lg">

                            🟢 Aktifkan

                        </a>

                        <a href="/voting/closed"
                            class="px-5 py-3 bg-red-600 hover:bg-red-500 rounded-xl text-sm font-bold transition-all duration-300 shadow-lg">

                            🔴 Tutup

                        </a>

                    </div>

                </div>

                <div class="mt-6">

                    @if($setting->voting_status === 'active')

                        <span
                            class="px-4 py-2 bg-green-500/10 text-green-400 border border-green-500/20 rounded-full text-sm font-bold">

                            🟢 Voting Sedang Berlangsung

                        </span>

                    @elseif($setting->voting_status === 'closed')

                        <span
                            class="px-4 py-2 bg-red-500/10 text-red-400 border border-red-500/20 rounded-full text-sm font-bold">

                            🔴 Voting Ditutup

                        </span>

                    @else

                        <span
                            class="px-4 py-2 bg-gray-500/10 text-gray-300 border border-gray-500/20 rounded-full text-sm font-bold">

                            ⚪ Voting Belum Dimulai

                        </span>

                    @endif

                </div>

            </div>

        @endif
        {{-- ================= END TAMBAHAN ================= --}}

        <!-- HERO SECTION -->
        <div
            class="relative overflow-hidden rounded-[32px] bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-700 p-8 md:p-6 xl:p-8 mb-10 shadow-2xl border border-indigo-500/30">

            <div
                class="absolute -top-20 -right-20 w-72 h-[260px] sm:h-[320px] md:h-[380px] lg:h-[420px] xl:h-[500px] bg-white/10 rounded-full blur-3xl">
            </div>

            <div
                class="absolute -bottom-20 -left-20 w-72 h-[260px] sm:h-[320px] md:h-[380px] lg:h-[420px] xl:h-[500px] bg-purple-400/20 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">

                <!-- STATUS -->
                <div
                    class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-4 py-2 rounded-full mb-6 backdrop-blur-xl">

                    @if($setting->voting_status === 'active')

                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>

                        <span class="text-xs md:text-sm font-semibold">
                            Voting Sedang Berlangsung
                        </span>

                    @elseif($setting->voting_status === 'closed')

                        <span class="w-2 h-2 bg-red-400 rounded-full"></span>

                        <span class="text-xs md:text-sm font-semibold">
                            Voting Ditutup
                        </span>

                    @else

                        <span class="w-2 h-2 bg-gray-400 rounded-full"></span>

                        <span class="text-xs md:text-sm font-semibold">
                            Belum Dimulai
                        </span>

                    @endif

                </div>

                <!-- TITLE -->
                <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight">

                    EvoTingEasy

                    <br>

                    <span class="text-indigo-100 text-base md:text-4xl">

                        E-Voting Mahasiswa

                    </span>

                </h1>

                <!-- DESC -->
                <p class="text-indigo-100 text-sm md:text-base max-w-xl leading-relaxed">

                    Platform pemilihan raya mahasiswa modern dengan sistem realtime,
                    QR token, anti-cheat, dan dashboard premium modern UI.

                </p>

                <!-- BUTTON -->
                <div class="flex flex-wrap gap-3 mt-6">

                    {{-- USER ONLY --}}
                    @if(auth()->user()->role !== 'admin')

                        {{-- SUDAH APPROVED --}}
                        @if($participant && $participant->status === 'approved')

                            @if($setting->voting_status === 'active')

                                <a href="/vote"
                                    class="bg-white text-indigo-700 hover:bg-indigo-100 px-5 py-3 rounded-xl text-sm font-bold transition-all duration-300 hover:scale-105 shadow-lg">

                                    🗳 Mulai Voting

                                </a>

                            @endif

                            <div
                                class="px-5 py-3 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 text-sm font-bold">

                                ✅ Peserta Disetujui

                            </div>

                        {{-- PENDING --}}
                        @elseif($participant && $participant->status === 'pending')

                            <div
                                class="px-5 py-3 rounded-xl bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 text-sm font-bold">

                                🟡 Menunggu Persetujuan Admin

                            </div>

                        {{-- REJECTED --}}
                        @elseif($participant && $participant->status === 'rejected')

                            <div
                                class="px-5 py-3 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 text-sm font-bold">

                                🔴 Pendaftaran Ditolak

                            </div>

                        {{-- BELUM DAFTAR --}}
                        @else

                            <form action="{{ route('participant.register') }}"
                                method="POST">

                                @csrf

                                <button type="submit"
                                    class="bg-green-600 hover:bg-green-500 px-6 py-4 rounded-2xl font-bold transition-all duration-300 hover:scale-105 shadow-xl">

                                    ✅ Daftar Peserta Voting

                                </button>

                            </form>

                        @endif

                    @endif

                    <!-- HASIL -->
                    <a href="/results"
                        class="bg-black/20 backdrop-blur-xl border border-white/20 hover:bg-black/30 px-5 py-3 rounded-xl text-sm font-bold transition-all duration-300 hover:scale-105">

                        📊 Lihat Hasil

                    </a>

                </div>

            </div>

        </div>

        <!-- STATS -->
        <div class="grid md:grid-cols-3 gap-6 mb-10">

            <div
                class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl hover:scale-[1.02] transition">

                <div
                    class="w-12 h-12 rounded-xl bg-indigo-500/20 flex items-center justify-center text-base md:text-xl mb-4">

                    👨‍💼

                </div>

                <h2 class="text-3xl font-black">

                    {{ $totalCandidates }}

                </h2>

                <p class="text-slate-400 text-sm mt-1">
                    Total Kandidat
                </p>

            </div>

            <div
                class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl hover:scale-[1.02] transition">

                <div
                    class="w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center text-base md:text-xl mb-4">

                    🗳

                </div>

                <h2 class="text-3xl font-black">

                    {{ $totalVotes }}

                </h2>

                <p class="text-slate-400 text-sm mt-1">
                    Total Vote
                </p>

            </div>

            <div
                class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl hover:scale-[1.02] transition">

                <div
                    class="w-12 h-12 rounded-xl bg-green-500/20 flex items-center justify-center text-base md:text-xl mb-4">

                    ⚡

                </div>

                <h2 class="text-3xl font-black">
                    LIVE
                </h2>

                <p class="text-slate-400 text-sm mt-1">
                    Realtime System
                </p>

            </div>

        </div>

        <!-- MENU -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

            @auth

                @if(auth()->user()->role === 'admin')

                    <!-- KANDIDAT -->
                    <a href="/candidates"
                        class="group bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl hover:border-indigo-500 transition">

                        <h2 class="text-lg font-bold">
                            👨‍💼 Kandidat
                        </h2>

                    </a>

                    <!-- PESERTA -->
                    <a href="/participants"
                        class="group bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl hover:border-cyan-500 transition">

                        <h2 class="text-lg font-bold">
                            👥 Peserta Voting
                        </h2>

                    </a>

                @endif

            @endauth

            @if(auth()->user()->role !== 'admin')

                <a href="/vote"
                    class="group bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl hover:border-purple-500 transition">

                    <h2 class="text-lg font-bold">
                        🗳 Voting
                    </h2>

                </a>

            @endif

            <!-- HASIL -->
            <a href="/results"
                class="group bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl hover:border-green-500 transition">

                <h2 class="text-lg font-bold">
                    📊 Hasil
                </h2>

            </a>

            @if(auth()->user()->role === 'admin')

                <!-- TOKEN -->
                <a href="/token"
                    class="group bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl hover:border-yellow-500 transition">

                    <h2 class="text-lg font-bold">
                        🔐 Token
                    </h2>

                </a>

            @endif

        </div>

    </div>

</x-app-layout>