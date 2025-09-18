<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class LetterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Letter::query();

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%');
        }

        $letters = $query->with('category')->orderBy('waktu_pengarsipan', 'desc')->paginate(5);

        return view('letters.index', compact('letters', 'search'));
    }

    public function create()
    {
        $categories = Category::orderBy('nama_kategori')->get();
        return view('letters.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required|unique:letters,nomor_surat',
            'category_id' => 'required|exists:categories,id',
            'judul' => 'required|string|max:255',
            'waktu_pengarsipan' => 'required|date',
            'file' => 'required|file|mimes:pdf|max:10240',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('file');
        $filePath = $file->storeAs('letters', $file->getClientOriginalName(), 'public');

        $letter = new Letter();
        $letter->nomor_surat = $request->input('nomor_surat');
        $letter->category_id = $request->input('category_id');
        $letter->judul = $request->input('judul');
        $letter->waktu_pengarsipan = $request->input('waktu_pengarsipan');
        $letter->file_path = $filePath;
        $letter->save();

        return redirect()->route('letters.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $letter = Letter::findOrFail($id);
        $categories = Category::orderBy('nama_kategori')->get();
        return view('letters.edit', compact('letter', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $letter = Letter::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required|unique:letters,nomor_surat,' . $letter->id,
            'category_id' => 'required|exists:categories,id',
            'judul' => 'required|string|max:255',
            'waktu_pengarsipan' => 'required|date',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $letter->nomor_surat = $request->input('nomor_surat');
        $letter->category_id = $request->input('category_id');
        $letter->judul = $request->input('judul');
        $letter->waktu_pengarsipan = $request->input('waktu_pengarsipan');

        if ($request->hasFile('file')) {
            // Delete old file
            if (Storage::exists($letter->file_path)) {
                Storage::delete($letter->file_path);
            }
            // Store new file
            $file = $request->file('file');
            $filePath = $file->storeAs('letters', $file->getClientOriginalName(), 'public');
            $letter->file_path = $filePath;
        }

        $letter->save();

        return redirect()->route('letters.show', $letter->id)->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $letter = Letter::findOrFail($id);

        if (Storage::exists($letter->file_path)) {
            Storage::delete($letter->file_path);
        }

        $letter->delete();

        return redirect()->route('letters.index')->with('success', 'Surat berhasil dihapus.');
    }

    public function download($id)
    {
        $letter = Letter::findOrFail($id);

        if (!Storage::disk('public')->exists($letter->file_path)) {
            abort(404, 'File not found.');
        }

        $filePath = storage_path('app/public/' . $letter->file_path);

        return response()->download($filePath, $letter->judul . '.pdf');
    }

    public function preview($id)
    {
        $letter = Letter::findOrFail($id);
        $filePath = Storage::disk('public')->path($letter->file_path);

        if (!file_exists($filePath)) {
            abort(404, 'File not found. The requested document may have been deleted or moved.');
        }

        return response()->file($filePath);
    }

    public function show($id)
    {
        $letter = Letter::with('category')->findOrFail($id);
        return view('letters.show', compact('letter'));
    }
}
