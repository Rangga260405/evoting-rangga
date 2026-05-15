<x-app-layout>

<div class="min-h-screen bg-gray-900 text-white p-8">

    <h1 class="text-base md:text-xl font-bold mb-6 text-center">
        Scan QR - Pilih Kandidat
    </h1>

    <div class="grid md:grid-cols-3 gap-6">

        @foreach($candidates as $c)
        <div class="bg-gray-800 p-5 rounded-xl text-center">

            <h2 class="text-lg font-bold">
                {{ $c->nama_ketua }}
            </h2>

            <p class="text-gray-400">
                {{ $c->nama_wakil }}
            </p>

            <form method="POST" action="{{ route('scan.vote') }}">
                @csrf
                <input type="hidden" name="candidate_id" value="{{ $c->id }}">
                <input type="hidden" name="token" value="{{ $token }}">

                <button class="mt-4 bg-blue-600 px-4 py-2 rounded">
                    Pilih
                </button>
            </form>

        </div>
        @endforeach

    </div>

</div>

</x-app-layout>