<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class AdminController extends Controller
{
    // 📚 Book Upload Page
    public function showBookUpload(Request $request)
    {
        $search = $request->input('search');

        $books = Book::with('category')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('author', 'like', "%$search%")
                      ->orWhereJsonContains('tags', $search);
            })
            ->latest()->get();

        $categories = Category::all();

        return view('admin.uploadbook', compact('books', 'categories', 'search'));
    }

    // 🗂️ Category Upload Page
    public function showCategoryUpload()
    {
        $categories = Category::withCount('books')->latest()->get();
        return view('admin.addcategory', compact('categories'));
    }

    // 🧾 Store Category
    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create($request->only('name'));
        return back()->with('success', 'Category added successfully');
    }

    // 📘 Store Book
    public function storeBook(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'description' => 'required|string',
            'tags' => 'nullable|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        Book::create([
            'name' => $request->name,
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'tags' => explode(',', $request->tags),
            'category_id' => $request->category_id
        ]);

        return back()->with('success', 'Book uploaded successfully');
    }

    // 📖 Show Single Book
    public function show(Book $book, Request $request)
    {
        $query = $request->input('q');
        $categories = Category::with('books')->get(); // ✅ for sidebar

        return view('show', compact('book', 'categories', 'query'));
    }

    // 🌐 Learning Hub (All Books)
    public function learningHub()
    {
        $books = Book::latest()->get();
        $categories = Category::with('books')->get();

        if ($books->isEmpty()) {
            return view('learninghub', [
                'books' => $books,
                'categories' => $categories,
                'message' => 'No book uploaded'
            ]);
        }

        return view('learninghub', compact('books', 'categories'));
    }
}