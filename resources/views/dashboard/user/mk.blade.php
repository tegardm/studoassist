@extends('dashboard.partials.main')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">List Mata Kuliah {{$user->name}}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Data</th>
                            <th>Nama MK</th>
                            <th>Deskripsi</th>
                            <th>Kode MK (Unique)</th>
                            <th>Bobot SKS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($data as $mk)
                            <tr>
                                <td>{{$mk->id}}</td>
                            <td>{{$mk->title}}</td>
                            <td>{{$mk->description}}</td>
                            <td>{{$mk->course_code}}</td>
                            <td>{{$mk->sks}}</td>
                            <td>
                                
                                <a onclick="return confirm('Apakah Anda Yakin?')" class="badge badge-danger m-1 text-lg" 
                                href="{{ route('delete-mk2', ['id' => $mk->id]) }}" class="btn btn-danger">
                                <i class="bi bi-trash"></i></a>

                            </td>
                            </tr>
                        @endforeach

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

