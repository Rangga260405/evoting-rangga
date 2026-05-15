<section class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 shadow-2xl">

    <!-- HEADER -->
    <header class="mb-8">

        <div class="flex items-center gap-4 mb-4">

            <div class="w-14 h-14 rounded-2xl bg-purple-500/20 flex items-center justify-center text-base md:text-xl">
                🔒
            </div>

            <div>

                <h2 class="text-base md:text-xl font-black text-white">
                    Update Password
                </h2>

                <p class="text-slate-400 mt-1">
                    Ensure your account is using a secure password to keep your account safe.
                </p>

            </div>

        </div>

    </header>

    <!-- FORM -->
    <form method="post" action="{{ route('password.update') }}" class="space-y-6">

        @csrf
        @method('put')

        <!-- CURRENT PASSWORD -->
        <div>

            <label
                for="update_password_current_password"
                class="block text-sm font-bold text-slate-300 mb-2"
            >
                Current Password
            </label>

            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                class="w-full rounded-2xl border border-slate-700 bg-slate-800/80 text-white placeholder-slate-400 focus:border-purple-500 focus:ring-purple-500 shadow-lg"
            >

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2"
            />

        </div>

        <!-- NEW PASSWORD -->
        <div>

            <label
                for="update_password_password"
                class="block text-sm font-bold text-slate-300 mb-2"
            >
                New Password
            </label>

            <input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
                class="w-full rounded-2xl border border-slate-700 bg-slate-800/80 text-white placeholder-slate-400 focus:border-purple-500 focus:ring-purple-500 shadow-lg"
            >

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2"
            />

        </div>

        <!-- CONFIRM PASSWORD -->
        <div>

            <label
                for="update_password_password_confirmation"
                class="block text-sm font-bold text-slate-300 mb-2"
            >
                Confirm Password
            </label>

            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="w-full rounded-2xl border border-slate-700 bg-slate-800/80 text-white placeholder-slate-400 focus:border-purple-500 focus:ring-purple-500 shadow-lg"
            >

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2"
            />

        </div>

        <!-- BUTTON -->
        <div class="flex items-center gap-4 pt-2">

            <button
                type="submit"
                class="px-6 py-3 rounded-2xl bg-gradient-to-r from-purple-600 to-indigo-600 hover:scale-105 transition-all duration-300 font-bold shadow-2xl"
            >
                🔐 Update Password
            </button>

            @if (session('status') === 'password-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-400 font-semibold"
                >
                    ✅ Password updated successfully.
                </p>

            @endif

        </div>

    </form>

</section>