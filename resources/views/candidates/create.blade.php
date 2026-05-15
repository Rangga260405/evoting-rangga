<x-app-layout>

<div class="min-h-screen p-8 text-white">

    <div class="max-w-3xl mx-auto">

        <div
            class="bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-2xl">

            <h1 class="text-4xl font-black text-indigo-400 mb-8">
                ➕ Tambah Kandidat
            </h1>

            <form action="/candidates"
                    method="POST"
                    enctype="multipart/form-data">

                @csrf

                <!-- NOMOR -->
                <div class="mb-6">

                    <label class="block mb-3 text-slate-300">
                        Nomor Urut
                    </label>

                    <input type="number"
                        name="nomor_urut"
                        class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 text-white">

                </div>

                <!-- KETUA -->
                <div class="mb-6">

                    <label class="block mb-3 text-slate-300">
                        Nama Ketua
                    </label>

                    <input type="text"
                        name="nama_ketua"
                        class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 text-white">

                </div>

                <!-- WAKIL -->
                <div class="mb-6">

                    <label class="block mb-3 text-slate-300">
                        Nama Wakil
                    </label>

                    <input type="text"
                        name="nama_wakil"
                        class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 text-white">

                </div>

                <!-- FOTO -->
                <div class="mb-6">

                    <label class="block mb-3 text-slate-300">
                        Foto Kandidat
                    </label>

                    <input type="file"
                        name="foto"
                        class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 text-white">

                </div>

                <!-- VISI -->
                <div class="mb-6">

                    <label class="block mb-3 text-slate-300">
                        Visi
                    </label>

                    <textarea name="visi"
                        rows="4"
                        class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 text-white"></textarea>

                </div>

                <!-- MISI -->
                <div class="mb-8">

                    <label class="block mb-3 text-slate-300">
                        Misi
                    </label>

                    <textarea name="misi"
                        rows="4"
                        class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 text-white"></textarea>

                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-500 py-4 rounded-2xl font-bold text-lg transition-all duration-300 hover:scale-105">

                    🚀 Simpan Kandidat

                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>