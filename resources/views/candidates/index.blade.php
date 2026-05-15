<x-app-layout>

    <div class="min-h-screen bg-slate-950 text-white overflow-hidden">

        <!-- BACKGROUND -->
        <div class="fixed inset-0 -z-10 overflow-hidden">

            <div
                class="absolute top-0 left-0 w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl">
            </div>

            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl">
            </div>

        </div>

        <div class="w-full max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-10">

            <!-- HEADER -->
            <div
                class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-8 mb-14">

                <div>

                    <div
                        class="inline-flex items-center gap-3 bg-indigo-500/10 border border-indigo-500/20 px-5 py-2 rounded-full mb-6 backdrop-blur-xl">

                        <div
                            class="w-3 h-3 rounded-full bg-green-400 animate-pulse">
                        </div>

                        <span
                            class="text-sm font-bold tracking-wide text-indigo-300 uppercase">

                            Kandidat Aktif

                        </span>

                    </div>

                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl xl:text-6xl font-black text-white mb-4 leading-tight">

                        👨‍💼 Kandidat Pemira

                    </h1>

                    <p class="text-slate-400 text-xl max-w-2xl">

                        Daftar pasangan calon mahasiswa modern untuk pemilihan raya mahasiswa berbasis digital.

                    </p>

                </div>
                <div class="mb-6">
                    <a href="{{ url()->previous() }}"
                         class="inline-flex items-center gap-2 bg-slate-800 hover:bg-indigo-600 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 shadow-lg">

                        ← Kembali

                    </a>
                </div>

                <!-- ACTION -->
                <div class="flex flex-wrap gap-4">

                    @if(auth()->user()->role === 'admin')

                        <a href="/candidates/create"
                            class="group bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 px-7 py-4 rounded-2xl font-black transition-all duration-300 hover:scale-105 shadow-2xl flex items-center gap-3">

                            <span
                                class="group-hover:rotate-90 transition-all duration-300">
                                ➕
                            </span>

                            Tambah Kandidat

                        </a>

                    @endif

                    <a href="/dashboard"
                        class="bg-slate-900/80 border border-slate-800 hover:border-indigo-500 px-7 py-4 rounded-2xl font-bold transition-all duration-300 hover:scale-105 shadow-2xl backdrop-blur-xl">

                        ← Dashboard

                    </a>

                </div>

            </div>

            <!-- CARD GRID -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-8">

                @forelse($candidates as $candidate)

                    <div
                        class="group relative bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-[32px] overflow-hidden hover:border-indigo-500 transition-all duration-500 hover:-translate-y-2 shadow-2xl">

                        <!-- GLOW -->
                        <div
                            class="absolute -top-20 -right-20 w-56 h-56 bg-indigo-500/10 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-all duration-500">
                        </div>

                        <!-- IMAGE -->
                        <div class="relative overflow-hidden">

                            @if($candidate->foto)

                                <img src="{{ asset('storage/' . $candidate->foto) }}"
                                    class="w-full h-full object-contain bg-slate-900 group-hover:scale-110 transition-all duration-700">

                            @else

                                <img src="https://ui-avatars.com/api/?name={{ urlencode($candidate->nama_ketua) }}&background=4f46e5&color=fff&size=400"
                                    class="w-full h-[260px] sm:h-[320px] md:h-[380px] lg:h-[420px] xl:h-[500px] object-contain bg-slate-900 group-hover:scale-110 transition-all duration-700">

                            @endif

                            <!-- OVERLAY -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent">
                            </div>

                            <!-- NOMOR -->
                            <div
                                class="absolute top-5 left-5 w-16 h-16 rounded-2xl bg-gradient-to-r from-indigo-600 to-purple-600 flex items-center justify-center text-base md:text-xl font-black shadow-2xl border border-white/10">

                                {{ $candidate->nomor_urut }}

                            </div>

                            <!-- STATUS -->
                            <div
                                class="absolute top-5 right-5 bg-green-500/10 border border-green-500/20 backdrop-blur-xl px-4 py-2 rounded-full">

                                <span
                                    class="text-green-400 text-sm font-bold">

                                    🟢 Aktif

                                </span>

                            </div>

                        </div>

                        <!-- CONTENT -->
                        <div class="p-7 relative z-10">

                            <!-- NAME -->
                            <div class="mb-7">

                                <h2
                                    class="text-3xl font-black text-white leading-tight mb-3">

                                    {{ $candidate->nama_ketua }}

                                </h2>

                                <div
                                    class="flex items-center gap-3 text-indigo-400 font-bold text-lg mb-3">

                                    <div
                                        class="w-10 h-[2px] bg-indigo-500">
                                    </div>

                                    PASANGAN

                                </div>

                                <h3
                                    class="text-base md:text-xl font-bold text-slate-300">

                                    {{ $candidate->nama_wakil }}

                                </h3>

                            </div>

                            <!-- VISI -->
                            <div
                                class="bg-slate-800/50 border border-slate-700 rounded-3xl p-5 mb-5 backdrop-blur-xl">

                                <div
                                    class="flex items-center gap-3 mb-4">

                                    <div
                                        class="w-10 h-10 rounded-2xl bg-indigo-500/10 flex items-center justify-center">

                                        ✨

                                    </div>

                                    <h4
                                        class="text-indigo-400 font-black text-lg">

                                        Visi

                                    </h4>

                                </div>

                                <p
                                    class="text-slate-300 leading-relaxed text-sm">

                                    {{ Str::limit($candidate->visi, 120) }}

                                </p>

                            </div>

                            <!-- MISI -->
                            <div
                                class="bg-slate-800/50 border border-slate-700 rounded-3xl p-5 mb-7 backdrop-blur-xl">

                                <div
                                    class="flex items-center gap-3 mb-4">

                                    <div
                                        class="w-10 h-10 rounded-2xl bg-purple-500/10 flex items-center justify-center">

                                        🚀

                                    </div>

                                    <h4
                                        class="text-purple-400 font-black text-lg">

                                        Misi

                                    </h4>

                                </div>

                                <p
                                    class="text-slate-300 leading-relaxed text-sm">

                                    {{ Str::limit($candidate->misi, 120) }}

                                </p>

                            </div>

                            <!-- FOOTER -->
                            <div class="space-y-4">

                                <!-- USER -->
                                @if(auth()->user()->role !== 'admin')

                                    <a href="/vote"
                                        class="w-full flex items-center justify-center gap-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 py-4 rounded-2xl font-black transition-all duration-300 hover:scale-105 shadow-2xl">

                                        🗳 Vote Sekarang

                                    </a>

                                @endif

                                <!-- ADMIN -->
                                @if(auth()->user()->role === 'admin')

                                    <div class="grid grid-cols-2 gap-4">

                                        <!-- EDIT -->
                                        <a href="{{ route('candidates.edit', $candidate->id) }}"
                                            class="flex items-center justify-center gap-2 bg-yellow-500 hover:bg-yellow-400 text-black py-4 rounded-2xl font-black transition-all duration-300 hover:scale-105 shadow-2xl">

                                            ✏ Edit

                                        </a>

                                        <!-- DELETE -->
                                        <form action="{{ route('candidates.destroy', $candidate->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus kandidat ini?')"
                                                class="w-full flex items-center justify-center gap-2 bg-red-600 hover:bg-red-500 py-4 rounded-2xl font-black transition-all duration-300 hover:scale-105 shadow-2xl">

                                                🗑 Hapus

                                            </button>

                                        </form>

                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>

                @empty

                    <!-- EMPTY -->
                    <div class="col-span-3">

                        <div
                            class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-[32px] p-20 text-center shadow-2xl">

                            <div class="text-8xl mb-8">
                                👨‍💼
                            </div>

                            <h2
                                class="text-5xl font-black text-white mb-5">

                                Belum Ada Kandidat

                            </h2>

                            <p
                                class="text-slate-400 text-xl mb-10 max-w-2xl mx-auto leading-relaxed">

                                Tambahkan kandidat terlebih dahulu untuk memulai sistem voting mahasiswa digital.

                            </p>

                            @if(auth()->user()->role === 'admin')

                                <a href="/candidates/create"
                                    class="inline-flex items-center gap-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 px-8 py-3 md:py-4 rounded-2xl font-black transition-all duration-300 hover:scale-105 shadow-2xl">

                                    ➕ Tambah Kandidat

                                </a>

                            @endif

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>