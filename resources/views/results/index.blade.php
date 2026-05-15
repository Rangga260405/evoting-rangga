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

            <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-8">

                <!-- BACK -->
                <div>
                    <a href="{{ url()->previous() }}"
                        class="inline-flex items-center gap-2 bg-slate-800 hover:bg-indigo-600 px-5 py-3 rounded-2xl text-sm font-bold transition-all duration-300 shadow-xl hover:scale-105">

                        ← Kembali

                    </a>
                </div>

                <!-- EXPORT PDF -->
                @if(auth()->user()->role === 'admin')

                    <div>

                        <a href="{{ route('results.pdf') }}"
                            class="inline-flex items-center gap-3 bg-gradient-to-r from-red-600 to-pink-600 hover:from-red-500 hover:to-pink-500 px-6 py-3 rounded-2xl font-black text-white shadow-2xl transition-all duration-300 hover:scale-105 border border-red-400/20">

                            <span class="text-xl">
                                📄
                            </span>

                            <span>
                                Export PDF
                            </span>

                        </a>

                    </div>

                @endif

            </div>

            <!-- HEADER -->
            <div class="text-center mb-14">

                <div
                    class="inline-flex items-center gap-3 bg-indigo-500/10 border border-indigo-500/20 px-5 py-2 rounded-full mb-6">

                    <div class="w-3 h-3 rounded-full bg-green-400 animate-pulse">
                    </div>

                    <span class="text-indigo-300 font-semibold tracking-wide">

                        REALTIME RESULT

                    </span>

                </div>

                <h1
                    class="text-3xl sm:text-4xl md:text-5xl xl:text-6xl font-black bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent mb-5">

                    📊 Hasil Voting

                </h1>

                <p class="text-slate-400 text-xl">

                    Perolehan suara kandidat secara realtime

                </p>

            </div>

            <!-- TOTAL -->
            <div
                class="mb-10 bg-slate-900/80 border border-slate-800 rounded-3xl p-8 shadow-2xl backdrop-blur-xl">

                <div class="flex flex-col md:flex-row items-center justify-between gap-6">

                    <div>

                        <p class="text-slate-400 text-lg mb-2">
                            Total Seluruh Suara
                        </p>

                        <h2
                            class="text-6xl font-black text-indigo-400">

                            {{ $totalVotes }}

                        </h2>

                    </div>

                    <div
                        class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-3 md:py-4 rounded-3xl shadow-2xl">

                        <div class="text-center">

                            <div class="text-5xl mb-2">
                                🗳
                            </div>

                            <p class="font-bold text-xl">
                                LIVE VOTING
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- CHART -->
            <div
                class="bg-slate-900/80 border border-slate-800 rounded-3xl p-8 mb-12 shadow-2xl backdrop-blur-xl">

                <div class="flex items-center justify-between mb-8">

                    <div>

                        <h2 class="text-3xl font-black text-white mb-2">
                            Grafik Voting
                        </h2>

                        <p class="text-slate-400">
                            Update otomatis setiap 3 detik
                        </p>

                    </div>

                    <div
                        class="flex items-center gap-3 bg-green-500/10 border border-green-500/20 px-4 py-2 rounded-2xl">

                        <div
                            class="w-3 h-3 rounded-full bg-green-400 animate-pulse">
                        </div>

                        <span class="text-green-400 font-bold">
                            LIVE
                        </span>

                    </div>

                </div>

                <div class="h-[260px] sm:h-[320px] md:h-[420px]">

                    <canvas id="voteChart" height="120"></canvas>

                </div>

            </div>

            <!-- CANDIDATES -->
            <div class="grid lg:grid-cols-2 gap-8">

                @foreach($candidates as $index => $c)

                    @php
                        $percent = $totalVotes > 0
                            ? ($c->vote_count / $totalVotes) * 100
                            : 0;
                    @endphp

                    <div
                        class="group bg-slate-900/80 border border-slate-800 rounded-3xl overflow-hidden shadow-2xl hover:border-indigo-500 transition-all duration-500 hover:scale-[1.02] backdrop-blur-xl">

                        <!-- IMAGE -->
                        <div class="relative">

                            @if($c->foto)

                                <img src="{{ asset('storage/' . $c->foto) }}"
                                    class="w-full h-64 md:h-[260px] sm:h-[320px] md:h-[380px] lg:h-[420px] xl:h-[500px] lg:h-80 object-contain bg-slate-900 p-2">

                            @else

                                <img src="https://ui-avatars.com/api/?name={{ urlencode($c->nama_ketua) }}&background=4f46e5&color=fff&size=500"
                                    class="w-full h-[260px] sm:h-[320px] md:h-[380px] lg:h-[420px] xl:h-[500px] object-contain bg-slate-900">

                            @endif

                            <!-- RANK -->
                            <div
                                class="absolute top-5 left-5 bg-black/60 backdrop-blur-lg px-5 py-2 rounded-2xl text-white font-black text-lg">

                                #{{ $index + 1 }}

                            </div>

                            @if($index == 0)

                                <div
                                    class="absolute top-5 right-5 bg-yellow-500 text-black px-5 py-2 rounded-2xl font-black shadow-2xl animate-pulse">

                                    🏆 LEADER

                                </div>

                            @endif

                        </div>

                        <!-- CONTENT -->
                        <div class="p-8">

                            <div
                                class="flex items-start justify-between gap-4 mb-6">

                                <div>

                                    <h2
                                        class="text-3xl font-black text-white mb-2">

                                        {{ $c->nama_ketua }}

                                    </h2>

                                    <p class="text-slate-400 text-lg">

                                        Wakil:
                                        {{ $c->nama_wakil }}

                                    </p>

                                </div>

                                <div
                                    class="bg-indigo-500/10 border border-indigo-500/20 rounded-2xl px-5 py-4 text-center min-w-[120px]">

                                    <h3
                                        class="text-4xl font-black text-indigo-400">

                                        {{ $c->vote_count }}

                                    </h3>

                                    <p class="text-slate-400 text-sm mt-1">
                                        suara
                                    </p>

                                </div>

                            </div>

                            <!-- PROGRESS -->
                            <div class="mb-4">

                                <div
                                    class="flex justify-between text-sm mb-3">

                                    <span class="text-slate-400">
                                        Persentase Voting
                                    </span>

                                    <span
                                        class="font-bold text-indigo-400">

                                        {{ number_format($percent, 1) }}%

                                    </span>

                                </div>

                                <div
                                    class="w-full bg-slate-800 rounded-full h-5 overflow-hidden">

                                    <div
                                        class="bg-gradient-to-r from-indigo-500 to-purple-500 h-5 rounded-full transition-all duration-1000"
                                        style="width: {{ number_format($percent, 2) . '%' }}">
                                    </div>

                                </div>

                            </div>

                            <!-- STATUS -->
                            <div
                                class="mt-6 flex items-center justify-between">

                                <div
                                    class="flex items-center gap-3 text-slate-400">

                                    <div
                                        class="w-2 h-2 rounded-full bg-green-400 animate-pulse">
                                    </div>

                                    Realtime Count

                                </div>

                                <div
                                    class="bg-slate-800 px-4 py-2 rounded-xl text-sm font-semibold text-slate-300">

                                    Kandidat Aktif

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

    <!-- AUTO REFRESH -->
    <script>
        setTimeout(() => {
            location.reload();
        }, 10000);
    </script>

    <!-- CHART -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        let chart;

        async function loadChart() {

            try {

                const res = await fetch('/results/data');

                const data = await res.json();

                const labels = data.map(c => c.nama_ketua);

                const votes = data.map(c => c.vote_count);

                const ctx = document.getElementById('voteChart');

                if (!ctx) return;

                if (chart) {

                    chart.data.labels = labels;

                    chart.data.datasets[0].data = votes;

                    chart.update();

                    return;
                }

                chart = new Chart(ctx, {

                    type: 'bar',

                    data: {

                        labels: labels,

                        datasets: [{

                            label: 'Jumlah Suara',

                            data: votes,

                            borderRadius: 20,

                            backgroundColor: [
                                '#6366f1',
                                '#8b5cf6',
                                '#ec4899',
                                '#06b6d4',
                                '#10b981'
                            ]

                        }]

                    },

                    options: {

                        responsive: true,

                        maintainAspectRatio: false,

                        plugins: {

                            legend: {

                                labels: {

                                    color: 'white',

                                    font: {
                                        size: 16,
                                        weight: 'bold'
                                    }

                                }

                            }

                        },

                        scales: {

                            x: {

                                ticks: {

                                    color: 'white',

                                    font: {
                                        size: 14
                                    }

                                },

                                grid: {
                                    color: '#1e293b'
                                }

                            },

                            y: {

                                ticks: {

                                    color: 'white',

                                    font: {
                                        size: 14
                                    }

                                },

                                grid: {
                                    color: '#1e293b'
                                }

                            }

                        }

                    }

                });

            } catch (e) {

                console.log('Chart error:', e);

            }

        }

        loadChart();

        setInterval(loadChart, 3000);

    </script>

</x-app-layout>