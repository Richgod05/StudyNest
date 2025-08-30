<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('user')->latest()->paginate(10);
        return view('nestdrop.index', compact('nestdrop'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'subject' => 'nullable|string|max:100',
        'level' => 'nullable|string|max:100',
        'tags' => 'nullable|string',
        'file' => 'required|file|max:10240|mimes:pdf,docx,jpg,png,mp3',
    ]);

    // Generate unique filename
    $filename = uniqid() . '_' . $request->file('file')->getClientOriginalName();

    // Store in public/materials
    $filePath = $request->file('file')->storeAs('materials', $filename, 'public');

    Material::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'description' => $request->description,
        'subject' => $request->subject,
        'level' => $request->level,
        'tags' => $request->tags,
        'file_path' => $filePath, 
    ]);

    return redirect()->route('materials.index')->with('success', 'Material uploaded successfully!');
    }


    public function like(Material $material)
    {
        $material->likes()->firstOrCreate(['user_id' => auth()->id()]);
        return back();
    }

    public function save(Material $material)
    {
        $material->saves()->firstOrCreate(['user_id' => auth()->id()]);
        return back();
    }

    public function report(Request $request, Material $material)
    {
        $material->reports()->create([
            'user_id' => auth()->id(),
            'reason' => $request->input('reason', 'No reason provided'),
        ]);
        return back()->with('message', 'Material reported. Thank you!');
    }
}