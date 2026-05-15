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
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('title', 'like', "%{$search}%")
                      ->orWhere('author', 'like', "%{$search}%")
                      ->orWhereJsonContains('tags', $search);
            })
            ->latest()
            ->get();

        $categories = Category::all();

        return view('admin.uploadbook', compact(
            'books',
            'categories',
            'search'
        ));
    }

    // 🗂️ Category Upload Page
    public function showCategoryUpload()
    {
        $categories = Category::withCount('books')
            ->latest()
            ->get();

        return view('admin.addcategory', compact('categories'));
    }

    // 🧾 Store Category
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return back()->with(
            'success',
            'Category added successfully'
        );
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
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf|max:20480'
        ]);

        $filePath = null;

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store(
                'books',
                'public'
            );
        }

        Book::create([
            'name' => $request->name,
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'tags' => $request->tags
                ? array_map('trim', explode(',', $request->tags))
                : [],
            'category_id' => $request->category_id,
            'file' => $filePath
        ]);

        return back()->with(
            'success',
            'Book uploaded successfully'
        );
    }

    // 📖 Show Single Book
    public function show(Book $book, Request $request)
    {
        $query = $request->input('q');

        $categories = Category::with('books')->get();

        return view('show', compact(
            'book',
            'categories',
            'query'
        ));
    }

    // 🌐 Learning Hub
    public function learningHub(Request $request)
    {
        $search = $request->input('search');
        $bookId = $request->input('book');

        $categories = Category::with('books')->get();

        $book = null;

        if ($bookId) {
            $book = Book::when($search, function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%")
                          ->orWhere('title', 'like', "%{$search}%")
                          ->orWhere('author', 'like', "%{$search}%")
                          ->orWhereJsonContains('tags', $search);
                })
                ->find($bookId);
        }

        return view('learninghub', [
            'book' => $book,
            'categories' => $categories
        ]);
    }

    // 🏠 Admin Dashboard
    public function dashboard()
    {
        $categories = Category::withCount('books')->get();

        return view('admin.home', compact('categories'));
    }
}