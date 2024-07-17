<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class EntryController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'criterion1' => 'required|numeric',
            'criterion2' => 'required|numeric',
            'criterion3' => 'required|numeric',
            'criteria1_name' => 'required|string|max:255',
            'criteria1_weight' => 'required|numeric',
            'criteria2_name' => 'required|string|max:255',
            'criteria2_weight' => 'required|numeric',
            'criteria3_name' => 'required|string|max:255',
            'criteria3_weight' => 'required|numeric',
            // Validate other fields as necessary
        ]);

        $entry = Entry::create($validated);

        return redirect()->route('calculate', $entry->id);
    }

    public function calculate($id)
    {
        $entry = Entry::find($id);

        // Perform SMART calculation using criteria names and weights
        $totalWeight = $entry->criteria1_weight + $entry->criteria2_weight + $entry->criteria3_weight;
        $result = ($entry->criterion1 * $entry->criteria1_weight +
                   $entry->criterion2 * $entry->criteria2_weight +
                   $entry->criterion3 * $entry->criteria3_weight) / $totalWeight;

        return view('calculate', compact('entry', 'result'));
    }

    public function history()
    {
        $entries = Entry::all();
        return view('history', compact('entries'));
    }

    public function destroy($id)
    {
        $entry = Entry::find($id);
        $entry->delete();

        return redirect()->route('history');
    }
}
