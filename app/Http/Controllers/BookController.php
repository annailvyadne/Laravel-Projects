<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category; // Make sure to include the Category model

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->get(); // Fetch all books with categories
        return view('books.indexBooks', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Fetch all categories for the dropdown
        return view('books.createBooks', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required',
            'categoryId' => 'required',
            'status' => 'required|boolean', // Ensure status is validated as a boolean
        ]);

        // Create and save the new book
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'categoryId' => $request->categoryId,
            'status' => $request->status, // This will be either true (1) or false (0)
        ]);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.showBooks', compact('book')); // Make sure you have a view for showing details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all(); // Fetch all categories for the dropdown
        return view('books.updateBooks', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'isbn' => 'required',
            'categoryId' => 'required',
            'status' => 'required|boolean', // Ensure status is validated as a boolean
        ]);

        $book = Book::findOrFail($id);

        $book->update([
            'author' => $request->author,
            'isbn' => $request->isbn,
            'categoryId' => $request->categoryId,
            'status' => $request->status, // This will be either true (1) or false (0)
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Category::where('id', $id)->firstOrFail();
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
