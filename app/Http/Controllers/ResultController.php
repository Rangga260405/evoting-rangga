<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Barryvdh\DomPDF\Facade\Pdf;

class ResultController extends Controller
{
    public function index()
    {
        // ambil kandidat + urutkan dari suara terbanyak
        $candidates = Candidate::orderByDesc('vote_count')->get();

        // total suara
        $totalVotes = $candidates->sum('vote_count');

        return view('results.index', compact(
            'candidates',
            'totalVotes'
        ));
    }

    public function data()
    {
        $candidates = Candidate::orderByDesc('vote_count')->get();

        return response()->json($candidates);
    }

    /**
     * EXPORT PDF HASIL VOTING
     */
    public function exportPdf()
    {
        // ambil kandidat
        $candidates = Candidate::orderByDesc('vote_count')->get();

        // total suara
        $totalVotes = $candidates->sum('vote_count');

        // generate pdf
        $pdf = Pdf::loadView('results.pdf', compact(
            'candidates',
            'totalVotes'
        ));

        // download pdf
        return $pdf->download('hasil-voting-evotingeasy.pdf');
    }
}