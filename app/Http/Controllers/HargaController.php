<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Harga;

class HargaController extends Controller
{
    public function index(){
        $daftar = Harga::query()
            ->orderBy('nama_courses')->paginate(10);
        return view('harga.index',compact('daftar'));
    }

    public function store(Request $request)
    {

        $daftar = new Harga();
        $daftar->jenis_bahasa = $request->bahasa;
        $daftar->nama_courses = $request->nama;
        $daftar->hargas = $request->harga;
        $daftar->save();

        return redirect()
            ->route('harga-course.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    public function update(Request $request, string $id)
    {
        Harga::where('id', $id)
            ->update([
                'jenis_bahasa' => $request->bahasa,
                'nama_courses' => $request->nama,
                'hargas' => $request->harga,
            ]);

        return redirect()->route('harga-course.index')
            ->with('success', 'Data berhasil diupdate!');
    }

    public function delete(string $id)
    {
        $daftar = Harga::findOrFail($id); 
        $daftar->delete(); 

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
