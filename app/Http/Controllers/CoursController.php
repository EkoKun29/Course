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
        return view('course.index',compact('daftar','harga'));
    }

    public function create(){
        $harga = Harga::all();
        return view('course.create',compact('harga'));
    }

    public function store(Request $request)
    {

        $daftar = Cours::create([
            'course' => $request->course,
            'nama'   => Auth::user()->name,
            'harga'  => $request->harga,
            'kelas'  => $request->kelas,
            'id_user' => Auth::user()->id,
        ]);
        $daftar->save();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    public function update(Request $request, string $id)
    {

        Cours::where('id', $id)
            ->update([
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
    // public function destroy(string $id)
    // {
    //     Cours::find($id)->delete();

    //     // Return response
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data berhasil dihapus!',
    //     ]);
    // }
}
