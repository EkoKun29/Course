<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Harga;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    public function index(){
        $daftar = Cours::where('id_user', Auth::user()->id)->orderBy('id','desc')->paginate(10);
        $harga = Harga::all();
        // dd($harga);
        return view('course.index',compact('daftar','harga'));
    }

    public function create(){
        $harga = Harga::all();
        return view('course.create',compact('harga'));
    }

    public function store(Request $request)
    {

        $daftar = new Cours();
        $daftar->jenis_bahasa = $request->bahasa;
        $daftar->course = $request->course;
        $daftar->nama = Auth::user()->name;
        $daftar->harga = $request->harga;
        $daftar->kelas = $request->kelas;
        $daftar->id_user = Auth::user()->id;
        $daftar->save();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    public function edit(string $id){
        $daftar = Cours::findOrFail($id);
        $harga = Harga::all();
        return view('course.edit',compact('daftar','harga'));
    }

    public function update(Request $request, string $id)
    {

        Cours::where('id', $id)
            ->update([
                'jenis_bahasa' => $request->bahasa,
                'course' => $request->course,
                'harga' => $request->harga,
                'kelas' => $request->kelas,
            ]);

        return redirect()->route('courses.index')
            ->with('success', 'Data berhasil diupdate!');
    }

    public function delete(string $id)
    {
        $daftar = Cours::findOrFail($id); 
        $daftar->delete(); 

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
