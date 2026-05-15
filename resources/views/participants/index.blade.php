<x-app-layout>

    <div class="min-h-screen bg-slate-950 text-white p-8">

        <div class="max-w-7xl mx-auto">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-10">

                <div>

                    <h1 class="text-5xl font-black mb-3">
                        👥 Peserta Voting
                    </h1>

                    <p class="text-slate-400 text-lg">
                        Kelola peserta yang mengikuti event voting mahasiswa
                    </p>

                </div>

                <a href="/dashboard"
                    class="bg-slate-800 hover:bg-indigo-600 px-5 py-3 rounded-2xl font-bold transition-all duration-300 shadow-xl">

                    ← Dashboard

                </a>

            </div>

            <!-- ALERT -->
            @if(session('success'))

                <div
                    class="mb-8 bg-green-500/10 border border-green-500/20 text-green-400 px-6 py-4 rounded-2xl">

                    {{ session('success') }}

                </div>

            @endif

            <!-- TABLE -->
            <div
                class="bg-slate-900/80 border border-slate-800 rounded-[32px] overflow-hidden shadow-2xl">

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead
                            class="bg-slate-800 border-b border-slate-700">

                            <tr>

                                <th class="text-left px-6 py-5">
                                    Nama
                                </th>

                                <th class="text-left px-6 py-5">
                                    NIM
                                </th>

                                <th class="text-left px-6 py-5">
                                    Email
                                </th>

                                <th class="text-left px-6 py-5">
                                    Status
                                </th>

                                <th class="text-center px-6 py-5">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($participants as $participant)

                                <tr
                                    class="border-b border-slate-800 hover:bg-slate-800/40 transition-all duration-300">

                                    <!-- NAMA -->
                                    <td class="px-6 py-5 font-semibold">

                                        {{ $participant->user->name }}

                                    </td>

                                    <!-- NIM -->
                                    <td class="px-6 py-5 text-slate-300">

                                        {{ $participant->user->nim }}

                                    </td>

                                    <!-- EMAIL -->
                                    <td class="px-6 py-5 text-slate-300">

                                        {{ $participant->user->email }}

                                    </td>

                                    <!-- STATUS -->
                                    <td class="px-6 py-5">

                                        @if($participant->status === 'approved')

                                            <span
                                                class="bg-green-500/10 border border-green-500/20 text-green-400 px-4 py-2 rounded-full text-sm font-bold">

                                                🟢 Approved

                                            </span>

                                        @elseif($participant->status === 'rejected')

                                            <span
                                                class="bg-red-500/10 border border-red-500/20 text-red-400 px-4 py-2 rounded-full text-sm font-bold">

                                                🔴 Rejected

                                            </span>

                                        @else

                                            <span
                                                class="bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 px-4 py-2 rounded-full text-sm font-bold">

                                                🟡 Pending

                                            </span>

                                        @endif

                                    </td>

                                    <!-- ACTION -->
                                    <td class="px-6 py-5">

                                        <div
                                            class="flex items-center justify-center gap-3">

                                            <!-- APPROVE -->
                                            <form
                                                action="{{ route('participants.approve', $participant->id) }}"
                                                method="POST">

                                                @csrf

                                                <button type="submit"
                                                    class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-xl font-bold transition-all duration-300">

                                                    ✅ Approve

                                                </button>

                                            </form>

                                            <!-- REJECT -->
                                            <form
                                                action="{{ route('participants.reject', $participant->id) }}"
                                                method="POST">

                                                @csrf

                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded-xl font-bold transition-all duration-300">

                                                    ❌ Reject

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5"
                                        class="text-center py-20">

                                        <div class="text-7xl mb-5">
                                            👥
                                        </div>

                                        <h2
                                            class="text-3xl font-black mb-3">

                                            Belum Ada Peserta

                                        </h2>

                                        <p class="text-slate-400">

                                            Peserta voting belum tersedia.

                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>