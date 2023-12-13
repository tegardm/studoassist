
<body class="bg-white">
    @include('client.partials.navbar')
    <div class="container">
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" >
        
                <!-- Topbar -->
               
                <!-- End of Topbar -->
                @yield('container')

                <!-- Begin Page Content -->
                
                <!-- /.container-fluid -->
        
            </div>
            <!-- End of Main Content -->
        
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Studo Assist 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>