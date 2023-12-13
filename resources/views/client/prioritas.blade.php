@extends('client.partials.header')

@extends('client.partials.main')

@section('container')
    <div class="container-fluid">

        <!-- Page Heading -->
       


    </div>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <div class="card shadow mb-4">
        
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
            role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h3 class="h3 mb-2 text-gray-800">Anda Memiliki <span class="text-danger">{{count($data)}} Tugas</span> Yang Sudah Melewati Tenggat Waktu</h3>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card my-3 shadow mb-4">
        
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
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($data as $task)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$task->title}}</td>
                            <td>{{$task->description}}</td>                           
                            <td>{{$task->matakuliah->title}}</td>
                            <td>
                                @if ($task->status == 'unfinished')
                                <span class="badge badge-danger">Not Yet</span>
                                @endif
                                @if ($task->status == 'proggress')
                                <span class="badge badge-warning">In Proggress</span>
                                @endif
                                @if ($task->status == 'done')
                                <span class="badge badge-success">Done</span>
                                @endif
                            </td>
                            <td class="text-danger">
                                {{$task->deadline}}</td>
                            <td>
                                @if ($task->pdf_module_data)
                                <a href="/storage/pdf_modules/{{$task->pdf_module_data}}" target="_blank">Link PDF</a>
                                @else
                                  <p>-</p> 
                                @endif
                            </td>
                            <td>
                                <a href="/tasks/data/{{$task->id}}" class="badge badge-primary m-1 text-lg"><i class="bi bi-eye"></i></a>
                                <a href="/tasks/modify/{{$task->id}}" class="badge badge-warning m-1 text-lg"><i class="bi bi-hammer"></i></a>

                                <a onclick="confirm('Apakah Anda Yakin ?')" href="{{ route('delete-task', ['id' => $task->id]) }}" class="badge badge-danger m-1 text-lg"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @php
                        $i++;
                    @endphp
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
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });
        });
    </script>
  
@endsection

@extends('client.partials.footer')