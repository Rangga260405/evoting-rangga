<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Token;
use App\Models\VotingParticipant;

class VotingController extends Controller
{
    /**
     * HALAMAN VOTING
     */
    public function index()
    {
        // harus login
        if (!Auth::check()) {

            return redirect('/login');
        }

        // admin tidak boleh voting
        if (Auth::user()->role === 'admin') {

            return redirect('/dashboard')
                ->with('error', 'Admin tidak dapat melakukan voting.');
        }

        // cek peserta voting
        $participant = VotingParticipant::where(
            'user_id',
            Auth::id()
        )->first();

        // cek approved ATAU token
        if (

            (
                !$participant ||
                $participant->status !== 'approved'
            )

            &&

            !Session::has('verified_token')

        ) {

            return redirect('/dashboard')
                ->with(
                    'error',
                    'Akun belum disetujui admin atau scan QR token terlebih dahulu.'
                );
        }

        $candidates = Candidate::all();

        return view('vote.index', compact('candidates'));
    }

    /**
     * DETAIL KANDIDAT
     */
    public function show($id)
    {
        // harus login
        if (!Auth::check()) {

            return redirect('/login');
        }

        // admin tidak boleh akses voting
        if (Auth::user()->role === 'admin') {

            return redirect('/dashboard')
                ->with('error', 'Admin tidak dapat melakukan voting.');
        }

        // cek peserta voting
        $participant = VotingParticipant::where(
            'user_id',
            Auth::id()
        )->first();

        // cek approved ATAU token
        if (

            (
                !$participant ||
                $participant->status !== 'approved'
            )

            &&

            !Session::has('verified_token')

        ) {

            return redirect('/dashboard')
                ->with(
                    'error',
                    'Akun belum disetujui admin atau scan QR token terlebih dahulu.'
                );
        }

        // ambil kandidat
        $candidate = Candidate::findOrFail($id);

        // cek user sudah vote atau belum
        $alreadyVote = Vote::where(
            'user_id',
            Auth::id()
        )->exists();

        return view('vote.show', compact(
            'candidate',
            'alreadyVote'
        ));
    }

    /**
     * SIMPAN VOTE
     */
    public function store(Request $request)
    {
        // cek login
        if (!Auth::check()) {

            return redirect('/login');
        }

        $user = Auth::user();

        // admin tidak boleh vote
        if ($user->role === 'admin') {

            return redirect('/dashboard')
                ->with('error', 'Admin tidak dapat melakukan voting.');
        }

        // cek peserta voting
        $participant = VotingParticipant::where(
            'user_id',
            $user->id
        )->first();

        // cek approved ATAU token
        if (

            (
                !$participant ||
                $participant->status !== 'approved'
            )

            &&

            !Session::has('verified_token')

        ) {

            return redirect('/dashboard')
                ->with(
                    'error',
                    'Akun belum disetujui admin atau scan QR token terlebih dahulu.'
                );
        }

        // cegah vote 2x
        if (Vote::where('user_id', $user->id)->exists()) {

            return redirect('/results')
                ->with('error', 'Anda sudah melakukan vote.');
        }

        // validasi
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id'
        ]);

        // simpan vote
        Vote::create([
            'user_id' => $user->id,
            'candidate_id' => $request->candidate_id,
            'ip_address' => $request->ip(),
            'device' => $request->userAgent()
        ]);

        // tambah suara
        Candidate::find($request->candidate_id)
            ->increment('vote_count');



        // hapus session token
        Session::forget('verified_token');

        Session::forget('token_id');

        return redirect('/results')
            ->with('success', 'Voting berhasil!');
    }

    /**
     * HASIL
     */
    public function results()
    {
        $candidates = Candidate::orderBy('vote_count', 'DESC')->get();

        $totalVotes = Candidate::sum('vote_count');

        return view('results.index', compact(
            'candidates',
            'totalVotes'
        ));
    }

    /**
     * API CHART
     */
    public function data()
    {
        return response()->json(

            Candidate::orderBy('vote_count', 'DESC')->get()

        );
    }
}