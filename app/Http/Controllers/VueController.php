<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;

class VueController extends Controller
{
    public function index(){
        $daftar = Cours::where('course', 'Pemrograman Vue Js')->orderBy('id', 'desc')->paginate(10);
        return view('vue.index',compact('daftar'));
    }
}
