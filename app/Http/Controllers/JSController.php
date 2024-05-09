<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;

class JSController extends Controller
{
    public function index(){
        $daftar = Cours::where('jenis_bahasa', 'https://img.icons8.com/color/48/javascript--v1.png')->orderBy('id', 'desc')->paginate(10);
        return view('js.index',compact('daftar'));
    }
}
