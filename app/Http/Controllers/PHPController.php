<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;

class PHPController extends Controller
{
    public function index(){
        $daftar = Cours::where('jenis_bahasa', 'https://img.icons8.com/dusk/64/php-logo.png')->orderBy('id', 'desc')->paginate(10);
        return view('php.index',compact('daftar'));
    }
}
