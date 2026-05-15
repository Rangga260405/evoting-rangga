<section class="space-y-6">

    <header>
        <h2 class="text-base md:text-xl font-black text-red-400 flex items-center gap-2">
            ⚠️ {{ __('Delete Account') }}
        </h2>

        <p class="mt-2 text-sm text-slate-400 leading-relaxed max-w-2xl">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- BUTTON -->
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-500 px-6 py-3 rounded-2xl text-sm font-bold shadow-lg transition-all duration-300 hover:scale-105"
    >
        🗑 {{ __('Delete Account') }}
    </x-danger-button>

    <!-- MODAL -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post"
            action="{{ route('profile.destroy') }}"
            class="p-8 bg-slate-900 text-white rounded-3xl border border-slate-800 shadow-2xl">

            @csrf
            @method('delete')

            <!-- TITLE -->
            <h2 class="text-base md:text-xl font-black text-red-400 mb-3">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <!-- DESC -->
            <p class="text-slate-400 leading-relaxed text-sm mb-6">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <!-- PASSWORD -->
            <div class="mt-4 relative">

                <x-input-label
                    for="password"
                    value="{{ __('Password') }}"
                    class="text-slate-300 mb-2"
                />

                <input
                    id="password"
                    name="password"
                    type="text"
                    placeholder="Masukkan Password"
                    class="w-full rounded-2xl bg-slate-800 border border-slate-700 text-white placeholder-slate-500 focus:border-red-500 focus:ring-red-500 px-5 py-4 outline-none transition-all duration-300"
                >

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2"
                />

            </div>

            <!-- BUTTON -->
            <div class="mt-8 flex justify-end gap-3">

                <button
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="bg-slate-800 hover:bg-slate-700 text-slate-200 hover:text-white border border-slate-700 px-5 py-3 rounded-2xl transition-all duration-300 shadow-lg font-semibold"
                >
                    {{ __('Cancel') }}
                </button>

                <x-danger-button
                    class="bg-red-600 hover:bg-red-500 px-5 py-3 rounded-2xl shadow-lg transition-all duration-300"
                >
                    🗑 {{ __('Delete Account') }}
                </x-danger-button>

            </div>

        </form>

    </x-modal>

</section>