@extends('dashboard.partials.main')
@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <a  href="/dashboard/users/{{$user->id}}/tasks/" class="btn btn-primary">Kembali</a>
            <a onclick="confirm('Apakah Anda Yakin ?')" href="/dashboard/users/{{$user->id}}/tasks/delete/{{$task->title}}" class="btn btn-danger">Hapus</a>
            
            <div class="card mt-3">
             
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 30%;">Judul Tugas</th>
                                <td>{{$task->title}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Deskripsi</th>
                                <td>{{$task->description}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Mata Kuliah</th>
                                <td>{{$task->matakuliah->title}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
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
                            </tr>
                            <tr>
                                <th scope="row">SKS</th>
                                <td>{{$task->matakuliah->sks}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tenggat Waktu</th>
                                <td>{{$task->deadline}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Attachment</th>
                                <td><a href="{{ asset('storage/pdf_modules/' . $task->pdf_module_data) }}">{{$task->pdf_module_name}}</a></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- ... dan seterusnya -->
                </div>
               
            </div>
            <br>
          
        </div>
    </div>
</div>
@endsection