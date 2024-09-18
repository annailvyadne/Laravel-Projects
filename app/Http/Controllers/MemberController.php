<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all(); // Fetch all members from the database
        return view('members.indexMembers', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.createMembers');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'password' => 'required|string|min:8',
            'address' => 'nullable|string',
            'phone_num' => 'nullable|string',
            'membership_type' => 'nullable|string',
            'membership_date' => 'nullable|date',
            'status' => 'required|boolean',
        ]);

        // Create and save the new member
        $member = Member::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Make sure to hash the password
            'address' => $request->address,
            'phone_num' => $request->phone_num,
            'membership_type' => $request->membership_type,
            'membership_date' => $request->membership_date,
            'status' => $request->status,
        ]);

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::findOrFail($id); // Find the member or fail with a 404
        return view('members.showMembers', compact('member')); // Pass the member to the view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Member::findOrFail($id); // Find the member or fail with a 404
        return view('members.updateMembers', compact('member')); // Pass the member to the edit view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $id,
            'password' => 'nullable|string|min:8',
            'address' => 'nullable|string',
            'phone_num' => 'nullable|string',
            'membership_type' => 'nullable|string',
            'membership_date' => 'nullable|date',
            'status' => 'required|boolean',
        ]);

        $member = Member::findOrFail($id); // Find the member or fail with a 404

        $member->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $member->password,
            'address' => $request->address,
            'phone_num' => $request->phone_num,
            'membership_type' => $request->membership_type,
            'membership_date' => $request->membership_date,
            'status' => $request->status,
        ]);

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::findOrFail($id); // Find the member or fail with a 404
        $member->delete(); // Delete the member

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
