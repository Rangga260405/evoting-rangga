<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();

        return view('candidates.index', compact('candidates'));
    }

    public function create()
    {
        return view('candidates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_urut' => 'required',
            'nama_ketua' => 'required',
            'nama_wakil' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'foto' => 'nullable|image'
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')
                ->store('candidates', 'public');
        }

        Candidate::create([
            'nomor_urut' => $request->nomor_urut,
            'nama_ketua' => $request->nama_ketua,
            'nama_wakil' => $request->nama_wakil,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'foto' => $foto,
        ]);

        return redirect('/candidates')
            ->with('success', 'Kandidat berhasil ditambahkan');
    }

    public function edit(Candidate $candidate)
    {
        return view('candidates.edit', compact('candidate'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $request->validate([
            'nomor_urut' => 'required',
            'nama_ketua' => 'required',
            'nama_wakil' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'foto' => 'nullable|image'
        ]);

        $foto = $candidate->foto;

        // upload foto baru
        if ($request->hasFile('foto')) {

            // hapus foto lama
            if ($candidate->foto &&
                Storage::disk('public')->exists($candidate->foto)) {

                Storage::disk('public')
                    ->delete($candidate->foto);
            }

            $foto = $request->file('foto')
                ->store('candidates', 'public');
        }

        $candidate->update([
            'nomor_urut' => $request->nomor_urut,
            'nama_ketua' => $request->nama_ketua,
            'nama_wakil' => $request->nama_wakil,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'foto' => $foto,
        ]);

        return redirect('/candidates')
            ->with('success', 'Kandidat berhasil diupdate');
    }

    public function destroy(Candidate $candidate)
    {
        // hapus foto
        if ($candidate->foto &&
            Storage::disk('public')->exists($candidate->foto)) {

            Storage::disk('public')
                ->delete($candidate->foto);
        }

        $candidate->delete();

        return redirect('/candidates')
            ->with('success', 'Kandidat berhasil dihapus');
    }
}