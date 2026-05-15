<x-app-layout>

    <div class="min-h-screen bg-slate-950 text-white p-6 md:p-8">

        <div class="max-w-5xl mx-auto">

            <!-- BACK BUTTON -->
            <div class="mb-6">

                <a href="{{ url()->previous() }}"
                    class="inline-flex items-center gap-2 bg-slate-900 border border-slate-800 hover:bg-indigo-600 hover:border-indigo-500 px-5 py-3 rounded-2xl text-sm font-bold transition-all duration-300 shadow-xl">

                    ← Kembali

                </a>

            </div>

            <!-- CARD -->
            <div
                class="bg-slate-900/90 backdrop-blur-xl border border-slate-800 rounded-[32px] overflow-hidden shadow-2xl">

                <!-- FOTO -->
                <!-- FOTO -->
                <div class="relative w-full h-[550px] overflow-hidden">

                    @if($candidate->foto)

                        <!-- BACKGROUND BLUR -->
                        <img src="{{ asset('storage/' . $candidate->foto) }}"
                            class="absolute inset-0 w-full h-full object-contain bg-slate-900 blur-2xl scale-110 opacity-40">

                        <!-- FOTO UTAMA -->
                        <div class="relative z-10 flex items-center justify-center h-full">

                            <img src="{{ asset('storage/' . $candidate->foto) }}"
                                class="h-full object-contain">

                        </div>

                    @else

                        <!-- BACKGROUND -->
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($candidate->nama_ketua) }}"
                            class="absolute inset-0 w-full h-full object-contain bg-slate-900 blur-2xl scale-110 opacity-40">

                        <!-- FOTO -->
                        <div class="relative z-10 flex items-center justify-center h-full">

                            <img src="https://ui-avatars.com/api/?name={{ urlencode($candidate->nama_ketua) }}"
                                class="h-full object-contain">

                        </div>

                    @endif

                    <!-- NOMOR -->
                    <div
                        class="absolute top-6 left-6 bg-indigo-600 w-20 h-20 rounded-3xl flex items-center justify-center text-3xl font-black shadow-2xl z-20">

                        {{ $candidate->nomor_urut }}

                    </div>

                </div>

                <!-- CONTENT -->
                <div class="p-6 md:p-4 md:p-6 xl:p-8">

                    <!-- NAMA -->
                    <div class="mb-10">

                        <div
                            class="inline-flex items-center gap-3 bg-indigo-500/10 border border-indigo-500/20 px-4 py-2 rounded-full mb-6">

                            <div
                                class="w-3 h-3 rounded-full bg-green-400 animate-pulse">
                            </div>

                            <span
                                class="text-indigo-300 text-sm font-bold uppercase tracking-wide">

                                Kandidat Mahasiswa

                            </span>

                        </div>

                        <h1
                            class="text-4xl md:text-5xl font-black leading-tight mb-4">

                            {{ $candidate->nama_ketua }}

                        </h1>

                        <div
                            class="flex items-center gap-3 text-indigo-400 font-bold text-lg mb-3">

                            <div class="w-12 h-[2px] bg-indigo-500"></div>

                            PASANGAN

                        </div>

                        <h2
                            class="text-base md:text-xl md:text-3xl text-slate-300 font-bold">

                            {{ $candidate->nama_wakil }}

                        </h2>

                    </div>

                    <!-- VISI -->
                    <div
                        class="bg-slate-800/70 border border-slate-700 rounded-3xl p-6 md:p-8 mb-8 shadow-xl">

                        <div class="flex items-center gap-4 mb-5">

                            <div
                                class="w-14 h-14 rounded-2xl bg-indigo-500/10 flex items-center justify-center text-base md:text-xl">

                                ✨

                            </div>

                            <div>

                                <h3
                                    class="text-base md:text-xl font-black text-indigo-400">

                                    Visi

                                </h3>

                                <p class="text-slate-500 text-sm">
                                    Tujuan utama kandidat
                                </p>

                            </div>

                        </div>

                        <p
                            class="text-slate-300 leading-relaxed text-base md:text-lg">

                            {{ $candidate->visi }}

                        </p>

                    </div>

                    <!-- MISI -->
                    <div
                        class="bg-slate-800/70 border border-slate-700 rounded-3xl p-6 md:p-8 mb-10 shadow-xl">

                        <div class="flex items-center gap-4 mb-5">

                            <div
                                class="w-14 h-14 rounded-2xl bg-purple-500/10 flex items-center justify-center text-base md:text-xl">

                                🚀

                            </div>

                            <div>

                                <h3
                                    class="text-base md:text-xl font-black text-purple-400">

                                    Misi

                                </h3>

                                <p class="text-slate-500 text-sm">
                                    Program kerja dan rencana kandidat
                                </p>

                            </div>

                        </div>

                        <p
                            class="text-slate-300 leading-relaxed text-base md:text-lg whitespace-pre-line">

                            {{ $candidate->misi }}

                        </p>

                    </div>

                    <!-- BUTTON -->
                    @if(auth()->user()->role !== 'admin')

                        @if(!$alreadyVote)

                            <form action="{{ route('vote.store') }}"
                                method="POST">

                                @csrf

                                <input type="hidden"
                                    name="candidate_id"
                                    value="{{ $candidate->id }}">

                                <button type="submit"
                                    onclick="return confirm('Yakin memilih kandidat ini?')"
                                    class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 py-3 md:py-4 rounded-3xl text-xl md:text-base md:text-xl font-black transition-all duration-300 hover:scale-[1.02] shadow-2xl">

                                    🗳 Pilih Kandidat Ini

                                </button>

                            </form>

                        @else

                            <button disabled
                                class="w-full bg-slate-800 border border-slate-700 py-3 md:py-4 rounded-3xl text-xl md:text-base md:text-xl font-black text-slate-400 cursor-not-allowed shadow-xl">

                                ✅ Anda Sudah Melakukan Vote

                            </button>

                        @endif

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>