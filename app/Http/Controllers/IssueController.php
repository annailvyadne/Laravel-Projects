<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Book; // Assuming you might want to reference books
use App\Models\Member;
use Carbon\Carbon;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::all();
        return view('issues.indexIssues', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all(); // Fetch all books for dropdown
        $members = Member::all(); // Fetch all members for dropdown
        return view('issues.createIssues', compact('books', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'memberId' => 'required',
            'bookId' => 'required',
            'dueDate' => 'required|date',  // Make sure it's a valid date
            'returnDate' => 'nullable|date',
            'status' => 'required',
            'amount' => 'required',
        ]);

        // Parse the reservation date into a Carbon instance
        $dueDate = Carbon::parse($request->dueDate);
        $returnDate = Carbon::parse($request->returnDate);
        $returnDate = $request->returnDate ? Carbon::parse($request->returnDate) : null;

        // Create the reservation with formatted date
        Issue::create([
            'memberId' => $request->memberId,
            'bookId' => $request->bookId,
            'dueDate' => $dueDate->format('Y-m-d'),  // Make sure it's a valid date
            'returnDate' => $returnDate->format('Y-m-d'),
            'status' => $request->status,
            'amount' => $request->amount,
        ]);

        return redirect()->route('issues.index')->with('success', 'Issue created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $issueId)
    {
        $issue = Issue::findOrFail($issueId);
        return view('issues.showIssues', compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $issueId)
    {
        $issue = Issue::findOrFail($issueId);
        $books = Book::all(); // Fetch all books for dropdown
        $members = Member::all(); // Fetch all members for dropdown
        return view('issues.updateIssues', compact('issue', 'books', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $issueId)
    {
        // Validate the input fields
        $request->validate([
            'memberId' => 'required',
            'bookId' => 'required',
            'dueDate' => 'required|date',  // Make sure it's a valid date
            'returnDate' => 'nullable|date',
            'status' => 'required',
            'amount' =>'required',
        ]);

        $issue = Issue::findOrFail($issueId);
        $returnDate = $request->returnDate ? Carbon::parse($request->returnDate) : null;


        // Create the reservation with formatted date
        $issue->update([
            'memberId' => $request->memberId,
            'bookId' => $request->bookId,
            'dueDate' => $request->dueDate,
            'returnDate' => $request->returnDate,
            'status' => $request->status,
            'amount' => $request->amount,
        ]);

        return redirect()->route('issues.index')->with('success', 'Issue updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $issueId)
    {
        $issue = Issue::findOrFail($issueId);
        $issue->delete();

        return redirect()->route('issues.index')->with('success', 'Issue deleted successfully.');
    }
}
