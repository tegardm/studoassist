@extends('dashboard.partials.main')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Data Seluruh Tugas Di Studo Assist</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomer</th>
                            <th>Judul Tugas</th>
                            <th>Deskripsi</th>
                            <th>Kode MK</th>
                            <th>Status</th>

                            <th>Tenggat Waktu</th>
                            <th>Modul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                     
                        @foreach ($data as $tugas)
                        <tr>
                            <td>{{$tugas->id}}</td>
                            <td>{{$tugas->title}}</td>
                            <td>{{$tugas->description}}</td>                           
                            <td>{{$tugas->matakuliah->title}}</td>
                            <td>
                                @if ($tugas->status == 'unfinished')
                                <span class="badge badge-danger">Not Yet</span>
                                @endif
                                @if ($tugas->status == 'proggress')
                                <span class="badge badge-warning">In Proggress</span>
                                @endif
                                @if ($tugas->status == 'done')
                                <span class="badge badge-success">Done</span>
                                @endif
                            </td>
                            <td>{{$tugas->deadline}}</td>

                            <td>
                                @if ($tugas->pdf_module_data)
                                <a href="/storage/pdf_modules/{{$tugas->pdf_module_data}}" target="_blank">Link PDF</a>
                                @else
                                  <p>-</p> 
                                @endif
                            </td>
                            <td>
                                <a href="/dashboard/users/{{$tugas->user->id}}/tasks/{{$tugas->title}}" class="badge badge-primary m-1 text-lg"><i class="bi bi-eye"></i></a>

                                <a onclick="return confirm('Apakah Anda Yakin ?')" href="/dashboard/users/{{$tugas->user->id}}/tasks/delete/{{$tugas->title}}" class="badge badge-danger m-1 text-lg"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                       
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    new DataTable('#dataTable');
</script>
@endsection

