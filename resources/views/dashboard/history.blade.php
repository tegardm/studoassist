@extends('dashboard.partials.main')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<div class="container-fluid">

    <!-- Page Heading -->

  

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">History Aktivitas Data User</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Aksi</th>
                            <th>Tabel</th>
                            <th>User ID</th>
                            <th>Waktu Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                     
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->action}}</td>
                            <td>{{$item->table_name}}</td>
                            <td><a href="/dashboard/users/{{$item->user_id}}">View [{{$item->user_id}}] </a></td>
                            
                            <td>{{$item->action_time}}</td>
                            
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

