@extends('dashboard.partials.main')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<div class="container-fluid">

    <!-- Page Heading -->
  
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
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Data Seluruh User Studo Assist</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Program Studi</th>
                            <th>Universitas</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($users as $user)
                        @if ($user->is_admin == 0)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->prodi}}</td>
                            <td>{{$user->universitas}}</td>
                            <td>{{$user->tanggal_lahir}}</td>
                            <td>
                                <a href="/dashboard/users/{{$user->id}}"><span class="badge m-1 badge-primary text-lg"><i class="bi bi-eye"></i></span>
                                </a>
                                <a onclick="return confirm('Apakah Anda Yakin Menghapus User ? Seluruh Tugas User Akan Ikut Terhapus')" 
                                href="/dashboard/users/delete/{{$user->id}}" 
                                class="badge m-1  badge-danger text-lg"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endif
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

