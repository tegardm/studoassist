@extends('client.partials.header')
@extends('client.partials.main')

@section('container')
    


<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akun Studo Assist Anda !</h1>
                        </div>
                        <form class="user" method="post" action="/register">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input autocomplete="off" required type="text" class="form-control form-control-user" id="name" name="name"
                                        placeholder="Masukan Nama Lengkap Anda">
                                </div>
                                <div class="col-sm-6">
                                    <input autocomplete="off" required type="email" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Masukan Email Anda">
                                </div>
                            </div>
                            <div class="form-group">
                                <input autocomplete="off" required type="text" class="form-control form-control-user" id="prodi" name="prodi"
                                    placeholder="Masukan Program Studi Anda">
                            </div>
                            <div class="form-group">
                                <input autocomplete="off" required type="text" class="form-control form-control-user" id="universitas" name="universitas"
                                    placeholder="Masukan Universitas Anda">
                            </div>
                            <div class="form-group">
                                <input autocomplete="off" required type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input autocomplete="off" required type="password" class="form-control form-control-user" name="password"
                                        id="password" placeholder="Masukan Password Anda">
                                </div>
                                <div class="col-sm-6">
                                    <input autocomplete="off" required type="password" class="form-control form-control-user"  name="password_confirmation"
                                        id="repeatPassword" placeholder="Ulangi Password Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                          
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="/forget">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="/login">Sudah Punya Akun ? Silahkan Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
@endsection

@extends('client.partials.footer')