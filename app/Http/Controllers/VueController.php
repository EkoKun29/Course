<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;

class VueController extends Controller
{
    public function index(){
        $daftar = Cours::where('jenis_bahasa', 'https://img.icons8.com/color/48/vue-js.png')->orderBy('id', 'desc')->paginate(10);
        return view('vue.index',compact('daftar'));
    }
}
