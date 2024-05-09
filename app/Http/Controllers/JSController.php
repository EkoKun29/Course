<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;

class JSController extends Controller
{
    public function index(){
        $daftar = Cours::where('course', 'Pemrograman JavaScript')->orderBy('id', 'desc')->paginate(10);
        return view('js.index',compact('daftar'));
    }
}
