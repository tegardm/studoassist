@extends('client.partials.header')
@extends('client.partials.main')

@section('container')
<style>
    body {
        color: #000;
        overflow-x: hidden;
        height: 100%;
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    .card {
        padding: 30px 40px;
        margin-top: 60px;
        margin-bottom: 60px;
        border: none !important;
        box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2);
    }

    .blue-text {
        color: #00BCD4;
    }

    .form-control-label {
        margin-bottom: 0;
    }

    input,
    textarea,
    button {
        padding: 8px 15px;
        border-radius: 5px !important;
        margin: 5px 0px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        font-size: 18px !important;
        font-weight: 300;
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #00BCD4;
        outline-width: 0;
        font-weight: 400;
    }

    .btn-block {
        text-transform: uppercase;
        font-size: 15px !important;
        font-weight: 400;
        height: 43px;
        cursor: pointer;
    }

    .btn-block:hover {
        color: #fff !important;
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0;
    }
</style>
    <h3  class="text-center text-gradient">Masukan Data Mata Kuliah Baru</h3>

<div class="card">

    <form class="form-card" id="courseForm" action="{{ route('update-mk', ['course_code' => $data->course_code]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row justify-content-between text-left">
            <div class="form-group flex-column d-flex">
                <label class="form-control-label px-3">Judul Mata Kuliah<span class="text-danger"> *</span></label>
                <input required value="{{$data->title}}" type="text" id="title" name="title" placeholder="Enter course title" onblur="validate(1)">
            </div>
        </div>
        <div class="row justify-content-between text-left">
            <div class="form-group col-sm-6 flex-column d-flex">
                <label class="form-control-label px-3">Kode Mata Kuliah<span class="text-danger"> *</span></label>
                <input disabled value="{{$data->course_code}}" required type="text" id="course_code" name="course_code" placeholder="Enter course code" onblur="validate(3)">
            </div>
            <div class="form-group col-sm-6 flex-column d-flex">
                <label class="form-control-label px-3">Bobot SKS<span class="text-danger"> *</span></label>
                <input required value="{{$data->sks}}" type="number" id="sks" name="sks" placeholder="Enter SKS" onblur="validate(4)">
            </div>
        </div>
        <div class="row justify-content-between text-left">
            <div class="form-group col-12 flex-column d-flex">
                <label class="form-control-label px-3">Deskripsi Mata Kuliah<span class="text-danger"> *</span></label>
                <textarea required id="description" name="description" placeholder="Enter course description" onblur="validate(6)">{{$data->description}}</textarea>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="form-group col-sm-6">
                
                <button type="submit" class="bg-gradient-primary-to-secondary btn-block btn-primary">UBAH DATA</button>
            </div>
        </div>
    </form>

</div>
@endsection
@extends('client.partials.footer')
