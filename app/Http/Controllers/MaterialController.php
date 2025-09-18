<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('user')->latest()->paginate(10);
        return view('nestdrop', compact('materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'subject'     => 'nullable|string|max:100',
            'level'       => 'nullable|string|max:100',
            'tags'        => 'nullable|string',
            'file'        => 'required|file|max:10240|mimes:pdf,docx,jpg,jpeg,png,mp3',
            'audio_file'  => 'nullable|string', // base64 audio from recorder
        ]);

        // Store main file
        $filename = uniqid() . '_' . $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('materials', $filename, 'public');

        // Handle optional audio recording
        $audioPath = null;
        if ($request->filled('audio_file')) {
            $audioData = $request->input('audio_file');

            // Remove base64 prefix if present
            if (strpos($audioData, 'base64,') !== false) {
                $audioData = explode('base64,', $audioData)[1];
            }

            $audioBinary = base64_decode($audioData);
            $audioFilename = uniqid() . '_explanation.mp3';
            Storage::disk('public')->put('materials/audio/' . $audioFilename, $audioBinary);
            $audioPath = 'materials/audio/' . $audioFilename;
        }

        // Save to DB
        Material::create([
            'user_id'       => auth()->id(),
            'title'         => $request->title,
            'description'   => $request->description,
            'subject'       => $request->subject,
            'level'         => $request->level,
            'tags'          => $request->tags,
            'file_path'     => $filePath,
            'audio_path'    => $audioPath, // new column in DB
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
            'reason'  => $request->input('reason', 'No reason provided'),
        ]);
        return back()->with('message', 'Material reported. Thank you!');
    }
}