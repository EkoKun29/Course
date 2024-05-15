@extends('layouts.app')

@section('content')
<div class="row">
        <h2> Hai {{ Auth::user()->name}}, Selamat Datang DI Website Courses </h2>
</div>

@endsection