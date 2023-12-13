@extends('client.partials.header')
@extends('client.partials.main')

@section('container')
    
   <style>
    #regis {
        z-index: 10;
    }
   </style>
<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
       
        <!-- Header-->
        <header class="">
            <div class="container px-5 pb-5">
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
                <div class="row gx-5 align-items-center">
                    <div class="col-xxl-5">
                        <!-- Header text content-->
                        <div class="text-center text-xxl-start">
                            <div class="badge bg-gradient-primary-to-secondary text-white mb-4"><div class="text-uppercase">Study &middot; College &middot; Management</div></div>
                            <div class="fs-3 fw-light text-muted">Hai, Selamat Datang Di Studo Assist, Website Yang Mempermudah Manajement Tugas Kuliahmu</div>
                            <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Studo Assist</span></h1>
                            @guest
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                <a class="btn bg-gradient-primary-to-secondary text-white btn-lg px-4 py-3 me-sm-3 fs-6 fw-bolder" href="/login">Login</a>
                                <a id="regis" class="btn btn-outline-dark btn-lg px-4 py-3 fs-6 fw-bolder" href="/register">Register</a>
                            </div>
                            @endguest
                        </div>
                    </div>
                    <div class="col-xxl-7">
                        <!-- Header profile picture-->
                        <div data-tilt class="tilt-part d-flex justify-content-center mt-5 mt-xxl-0">
                            <div class="profile bg-gradient-primary-to-secondary">
                                <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
                                <!-- Watch a tutorial on how to do this on YouTube (link)-->
                                <img class="profile-img" src="img/home.png" alt="..." />
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- About Section-->
        <section class="bg-light py-5">
            <div class="container px-5">
            
                <div class="row gx-5 justify-content-center">
                    <div class="col-xxl-8">
                        <div class="text-center my-5">
                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Tentang Kami</span></h2>
                            <img class="my-5" src="https://cdn.discordapp.com/attachments/1169305806651535505/1177530308753629195/logo_web_fix.png?ex=6572d78f&is=6560628f&hm=24de6691a5adcb9576079858dcb64cb43a355f05956da1c8d329dff294fac803&" width="350" height="350" alt="">
                            <p class="text-muted">StudoAssist merupakan platform bagi para mahasiswa dalam perjalanan pendidikan mereka. Dengan fokus pada kemudahan manajemen tugas, kami menyediakan platform intuitif yang memungkinkan pengguna untuk mengatur, melacak, dan menyelesaikan tugas mata kuliah dengan efisien. Dengan StudoAssist, pengalaman kuliah menjadi lebih terstruktur dan tanpa beban, memungkinkan mahasiswa fokus pada pembelajaran dan mencapai kesuksesan akademis secara optimal. Selamat ulang tahun pertama kami, dan terima kasih telah menjadi bagian dari perjalanan belajar Anda!</p>
                            <div class="d-flex my-3 justify-content-center fs-2 gap-4">
                                <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                                <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
                                <a class="text-gradient" href="#!"><i class="bi bi-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer-->
   
    <!-- Bootstrap core JS-->
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script type="text/javascript" src="js/tilt.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelector(".tilt-part"), {
            max: 25,
            speed: 400
        });
        
        //It also supports NodeList
        VanillaTilt.init(document.querySelectorAll(".tilt-part"));
    </script>
</body>

@endsection

@extends('client.partials.footer')