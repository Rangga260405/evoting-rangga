<x-app-layout>

<div class="min-h-screen bg-slate-950 text-white p-8">

    <div class="max-w-6xl mx-auto">

        <div class="flex items-center justify-between mb-8">

            <h1 class="text-4xl font-black">
                🔐 QR Token Voting
            </h1>

            <form action="/token/generate"
                method="POST">

                @csrf

                <button
                    class="bg-indigo-600 hover:bg-indigo-500 px-6 py-3 rounded-2xl font-bold">

                    + Generate Token

                </button>

            </form>

        </div>

        @if(session('success'))

            <div
                class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-2xl mb-6">

                {{ session('success') }}

            </div>

        @endif

        <div class="grid md:grid-cols-3 gap-6">

            @foreach($tokens as $token)

                <div
                    class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-2xl">

                    <div class="mb-5 flex justify-center">

                        {!! QrCode::size(200)->generate(

                            url('/verify-token/' . $token->token)

                    ) !!}

                    </div>

                    <div class="text-center">

                        <h2 class="text-xl font-black mb-2">

                            {{ $token->token }}

                        </h2>

                        @if($token->is_used)

                            <span class="bg-red-500/20 text-red-400 px-4 py-2 rounded-full font-bold">
                                Sudah Dipakai
                            </span>

                        @else

                            <span class="bg-green-500/20 text-green-400 px-4 py-2 rounded-full font-bold">
                                Belum Dipakai
                            </span>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

</x-app-layout>