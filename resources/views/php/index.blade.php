@extends('layouts.app')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <x-alert />
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        PESERTA COURSE
                    </h2>
                </div>
                <!-- Page title actions -->
                
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter table-mobile-md card-table">
                            <thead>
                                <tr class="text-bold">
                                    <th>#</th>
                                    <th>Course</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Kelas</th>
                                    {{-- <th class="w-1">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftar as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td data-label="Name">
                                            <div class="d-flex py-1 align-items-center">
                                                <span class="avatar me-2"
                                                    style="background-image: url(./assets/static/avatars/010m.jpg)"></span>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">{{ $d->course }}</div>
                                            </div>
                                        </td>
                                       <td data-label="Name">
                                            <div class="text-muted"><a href="#"
                                                class="text-reset">{{ $d->nama }}</a></div>
                                            </div>
                                        </td>
                                        <td data-label="Name">
                                            <div class="text-muted"><a href="#"
                                                class="text-reset">{{ $d->harga }}</a></div>
                                            </div>
                                        </td>
                                        <td data-label="Name">
                                            <div class="text-muted"><a href="#"
                                                class="text-reset">{{ $d->kelas }}</a></div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex mt-3 justify-content-end">
                        {{ $daftar->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    
@endpush
