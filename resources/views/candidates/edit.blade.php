<x-app-layout>

    <div class="min-h-screen bg-slate-950 text-white p-8">

        <div class="max-w-3xl mx-auto">

            <div
                class="bg-slate-900 border border-slate-800 rounded-3xl p-4 md:p-6 xl:p-8 shadow-2xl">

                <h1 class="text-4xl font-black text-indigo-400 mb-8">
                    ✏ Edit Kandidat
                </h1>

                <form action="{{ route('candidates.update', $candidate->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-6">

                    @csrf
                    @method('PUT')

                    <div>

                        <label class="block mb-2 font-semibold">
                            Nomor Urut
                        </label>

                        <input type="number"
                            name="nomor_urut"
                            value="{{ $candidate->nomor_urut }}"
                            class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 text-white">

                    </div>

                    <div>

                        <label class="block mb-2 font-semibold">
                            Nama Ketua
                        </label>

                        <input type="text"
                            name="nama_ketua"
                            value="{{ $candidate->nama_ketua }}"
                            class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 text-white">

                    </div>

                    <div>

                        <label class="block mb-2 font-semibold">
                            Nama Wakil
                        </label>

                        <input type="text"
                            name="nama_wakil"
                            value="{{ $candidate->nama_wakil }}"
                            class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 text-white">

                    </div>

                    <div>

                        <label class="block mb-2 font-semibold">
                            Visi
                        </label>

                        <textarea name="visi"
                            rows="3"
                            class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 text-white">{{ $candidate->visi }}</textarea>

                    </div>

                    <div>

                        <label class="block mb-2 font-semibold">
                            Misi
                        </label>

                        <textarea name="misi"
                            rows="5"
                            class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 text-white">{{ $candidate->misi }}</textarea>

                    </div>

                    <div>

                        <label class="block mb-2 font-semibold">
                            Foto Kandidat
                        </label>

                        @if($candidate->foto)

                            <img src="{{ asset('storage/' . $candidate->foto) }}"
                                class="w-40 h-40 object-contain bg-slate-900 rounded-2xl mb-4">

                        @endif

                        <input type="file"
                            name="foto"
                            class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 text-white">

                    </div>

                    <div class="flex gap-4">

                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-500 px-8 py-4 rounded-2xl font-bold transition-all duration-300">

                            💾 Update Kandidat
                        </button>

                        <a href="/candidates"
                            class="bg-slate-700 hover:bg-slate-600 px-8 py-4 rounded-2xl font-bold transition-all duration-300">

                            ← Kembali
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>