<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCandidates = Candidate::count();

        $totalVotes = Vote::count();

        return view('dashboard', compact(
            'totalCandidates',
            'totalVotes'
        ));
    }
}