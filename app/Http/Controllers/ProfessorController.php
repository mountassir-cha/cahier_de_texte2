<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Specialty;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        return view('professors.index', compact('professors'));
    }

    public function create()
    {
        $specialties = Specialty::all();
        return view('professors.create', compact('specialties'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:professors',
            'phone' => 'nullable|string',
            'specialty' => 'required|string',
            'type' => 'required|string',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        Professor::create($validated);

        return redirect()->route('professors.index')
            ->with('success', 'Professeur créé avec succès.');
    }

    public function edit($id)
    {
        $professor = Professor::findOrFail($id);
        $specialties = Specialty::all();
        return view('professors.edit', compact('professor', 'specialties'));
    }

    public function update(Request $request, $id)
    {
        $professor = Professor::findOrFail($id);
        
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:professors,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'specialty_id' => 'required|exists:specialties,id',
            'type' => 'required|in:permanent,vacataire',
            'is_active' => 'boolean'
        ]);

        $professor->update($validated);

        return redirect()->route('professors.index')
            ->with('success', 'Professeur modifié avec succès');
    }

    public function destroy($id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();

        return redirect()->route('professors.index')
            ->with('success', 'Professeur supprimé avec succès');
    }
} 