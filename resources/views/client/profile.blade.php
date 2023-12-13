@extends('client.partials.header')
@extends('client.partials.main')

@section('container')
    <!-- resources/views/user/settings.blade.php -->
    <div class="col-xl-10 mx-auto col-lg-12 col-md-9">
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
        <div class="card o-hidden border-0 shadow-lg my-5">
        
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
               
                    <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="width: 30%;">Nama</th>
                                            <td>{{auth()->user()->name}}</td>
                                        </tr>
                                        
                                            <th scope="row">Tanggal Lahir</th>
                                            <td>{{auth()->user()->tanggal_lahir}}</td>                                        </tr>
                                        <tr>
                                            <th scope="row">Program Studi</th>
                                            <td>{{auth()->user()->prodi}}</td>                                        </tr>
                                        <tr>
                                            <th scope="row">Universitas</th>
                                            <td>{{auth()->user()->universitas}}</td>                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <hr>
                            </div>
                            <h6 class="h6 text-gray-900 mb-2">Form Ganti Password</h6>
                            <form action="{{route('change-password')}}" method="POST" class="user">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        placeholder="Masukan Email...">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="old_password" class="form-control form-control-user"
                                        placeholder="Masukan Password Lama...">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        placeholder="Masukan Password Baru...">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control form-control-user"
                                        placeholder="Ulangi Password Baru...">
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Ganti Password
                                </button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

@extends('client.partials.footer')