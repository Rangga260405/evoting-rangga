<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'nim' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // AMBIL DATA LOGIN
        $credentials = $request->only('nim', 'password');

        // COBA LOGIN
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {

            // ❌ LOGIN GAGAL
            return back()
                ->withErrors([
                    'login' => '❌ NIM atau Password salah!',
                ])
                ->withInput($request->only('nim'));
        }

        // ✅ LOGIN BERHASIL
        $request->session()->regenerate();

        return redirect()->intended('/dashboard')
            ->with('success', '✅ Login berhasil!');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
