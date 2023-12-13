@extends('client.partials.header')
@extends('client.partials.main')

@section('container')
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>


        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Lupa Password Anda?</h1>
                                        <p class="mb-4">Jika anda lupa password akun Studo Assist anda Silahkan
                                            mengisi form dibawah ini untuk melakukan recovery akun
                                        </p>
                                    </div>
                                    <form class="user" method="POST" action="{{route('recovery-password')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="tanggal_lahir"><small>Masukan Tanggal Lahir Anda</small></label>
                                            <input type="date" name="tanggal_lahir" class="form-control form-control-user">
                                                 
                                                
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" 
                                                placeholder="Masukan Email...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="token" class="form-control form-control-user" 
                                                placeholder="Masukan Token Recovery...">
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
                                            Reset Password
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/register">Buat Akun Anda!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/login">Sudah Punya Akun ? Silahkan Login !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

   

</html>
@endsection
@extends('client.partials.footer') 