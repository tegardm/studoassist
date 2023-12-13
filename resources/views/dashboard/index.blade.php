@extends('dashboard.partials.main')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Back To Home Page</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Data User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($data['users'])}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Data Tugas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($data['tasks'])}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Mata Kuliah
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{count($data['matakuliah'])}}</div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>   
        <!-- Pending Requests Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h5>Terdapat <span class="text-danger">{{count($late_tasks)}} Tugas</span> Terlambat Dari <span class="text-success">{{count($data['tasks'])}} Tugas</span> Yang Ada</h5>
            </a>
            <!-- Card Content - Collapse -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

            <div class="collapse show" id="collapseCardExample">
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
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($late_tasks as $task)
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
    </div>

    <!-- Content Row -->
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
    

    <!-- Content Row -->
   

</div>
@endsection