@extends('dashboard.partials.main')
@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <a class="btn btn-danger">Hapus User</a>
            <a href="/dashboard/users" class="btn btn-success">Kembali</a>
            
            <div class="card mt-3">
                <div class="card-header">
                    <h2>{{ $user->name }}'s Profile</h2>
                </div>
                <div class="card-body">
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Prodi:</strong> {{ $user->prodi }}</p>
                    <p><strong>Universitas:</strong> {{ $user->universitas }}</p>
                    <!-- ... dan seterusnya -->
                </div>
               
            </div>
            <br>
           <div class="d-flex">
            <div class="col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="/dashboard/users/{{$user->id}}/tasks">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Jumlah Data Tugas</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($data['tasks'])}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <a href="/dashboard/users/{{$user->id}}/mk">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Jumlah Data Mata Kuliah</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($data['matakuliah'])}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
           </div>
        </div>
    </div>
</div>
@endsection