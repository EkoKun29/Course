<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;

class PHPController extends Controller
{
    public function index(){
        $daftar = Cours::where('course', 'Pemrograman PHP')->orderBy('id', 'desc')->paginate(10);
        return view('php.index',compact('daftar'));
    }
}
