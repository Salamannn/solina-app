<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Menampilkan daftar semua portofolio
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function Project(){
        $projects = Portfolio::all();
        return view('guest.project',compact('projects'));
    }

    // Menampilkan form untuk membuat portofolio baru
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'client' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Simpan portofolio
        $portfolio = Portfolio::create([
            'client' => $request->client,
            'project_date' =>$request->project_date,
            'project_name' => $request->project_name,
            'description' => $request->description,
        ]);

        // Cek jika ada gambar yang diupload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Buat path penyimpanan
                $path = $image->store('images', 'public');

                // Simpan informasi gambar ke database
                $portfolio->images()->create([
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('portfolios.index')->with('success', 'Portofolio berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    // Menampilkan detail portofolio tertentu
    public function show($id)
    {
        // Ambil data portfolio berdasarkan ID
        $project = Portfolio::findOrFail($id);

        // Tampilkan halaman detail portfolio dengan data tersebut
        return view('guest.project-details', compact('project'));
    }

    // Menampilkan form untuk mengedit portofolio
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'client' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update portofolio
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update([
            'client' => $request->client,
            'project_date' =>$request->project_date,
            'project_name' => $request->project_name,
            'description' => $request->description,
        ]);

        // Cek jika ada gambar baru yang diupload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Simpan gambar baru
                $path = $image->store('images', 'public');

                // Simpan informasi gambar baru ke database
                $portfolio->images()->create([
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('portfolios.index')->with('success', 'Portofolio berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    // Menghapus portofolio
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->back()->with('success', 'Portofolio berhasil dihapus!');
    }

    
}
