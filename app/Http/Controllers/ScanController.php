<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class ScanController extends Controller
{
    public function index($token)
    {
        $data = Token::where('token', $token)->first();

        if (!$data) {
            return "Token tidak valid!";
        }

        if ($data->is_used) {
            return "Token sudah digunakan!";
        }

        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Vote::where('user_id', Auth::id())->exists()) {
            return "Kamu sudah voting!";
        }

        $candidates = Candidate::all();

        return view('scan.vote', compact('candidates', 'token'));
    }

    public function vote(Request $request)
    {
        $token = Token::where('token', $request->token)->first();

        if (!$token || $token->is_used) {
            return "Token tidak valid / sudah dipakai!";
        }

        Vote::create([
            'user_id' => Auth::id(),
            'candidate_id' => $request->candidate_id,
            'ip_address' => $request->ip(),
            'device' => $request->userAgent()
        ]);

        $token->update(['is_used' => true]);

        return redirect('/dashboard')->with('success', 'Voting berhasil via QR!');
    }
}