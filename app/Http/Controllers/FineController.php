<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use App\Models\Member;
use App\Models\Issue;
use Illuminate\Http\Request;

class FineController extends Controller
{
    public function index()
    {
        $fines = Fine::with('member', 'issue')->get();
        return view('fines.indexFine', compact('fines'));
    }

    public function create()
    {
        $members = Member::all();
        $issues = Issue::all();
        return view('fines.createFines', compact('members', 'issues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'memberId' => 'required',
            'issueId' => 'required',
            'amount' => 'required|numeric',
            'paidDate' => 'nullable|date',
            'reason' => 'required|string',
            'status' => 'required|boolean',
        ]);

        Fine::create($request->all());

        return redirect()->route('fines.index')->with('success', 'Fine created successfully.');
    }

    public function edit(Fine $fine)
    {
        $members = Member::all();
        $issues = Issue::all();
        return view('fines.updateFines', compact('fine', 'members', 'issues'));
    }

    public function update(Request $request, Fine $fine)
    {
        $request->validate([
            'memberId' => 'required',
            'issueId' => 'required',
            'amount' => 'required|numeric',
            'paidDate' => 'nullable|date',
            'reason' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $fine->update($request->all());

        return redirect()->route('fines.index')->with('success', 'Fine updated successfully.');
    }

    public function destroy(Fine $fine)
    {
        $fine->delete();
        return redirect()->route('fines.index')->with('success', 'Fine deleted successfully.');
    }
}
