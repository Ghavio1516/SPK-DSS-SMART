<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;
use App\Models\Entry;

class AlternativeController extends Controller
{
    public function index()
    {
        $entries = Entry::all();
        return view('alternatives.index', compact('entries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alternative_name' => 'required|string|max:255',
            'criteria' => 'required|array',
            'criteria.*.entry_id' => 'required|exists:entries,id',
            'criteria.*.weight' => 'required|numeric',
        ]);

        $alternative = Alternative::create([
            'name' => $request->alternative_name,
        ]);

        foreach ($validated['criteria'] as $criterion) {
            $alternative->criteriaWeights()->create([
                'entry_id' => $criterion['entry_id'],
                'weight' => $criterion['weight'],
            ]);
        }

        return redirect()->route('alternatives.index')->with('success', 'Alternative added successfully.');
    }
}

