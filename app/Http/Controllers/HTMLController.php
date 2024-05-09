<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;

class HTMLController extends Controller
{
    public function index(){
        $daftar = Cours::where('course', 'Pemrograman HTML 5')->orderBy('id', 'desc')->paginate(10);
        return view('html.index',compact('daftar'));
    }
}
