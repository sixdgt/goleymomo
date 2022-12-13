<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    GOLEY MOMO
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/material-kit.css?v=2.0.7') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="landing-page sidebar-collapse">
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="#">GOLEY MOMO </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <marquee>
                      <li>Current Location: Melbourne, Sydney, Hobart</li>
                    </marquee>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                        <a href="{{ route('marketing.register') }}" class="nav-link" target="_blank">
                        <i class="material-icons">face</i> Join as Marketing
                        </a>
                    </li>
                        <li class="nav-item">
                        <a href="{{ route('user.login') }}" class="nav-link" target="_blank">
                            <i class="material-icons">face</i>Become a Partner
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Follow us on Twitter" rel="nofollow">
                        <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Like us on Facebook" rel="nofollow">
                        <i class="fa fa-facebook-square"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Follow us on Instagram" rel="nofollow">
                        <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/profile_city.jpg')">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
            <h1 class="title">VISION</h1>
            <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, a iure, repellendus voluptas eaque cupiditate consequuntur praesentium necessitatibus reprehenderit adipisci error saepe dolorem modi quis. Totam et suscipit voluptatum alias!</h4>
            <br>
            <a href="#" class="btn btn-danger btn-raised btn-lg">
                <i class="fa fa-play"></i> Get Started
            </a>
            </div>
        </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="title">Mission</h2>
                    <h5 class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque dolor magni commodi in praesentium, ea soluta rerum non id. In molestias aliquid soluta culpa eligendi quaerat consequatur, fuga reiciendis recusandae.</h5>
                </div>
                </div>
                <div class="features">
                <div class="row">
                    <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-info">
                        <i class="material-icons">chat</i>
                        </div>
                        <h4 class="info-title">Prompt Response</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam optio at alias fugit corrupti! Perferendis reprehenderit commodi labore nam aspernatur facilis quis corporis cumque maxime, similique distinctio dolorum quas!</p>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-success">
                        <i class="material-icons">verified_user</i>
                        </div>
                        <h4 class="info-title">Genuine Products</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam optio at alias fugit corrupti! Perferendis reprehenderit commodi labore nam aspernatur facilis quis corporis cumque maxime, similique distinctio dolorum quas!</p>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-danger">
                        <i class="material-icons">face</i>
                        </div>
                        <h4 class="info-title">Healthy Relation</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam optio at alias fugit corrupti! Perferendis reprehenderit commodi labore nam aspernatur facilis quis corporis cumque maxime, similique distinctio dolorum quas!</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Message from the Director</h2>
            <div class="team">
                <div class="row">
                    <div class="col-md-12">
                        <div class="team-player">
                            <div class="card card-plain">
                                <div class="col-md-6 ml-auto mr-auto">
                                    <img src="../assets/img/faces/avatar.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid" width="200" height="200">
                                </div>
                                <h4 class="card-title">Goley Dai
                                    <br>
                                    <small class="card-description text-muted">Managing Director</small>
                                </h4>
                                <div class="card-body">
                                    <p class="card-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias iste amet enim iure accusamus sit aliquam, ullam quaerat, possimus laboriosam esse ratione fuga quas debitis beatae culpa. Non, culpa ea!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Our Team</h2>
                <div class="team">
                <div class="row">
                    <div class="col-md-4">
                    <div class="team-player">
                        <div class="card card-plain">
                        <div class="col-md-6 ml-auto mr-auto">
                            <img src="../assets/img/faces/avatar.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                        </div>
                        <h4 class="card-title">Goley Dai
                            <br>
                            <small class="card-description text-muted">Managing Director</small>
                        </h4>
                        <div class="card-body">
                            <p class="card-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias iste amet enim iure accusamus sit aliquam, ullam quaerat, possimus laboriosam esse ratione fuga quas debitis beatae culpa. Non, culpa ea!</p>
                        </div>
                        <div class="card-footer justify-content-center">
                            <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                            <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="team-player">
                        <div class="card card-plain">
                        <div class="col-md-6 ml-auto mr-auto">
                            <img src="../assets/img/faces/christian.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                        </div>
                        <h4 class="card-title">Goley Dai
                            <br>
                            <small class="card-description text-muted">Designer</small>
                        </h4>
                        <div class="card-body">
                            <p class="card-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias iste amet enim iure accusamus sit aliquam, ullam quaerat, possimus laboriosam esse ratione fuga quas debitis beatae culpa. Non, culpa ea!</p>
                        </div>
                        <div class="card-footer justify-content-center">
                            <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-linkedin"></i></a>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="team-player">
                        <div class="card card-plain">
                        <div class="col-md-6 ml-auto mr-auto">
                            <img src="../assets/img/faces/kendall.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                        </div>
                        <h4 class="card-title">Goley Dai
                            <br>
                            <small class="card-description text-muted">CEO</small>
                        </h4>
                        <div class="card-body">
                            <p class="card-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias iste amet enim iure accusamus sit aliquam, ullam quaerat, possimus laboriosam esse ratione fuga quas debitis beatae culpa. Non, culpa ea!</p>
                        </div>
                        <div class="card-footer justify-content-center">
                            <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                            <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="container">
        
            <div class="section section-contacts">
                <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center title">Contact US</h2>
                    <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                    <form class="contact-form">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Your Name</label>
                            <input type="email" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Your Email</label>
                            <input type="email" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
                        <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto text-center">
                        <button class="btn btn-primary btn-raised">
                            Send Message
                        </button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
    </div>
    
    <hr>
    <footer class="footer footer-default">
        <div class="container">
            <nav class="float-left">
                <ul>
                    <li><a href="#">GOLEY MOMO</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Licenses</a></li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy;<script>document.write(new Date().getFullYear())</script> GOLEY MOMO | Designed by Sandesh Tamang
            </div>
        </div>
    </footer>

  <!--   Core JS Files   -->
  
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
</body>

</html>