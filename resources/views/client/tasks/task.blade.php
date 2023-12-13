@extends('client.partials.header')
@extends('client.partials.main')

@section('container')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-10  mx-auto offset-md-3">
            <a href="{{ route('delete-task', ['id' => $task->id]) }}" class="btn btn-danger">Hapus Task</a>
            <a href="/tasks" class="btn btn-success">Kembali</a>

            <div class="card mt-3">
                <div class="card-header">
                    <h2>Detail Tugas {{$task->course}}</h2>
                </div>
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
@extends('client.partials.footer')
