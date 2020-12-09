
  <!--Footer-->
          <footer class="section-footer border-top">
            <div class="container-fluid">
                <section class="footer-top padding-y">
                    <div class="row">
                        <aside class="col-md-4">
                            <article class="mr-3">
                                <h1 class="display-4 text-primary">Factories Land</h1>
                                <p class="mt-3 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <div> <a class="btn btn-icon btn-light" title="Facebook" target="_blank" href="#" data-abc="true"><i class="fab fa-facebook-f"></i></a> <a class="btn btn-icon btn-light" title="Instagram" target="_blank" href="#" data-abc="true"><i class="fab fa-instagram"></i></a> <a class="btn btn-icon btn-light" title="Youtube" target="_blank" href="#" data-abc="true"><i class="fab fa-youtube"></i></a> <a class="btn btn-icon btn-light" title="Twitter" target="_blank" href="#" data-abc="true"><i class="fab fa-twitter"></i></a> </div>
                            </article>
                        </aside>
                        <aside class="col-sm-3 col-md-2">
                            <h6 class="title">About</h6>
                            <ul class="list-unstyled">
                                <li> <a href="#" data-abc="true">About us</a></li>
                                <li> <a href="#" data-abc="true">Services</a></li>
                                <li> <a href="#" data-abc="true">Terms & Condition</a></li>
                                <li> <a href="#" data-abc="true">Our Blogs</a></li>
                            </ul>
                        </aside>
                        <aside class="col-sm-3 col-md-2">
                            <h6 class="title">Services</h6>
                            <ul class="list-unstyled">
                                <li> <a href="#" data-abc="true">Help center</a></li>
                                <li> <a href="#" data-abc="true">Money refund</a></li>
                                <li> <a href="#" data-abc="true">Terms and Policy</a></li>
                                <li> <a href="#" data-abc="true">Open dispute</a></li>
                            </ul>
                        </aside>
                        <aside class="col-sm-3 col-md-2">
                            <h6 class="title">For users</h6>
                            <ul class="list-unstyled">
                                <li> <a href="#" data-abc="true"> User Login </a></li>
                                <li> <a href="#" data-abc="true"> User register </a></li>
                                <li> <a href="#" data-abc="true"> Account Setting </a></li>
                                <li> <a href="#" data-abc="true"> My Orders </a></li>
                            </ul>
                        </aside>
                        <aside class="col-sm-2 col-md-2">
                            <h6 class="title">Our app</h6> <a href="#" class="d-block mb-2" data-abc="true"><img class="img-responsive" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574317087/AAA/appstore.png" height="40"></a> <a href="#" class="d-block mb-2" data-abc="true"><img class="img-responsive" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574317110/AAA/playmarket.png" height="40"></a>
                        </aside>
                    </div>
                </section>
                <section class="footer-copyright border-top">
                  <div class="row justify-content-center">
                    <div class="col">
                      <p class="text-canter text-muted"> © 2019 factories All rights resetved </p>
                    </div>
                  </div>
                </section>
            </div>
        </footer>
  </footer>
  <!--/.Footer-->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('ui.logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="{{asset('ui/js/jquery.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('ui/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('ui/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('ui/js/mdb.min.js')}}"></script>
  <!-- Main JavaScript -->
  <script type="text/javascript" src="{{asset('ui/js/main.js')}}"></script>
  <!-- typed JavaScript -->
  <script type="text/javascript" src="{{asset('ui/js/typed.min.js')}}"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>