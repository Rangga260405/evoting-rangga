<x-app-layout>

<div class="min-h-screen bg-slate-950 flex items-center justify-center p-6">

    <div class="bg-slate-900 border border-slate-800 rounded-3xl p-4 md:p-6 xl:p-8 shadow-2xl text-center max-w-md w-full">

        <h1 class="text-3xl font-bold text-white mb-3">
            🎫 Token Voting
        </h1>

        <p class="text-slate-400 mb-6">
            Scan QR berikut untuk masuk ke voting
        </p>

        <div class="bg-white p-5 rounded-2xl inline-block mb-6">
            <img src="{{ asset($qr) }}" width="220">
        </div>

        <div class="bg-slate-800 rounded-2xl p-4">

            <p class="text-slate-400 text-sm mb-2">
                TOKEN
            </p>

            <p class="text-indigo-400 font-bold text-lg break-all">
                {{ $token }}
            </p>

        </div>

    </div>

</div>

</x-app-layout>