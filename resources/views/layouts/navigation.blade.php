<nav x-data="{ open: false }"
    class="bg-slate-950/95 backdrop-blur-xl border-b border-slate-800 shadow-2xl sticky top-0 z-50">

    <!-- TOP GLOW -->
    <div
        class="absolute inset-x-0 top-0 h-[1px] bg-gradient-to-r from-transparent via-indigo-500 to-transparent">
    </div>

    <!-- CONTAINER -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-20">

            <!-- LEFT -->
            <div class="flex items-center gap-10">

                <!-- LOGO -->
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-4 group">

                    <div
                        class="relative bg-gradient-to-br from-indigo-600 to-purple-600 p-3 rounded-3xl shadow-2xl group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">

                        <div
                            class="absolute inset-0 bg-indigo-500 blur-xl opacity-30 rounded-3xl">
                        </div>

                        <x-application-logo
                            class="relative block h-8 w-8 fill-current text-white" />

                    </div>

                    <div>

                        <h1
                            class="text-base md:text-xl font-black text-white tracking-wide leading-none">

                            EvoTingEasy

                        </h1>

                        <p class="text-xs text-indigo-400 mt-1 tracking-widest">

                            MODERN E-VOTING SYSTEM

                        </p>

                    </div>

                </a>

                <!-- DESKTOP MENU -->
                <div class="hidden lg:flex items-center gap-3">

                    <!-- DASHBOARD -->
                    <a href="{{ route('dashboard') }}"
                        class="px-5 py-3 rounded-2xl text-sm font-bold transition-all duration-300
                        {{ request()->routeIs('dashboard')
                            ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-2xl'
                            : 'text-slate-300 hover:bg-slate-900 hover:text-white border border-transparent hover:border-slate-700' }}">

                        🏠 Dashboard
                    </a>

                    @if(auth()->user()->role !== 'admin')

                        <a href="/vote"
                            class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300
                            {{ request()->is('vote*')
                                ? 'bg-indigo-600 text-white shadow-lg'
                                : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                            🗳 Voting
                        </a>

                    @endif
                    <a href="/results"
                        class="px-5 py-3 rounded-2xl text-sm font-bold transition-all duration-300
                        {{ request()->is('results*')
                            ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-2xl'
                            : 'text-slate-300 hover:bg-slate-900 hover:text-white border border-transparent hover:border-slate-700' }}">

                        📊 Hasil
                    </a>

                    <!-- ADMIN ONLY -->
                    @if(Auth::user()->role === 'admin')

                        <div class="h-8 w-[1px] bg-slate-700 mx-2"></div>

                        <a href="/candidates"
                            class="px-5 py-3 rounded-2xl text-sm font-bold transition-all duration-300
                            {{ request()->is('candidates*')
                                ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-2xl'
                                : 'text-slate-300 hover:bg-slate-900 hover:text-white border border-transparent hover:border-slate-700' }}">

                            👨‍💼 Kandidat
                        </a>

                        <a href="/token"
                            class="px-5 py-3 rounded-2xl text-sm font-bold transition-all duration-300
                            {{ request()->is('token*')
                                ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-2xl'
                                : 'text-slate-300 hover:bg-slate-900 hover:text-white border border-transparent hover:border-slate-700' }}">

                            🔐 Token
                        </a>

                    @endif

                </div>

            </div>

            <!-- RIGHT -->
            <div class="hidden sm:flex items-center">

                <x-dropdown align="right" width="64">

                    <x-slot name="trigger">

                        <button
                            class="group flex items-center gap-4 bg-slate-900/90 border border-slate-800 hover:border-indigo-500 px-4 py-3 rounded-3xl transition-all duration-300 shadow-2xl hover:scale-105">

                            <!-- AVATAR -->
                            <div
                                class="relative w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-600 to-purple-600 flex items-center justify-center text-white font-black text-lg shadow-2xl">

                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                                <div
                                    class="absolute -bottom-1 -right-1 w-4 h-4 rounded-full bg-green-400 border-2 border-slate-950 animate-pulse">
                                </div>

                            </div>

                            <!-- USER -->
                            <div class="text-left">

                                <div
                                    class="text-white font-bold text-sm leading-none mb-1">

                                    {{ Auth::user()->name }}

                                </div>

                                <div
                                    class="text-xs font-semibold tracking-wide
                                    {{ Auth::user()->role === 'admin'
                                        ? 'text-amber-400'
                                        : 'text-indigo-400' }}">

                                    {{ strtoupper(Auth::user()->role) }}

                                </div>

                            </div>

                            <!-- ICON -->
                            <svg class="fill-current h-4 w-4 text-slate-400 group-hover:text-white transition-all duration-300"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">

                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />

                            </svg>

                        </button>

                    </x-slot>

                    <!-- DROPDOWN -->
                    <x-slot name="content">

                        <div
                            class="bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden shadow-2xl">

                            <!-- HEADER -->
                            <div
                                class="px-6 py-3 md:py-4 border-b border-slate-800 bg-gradient-to-r from-indigo-600/10 to-purple-600/10">

                                <h3 class="text-white font-black text-lg">

                                    {{ Auth::user()->name }}

                                </h3>

                                <p class="text-slate-400 text-sm mt-1">

                                    {{ Auth::user()->email }}

                                </p>

                                <div
                                    class="inline-flex mt-3 px-3 py-1 rounded-full text-xs font-bold
                                    {{ Auth::user()->role === 'admin'
                                        ? 'bg-amber-500/10 text-amber-400 border border-amber-500/20'
                                        : 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20' }}">

                                    {{ strtoupper(Auth::user()->role) }}

                                </div>

                            </div>

                            <!-- MENU -->
                            <div class="p-3">

                                <a href="/profile"
                                    class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-300 hover:bg-slate-800 hover:text-white transition-all duration-300 font-semibold">

                                    ⚙ Profile

                                </a>

                                <form method="POST"
                                    action="{{ route('logout') }}">

                                    @csrf

                                    <button type="submit"
                                        class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-red-400 hover:bg-red-500/10 transition-all duration-300 font-semibold">

                                        🚪 Logout

                                    </button>

                                </form>

                            </div>

                        </div>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- MOBILE BUTTON -->
            <div class="flex items-center lg:hidden">

                <button @click="open = ! open"
                    class="p-3 rounded-2xl bg-slate-900 border border-slate-800 text-slate-300 hover:bg-slate-800 hover:border-indigo-500 transition-all duration-300">

                    <svg class="h-6 w-6" stroke="currentColor" fill="none"
                        viewBox="0 0 24 24">

                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <!-- MOBILE MENU -->
    <div :class="{'block': open, 'hidden': ! open}"
        class="hidden lg:hidden bg-slate-950 border-t border-slate-800">

        <div class="p-5 space-y-3">

            <a href="/dashboard"
                class="block px-5 py-4 rounded-2xl bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300 font-bold">

                🏠 Dashboard
            </a>

            <a href="/vote"
                class="block px-5 py-4 rounded-2xl bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300 font-bold">

                🗳 Voting
            </a>

            <a href="/results"
                class="block px-5 py-4 rounded-2xl bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300 font-bold">

                📊 Hasil
            </a>

            @if(Auth::user()->role === 'admin')

                <a href="/candidates"
                    class="block px-5 py-4 rounded-2xl bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300 font-bold">

                    👨‍💼 Kandidat
                </a>

                <a href="/token"
                    class="block px-5 py-4 rounded-2xl bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300 font-bold">

                    🔐 Token
                </a>

            @endif

            <!-- USER INFO -->
            <div
                class="bg-slate-900 border border-slate-800 rounded-3xl p-5 mt-5">

                <div class="text-white font-black text-lg">

                    {{ Auth::user()->name }}

                </div>

                <div class="text-slate-400 text-sm mt-1">

                    {{ Auth::user()->email }}

                </div>

                <div
                    class="inline-flex mt-4 px-3 py-1 rounded-full text-xs font-bold
                    {{ Auth::user()->role === 'admin'
                        ? 'bg-amber-500/10 text-amber-400 border border-amber-500/20'
                        : 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20' }}">

                    {{ strtoupper(Auth::user()->role) }}

                </div>

            </div>

            <!-- LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                    class="w-full text-left px-5 py-4 rounded-2xl bg-red-500/10 text-red-400 hover:bg-red-500/20 transition-all duration-300 font-bold">

                    🚪 Logout

                </button>

            </form>

        </div>

    </div>

</nav>