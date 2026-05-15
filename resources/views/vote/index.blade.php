<x-app-layout>

    <div class="min-h-screen bg-slate-950 text-white overflow-hidden">

        <!-- BACKGROUND -->
        <div class="fixed inset-0 -z-10 overflow-hidden">
            <div class="absolute top-0 left-0 w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl"></div>
        </div>

        <div class="w-full max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-10">

            <!-- HEADER -->
            <div class="text-center mb-14">

                <div class="inline-flex items-center gap-3 bg-indigo-500/10 border border-indigo-500/20 px-5 py-2 rounded-full mb-6 backdrop-blur-xl">
                    <div class="w-3 h-3 rounded-full bg-green-400 animate-pulse"></div>
                    <span class="text-sm font-bold tracking-wide text-indigo-300 uppercase">
                        Voting Sedang Berlangsung
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl md:text-5xl xl:text-6xl font-black text-white mb-5">
                    🗳 Pemilihan Raya Mahasiswa
                </h1>

                <p class="text-slate-400 text-xl max-w-3xl mx-auto leading-relaxed">
                    Klik kandidat untuk melihat detail lengkap visi, misi, dan profil pasangan calon mahasiswa.
                </p>

            </div>
            <div class="mb-6">
                <a href="{{ url()->previous() }}"
                    class="inline-flex items-center gap-2 bg-slate-800 hover:bg-indigo-600 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 shadow-lg">

                    ← Kembali

                </a>
            </div>

            <!-- ALERT -->
            @if(session('error'))
                <div class="max-w-2xl mx-auto mb-8 bg-red-500/10 border border-red-500/20 text-red-400 px-6 py-4 rounded-2xl backdrop-blur-xl shadow-2xl">
                    ❌ {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="max-w-2xl mx-auto mb-8 bg-green-500/10 border border-green-500/20 text-green-400 px-6 py-4 rounded-2xl backdrop-blur-xl shadow-2xl">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <!-- INFO SUDAH VOTE -->
            @if($sudahVote ?? false)
                <div class="max-w-2xl mx-auto mb-10 bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 px-6 py-4 rounded-2xl text-center shadow-xl">
                    ⚠️ Anda sudah melakukan vote. Tidak dapat memilih lagi.
                </div>
            @endif

            <!-- GRID -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-8">

                @foreach($candidates as $candidate)

                    <!-- CARD -->
                    <a href="{{ route('candidate.show', $candidate->id) }}"
                       class="group relative block bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-[32px] overflow-hidden hover:border-indigo-500 transition-all duration-500 hover:-translate-y-2 shadow-2xl">

                        <!-- IMAGE -->
                        <!-- FOTO -->
                        <div class="relative h-[300px] sm:h-[330px] md:h-[380px] lg:h-[490px] xl:h-[580px] bg-slate-900 overflow-hidden">

                            @if($candidate->foto)

                                <img src="{{ asset('storage/' . $candidate->foto) }}"
                                    class="absolute inset-0 m-auto max-w-full max-h-full object-contain">

                            @else

                                <img src="https://ui-avatars.com/api/?name={{ urlencode($candidate->nama_ketua) }}"
                                    class="absolute inset-0 m-auto max-w-full max-h-full object-contain">

                            @endif

                        </div>

                        <!-- CONTENT -->
                        <div class="p-7">

                            <h2 class="text-base md:text-xl font-black text-white mb-2">
                                {{ $candidate->nama_ketua }}
                            </h2>

                            <p class="text-slate-400 mb-4">
                                {{ $candidate->nama_wakil }}
                            </p>

                            <!-- VISI -->
                            <p class="text-sm text-slate-400 mb-6">
                                {{ Str::limit($candidate->visi, 100) }}
                            </p>

                            <!-- BUTTON -->
                            @if($sudahVote ?? false)

                                <div class="w-full text-center bg-gray-700 py-3 rounded-xl font-bold cursor-not-allowed">
                                    ✅ Sudah Memilih
                                </div>

                            @else

                                <div class="w-full text-center bg-indigo-600 py-3 rounded-xl font-bold group-hover:bg-indigo-500 transition">
                                    👁 Lihat Detail
                                </div>

                            @endif

                        </div>

                    </a>

                @endforeach

            </div>

        </div>

    </div>

</x-app-layout>