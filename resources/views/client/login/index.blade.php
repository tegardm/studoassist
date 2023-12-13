@extends('client.partials.header')
@extends('client.partials.main')

        <!-- Outer Row -->
@section('container')
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">
        @if (session()->has('success'))
            <div class="alert alert-success">
               <ul>
                <li> {{session('success')[0]}}</li>
                <li>Harap Simpan Token Ini <strong>{{session('success')[1]}}</strong> Agar Bisa Melakukan Recovery
                </li>
               </ul>
            
            </div>
        @endif

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Selamat Datang Di StudoAssist!</h1>
                            </div>
                            <form class="user" method="post" action="/login">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        id="email" aria-describedby="emailHelp"
                                        placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                 
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                             
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/forget">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/register">Buat Akun Anda!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

 

@extends('client.partials.footer')
