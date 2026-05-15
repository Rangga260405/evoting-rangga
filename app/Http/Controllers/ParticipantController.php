<?php

namespace App\Http\Controllers;

use App\Models\VotingParticipant;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    /**
     * USER DAFTAR PESERTA
     */
    public function register()
    {
        $exists = VotingParticipant::where(
            'user_id',
            Auth::id()
        )->first();

        if ($exists) {

            return back()->with(
                'error',
                'Kamu sudah mendaftar peserta voting.'
            );
        }

        VotingParticipant::create([

            'user_id' => Auth::id(),

            'status' => 'pending'

        ]);

        return back()->with(
            'success',
            'Berhasil daftar peserta voting. Tunggu persetujuan admin.'
        );
    }

    /**
     * ADMIN LIHAT PESERTA
     */
    public function index()
    {
        $participants = VotingParticipant::with('user')
            ->latest()
            ->get();

        return view(
            'participants.index',
            compact('participants')
        );
    }

    /**
     * APPROVE
     */
    public function approve($id)
    {
        VotingParticipant::findOrFail($id)
            ->update([
                'status' => 'approved'
            ]);

        return back()->with(
            'success',
            'Peserta berhasil disetujui.'
        );
    }

    /**
     * REJECT
     */
    public function reject($id)
    {
        VotingParticipant::findOrFail($id)
            ->update([
                'status' => 'rejected'
            ]);

        return back()->with(
            'success',
            'Peserta ditolak.'
        );
    }
}