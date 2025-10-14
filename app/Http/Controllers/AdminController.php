<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class AdminController extends Controller
{
            public function index(Request $request) {
                $search = $request->input('search');
                $books = Book::with('category')
                    ->when($search, function ($query, $search) {
                        $query->where('name', 'like', "%$search%")
                            ->orWhere('author', 'like', "%$search%")
                            ->orWhereJsonContains('tags', $search);
                    })
                    ->latest()->get();

                $categories = Category::with('books')->get();
                return view('admin.index', compact('books', 'categories', 'search'));
            }

            public function storeCategory(Request $request) {
                $request->validate(['name' => 'required']);
                Category::create($request->only('name'));
                return back()->with('success', 'Category added');
            }

            public function storeBook(Request $request) {
                $request->validate([
                    'name' => 'required',
                    'title' => 'nullable|string',
                    'author' => 'nullable|string',
                    'description' => 'required|string',
                    'tags' => 'nullable|string',
                    'file' => 'required|mimes:pdf,doc,docx',
                    'category_id' => 'required'
                ]);

                $path = $request->file('file')->store('books', 'public'); // ✅ stored in public/books

                Book::create([
                    'name' => $request->name,
                    'title' => $request->title,
                    'author' => $request->author,
                    'description' => $request->description,
                    'tags' => explode(',', $request->tags),
                    'file_path' => $path,
                    'category_id' => $request->category_id
                ]);

                return back()->with('success', 'Book uploaded successfully');
            } 
}
