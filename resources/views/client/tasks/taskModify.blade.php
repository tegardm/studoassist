@extends('client.partials.header')
@extends('client.partials.main')

@section('container')
<style>
body{color: #000;overflow-x: hidden;height: 100%;
background-repeat: no-repeat;background-size: 100% 100%}
.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
</style>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3 class="text-gradient">Masukan Tugas Baru StudoAssist</h3>
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
            <div class="card">
                <form class="form-card" id="taskForm" action="{{ route('update-task', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-between text-left">
                        <div class="form-group flex-column d-flex">
                            <label class="form-control-label px-3">Masukkan Judul Tugas<span class="text-danger"> *</span></label>
                            <input type="text" value="{{$data->title}}" id="title" name="title" placeholder="Enter your first name" onblur="validate(1)">
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Deadline<span class="text-danger"> *</span></label>
                            <input disabled type="date" value="{{$data->deadline}}" id="deadline" name="deadline" placeholder="" onblur="validate(3)">
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Modul PDF (Optional)<span class="text-danger"> *</span></label>
                            <input type="file" value="/storage/pdf_modules/{{$data->pdf_module_data}}"  id="pdfModule" name="pdfModule" accept=".pdf" onchange="validate(4)">
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Mata Kuliah<span class="text-danger"> *</span></label>
                            <select value="{{$data->matakuliah->course_code}}" required id="course" class="p-2" name="course_id" onblur="validate(5)">
                             
                                @foreach ($matakuliah as $mk)
                                <option {{$mk->course_code == $data->matakuliah->course_code ? 'selected' : ''}} value="{{$mk->course_code}}">{{$mk->title}}</option>
                                @endforeach
                                <!-- Tambahkan opsi mata kuliah lain sesuai kebutuhan -->
                            </select>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Status<span class="text-danger"> *</span></label>
                            <select required id="status" class="p-2" name="status" onblur="validate(5)">
                             
                                <option value="unfinished">Belum Di Kerjakan</option>
                                <option value="proggress">Sedang Di Kerjakan</option>
                                <option value="done">Sudah Selesai</option>
                                <!-- Tambahkan opsi mata kuliah lain sesuai kebutuhan -->
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label class="form-control-label px-3">Deskripsi Tugas<span class="text-danger"> *</span></label>
                            <textarea id="description" name="description" placeholder="" onblur="validate(6)">{{$data->description}}</textarea>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6">
                            <button type="submit" class="bg-gradient-primary-to-secondary btn-block btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
@extends('client.partials.footer')
