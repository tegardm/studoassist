@extends('client.partials.header')

@extends('client.partials.main')

@section('container')
    <style>
        
        img {
            transition: .5s ease-in-out;
        }
        img:hover {
            transform: scale(1.2);
            transform: rotate(15deg);
        }
    </style>
    <div class="container-fluid ">
        <div >
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Team Studo Assist</div>
                    <h1 class="mb-4 text-gradient">Pihak Yang Bekerja Dalam Project Studo Assist</h1>
                    <p class="mb-4">Kami tim StudioAsisst terdiri dari 3 orang yaitu, Tegar Deyustian sebagai Project Leader. Kemudian Ada Front end developer yang diambil oleh Sabian Resatya. Dan yang terakhir yaitu BackEnd Developer yang di manage oleh Rinaldi Afgan</p>
                    <a class="btn btn-primary bg-gradient-primary-to-secondary rounded-pill px-4" href="/">Read More</a>
                </div>
                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" 
                                        src="https://cdn.discordapp.com/attachments/1169305806651535505/1176893238670528593/fotoSaya1.jpg?ex=6570863d&is=655e113d&hm=e43235b949cdda67ea8cb70bc2133b3c4b79cb36632fadab1902d83d1e407291&" alt="">
                                        <h5 class=" text-gradient mb-0"><a href="https://www.instagram.com/tegar_deyustian/">Tegar Deyustian</a></h5>
                                        <small>Project Leader & Fullstack Developer</small>
                                        
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" src="https://cdn.discordapp.com/attachments/1169305806651535505/1179741885464584323/Aldi.jpg?ex=657ae340&is=65686e40&hm=85e0c6d91d511ebb0183e97555875c80f191ec759983ff5aa73920e034174a08&" alt="">
                                        <h5 class=" text-gradient mb-0"><a href="https://www.instagram.com/m.rinaldi_afgan/">Rinaldi Afgan</a></h5>
                                        <small>Back-End Developer</small>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pt-md-4">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" 
                                        src="https://cdn.discordapp.com/attachments/1169305806651535505/1179741885238087690/Sabian2_2.jpg?ex=657ae33f&is=65686e3f&hm=72b49cfe1dc618c799af19482c58c0cf7a5a387b39e08c4770fa3e39ef982507&" alt="">
                                        <h5 class=" text-gradient mb-0"><a href="https://www.instagram.com/busdrifter/">Sabian Resatya</a></h5>
                                        <small>Front-End Developer</small>
                                        
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->




 
    <!-- JavaScript Libraries -->
    

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
@endsection

@extends('client.partials.footer')