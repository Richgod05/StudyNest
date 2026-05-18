<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // 📚 Book Upload Page
    public function showBookUpload(Request $request)
    {
        $search = $request->input('search');

        $books = Book::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        $categories = Category::latest()->get();

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
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Category added successfully');
    }

    // 📘 Store Book
public function storeBook(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'title' => 'nullable|string|max:255',
        'author' => 'nullable|string|max:255',
        'description' => 'required|string',
        'tags' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
        'file' => 'required|file|mimes:jpg,jpeg,png,webp,pdf|max:20480',
    ]);

    $file = $request->file('file');

    $filename = time() . '_' . $file->getClientOriginalName();

    $file->move(public_path('images'), $filename);

    $filePath = 'images/' . $filename;

    Book::create([
        'name' => $validated['name'],
        'title' => $validated['title'] ?? null,
        'author' => $validated['author'] ?? null,
        'description' => $validated['description'],
        'tags' => !empty($validated['tags'])
            ? array_map('trim', explode(',', $validated['tags']))
            : [],
        'category_id' => $validated['category_id'],
        'file' => $filePath,
    ]);

    return back()->with(
        'success',
        'Book uploaded successfully'
    );
}
    // 📖 Show Single Book
    public function show(Book $book, Request $request)
    {
        $categories = Category::with('books')->get();

        return view('learninghub', [
            'book' => $book,
            'categories' => $categories,
        ]);
    }

    // 🌐 Learning Hub
    public function learningHub(Request $request)
    {
        $search = $request->input('search');
        $bookId = $request->input('book');

        $categories = Category::with('books')->get();

        $book = null;

        if ($bookId) {
            $book = Book::find($bookId);
        } elseif ($search) {
            $book = Book::where('name', 'like', "%{$search}%")
                ->orWhere('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%")
                ->orWhereJsonContains('tags', $search)
                ->latest()
                ->first();
        }

        return view('learninghub', [
            'book' => $book,
            'categories' => $categories,
            'search' => $search,
            'message' => $book ? null : 'Open any book',
        ]);
    }

    // 🏠 Admin Dashboard
    public function dashboard()
    {
        $categories = Category::withCount('books')->get();

        return view('admin.home', compact('categories'));
    }
}