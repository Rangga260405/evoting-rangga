<section class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 shadow-2xl">

    <!-- HEADER -->
    <header class="mb-8">

        <div class="flex items-center gap-4 mb-4">

            <div class="w-14 h-14 rounded-2xl bg-indigo-500/20 flex items-center justify-center text-base md:text-xl">
                👤
            </div>

            <div>

                <h2 class="text-base md:text-xl font-black text-white">
                    Profile Information
                </h2>

                <p class="text-slate-400 mt-1">
                    Update your account profile information and email address.
                </p>

            </div>

        </div>

    </header>

    <!-- VERIFY -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- FORM -->
    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">

        @csrf
        @method('patch')

        <!-- NAME -->
        <div>

            <label for="name" class="block text-sm font-bold text-slate-300 mb-2">
                Name
            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="w-full rounded-2xl border border-slate-700 bg-slate-800/80 text-white placeholder-slate-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-lg"
            >

            <x-input-error class="mt-2" :messages="$errors->get('name')" />

        </div>

        <!-- EMAIL -->
        <div>

            <label for="email" class="block text-sm font-bold text-slate-300 mb-2">
                Email
            </label>

            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="w-full rounded-2xl border border-slate-700 bg-slate-800/80 text-white placeholder-slate-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-lg"
            >

            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div class="mt-4 p-4 rounded-2xl bg-yellow-500/10 border border-yellow-500/20">

                    <p class="text-sm text-yellow-300">

                        Your email address is unverified.

                        <button
                            form="send-verification"
                            class="underline font-semibold hover:text-yellow-200 transition"
                        >
                            Click here to re-send the verification email.
                        </button>

                    </p>

                    @if (session('status') === 'verification-link-sent')

                        <p class="mt-3 text-sm font-semibold text-green-400">
                            Verification link successfully sent to your email.
                        </p>

                    @endif

                </div>

            @endif

        </div>

        <!-- BUTTON -->
        <div class="flex items-center gap-4 pt-2">

            <button
                type="submit"
                class="px-6 py-3 rounded-2xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:scale-105 transition-all duration-300 font-bold shadow-2xl"
            >
                💾 Save Changes
            </button>

            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-400 font-semibold"
                >
                    ✅ Profile updated successfully.
                </p>

            @endif

        </div>

    </form>

</section>