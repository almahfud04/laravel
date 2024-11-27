<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    // Menampilkan daftar siswa dengan fitur pencarian
    public function index(Request $request)
    {
        $query = Siswa::query();

        // Jika ada parameter pencarian, filter data siswa
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $siswa = $query->get(); // Mengambil data siswa berdasarkan pencarian
        return view('dashboard', compact('siswa'));
    }

    // Menampilkan form untuk menambah siswa
    public function create()
    {
        return view('siswa.create'); // Mengarahkan ke halaman form tambah siswa
    }

    // Menyimpan data siswa baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'umur' => 'required|integer|min:1',
            'alamat' => 'nullable|string|max:255',
            'email' => 'required|email|unique:siswas,email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048' // Validasi untuk foto
        ]);

    
        if ($request->hasFile('foto')) {
            
            $fotoPath = $request->file('foto')->store('public/images');
            $validated['foto'] = basename($fotoPath);
        }

        Siswa::create($validated);

        return redirect()->route('dashboard')->with('success', 'Siswa berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit data siswa
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    // Mengupdate data siswa
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'umur' => 'required|integer|min:1',
            'alamat' => 'nullable|string|max:255',
            'email' => 'required|email|unique:siswas,email,' . $id,
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048' 
        ]);

        $siswa = Siswa::findOrFail($id);

        // Jika ada file foto baru yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($siswa->foto) {
                Storage::delete('public/fotos/' . $siswa->foto);
            }

            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('public/images');
            $validated['foto'] = basename($fotoPath);
        }

        $siswa->update($validated);

        return redirect()->route('dashboard')->with('success', 'Siswa berhasil diperbarui');
    }

    // Menghapus data siswa
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        
        // Hapus foto jika ada
        if ($siswa->foto) {
            Storage::delete('public/images/' . $siswa->foto);
        }

        $siswa->delete();

        return redirect()->route('dashboard')->with('success', 'Siswa berhasil dihapus');
    }
}
