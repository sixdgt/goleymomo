<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
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
<style>
    div.grid-view-item {
        display: flex !important;
        flex-direction: column !important;
        height: 100% !important;
        margin: 0 !important;  /* instead of margin: 0px auto 35px; */
    }
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }

    .grid-view-item__image-container {
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    /* .img {
        border: 1px solid white;
        border-radius: 25px;
        background: white;
    } */
    
    @media (max-width: 991px){
        div.grid-view-item {
            display: flex !important;
            flex-direction: column !important;
            height: 100% !important;
            margin: 0 !important; /* instead of margin: 0px auto 35px; */
        }
        
        .grid-view-item__image-container {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .carousel .card .card-body {
            min-height: 0px !important;
            margin: 0px !important;
        }
        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }

        h4, .h4 {
            font-size: 1rem !important;
            line-height: 1em !important;
        }

        .card .card-body, .card .card-footer {
            padding: 0.5rem 0rem !important;
        }

        .btn-sm {
            margin: auto !important;
        }
    }
        
</style>

<body class="landing-page sidebar-collapse">
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <img src="{{ asset('images/logo.png') }}" class="img" width="50" height="50">
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
                      <li>Current Location: @foreach ($locations as $value) {{ $value->location_name }} @endforeach</li>
                    </marquee>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                        <a href="{{ route('user.register') }}" class="nav-link">
                        <i class="material-icons">face</i> Register
                        </a>
                    </li>
                        <li class="nav-item">
                        <a href="{{ route('user.login') }}" class="nav-link">
                            <i class="material-icons">face</i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" target="_blank" data-placement="bottom" href="@if (isset($landings)) {{ $landings->youtube_link }} @endif" data-original-title="Follow us on Youtube" rel="nofollow">
                        <i class="fa fa-youtube"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" target="_blank" data-placement="bottom" href="@if (isset($landings)) {{ $landings->facebook_link }} @endif" target="_blank" data-original-title="Like us on Facebook" rel="nofollow">
                        <i class="fa fa-facebook-square"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" target="_blank" data-placement="bottom" href="@if (isset($landings)) {{ $landings->instagram_link }} @endif" target="_blank" data-original-title="Follow us on Instagram" rel="nofollow">
                        <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('@if($landings->background_image){{$landings->background_image}} @else ../assets/img/profile_city.jpg @endif')">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
            <h1 class="title">VISION</h1>
            <h4>@if (isset($landings)) {{ $landings->vision }} @endif</h4>
            <br>
            <a href="{{ route('user.login') }}" class="btn btn-danger btn-raised btn-lg">
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
                    <div class="col-md-12 ml-auto mr-auto">
                        <h2 class="title">Mission</h2>
                        <h5 class="description">@if (isset($landings)) {{ $landings->mission }} @endif</h5>
                    </div>
                </div>
                <div class="features">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Products</h4>
                            <!--Carousel Wrapper-->
                            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                                <!--Controls-->
                                <div class="controls-top">
                                    <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                                    <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                                </div>
                                <!--/.Controls-->

                                <!--Slides-->
                                <div class="carousel-inner" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            @if(isset($products)) 
                                                @php $counter = 1 @endphp
                                                @foreach($products as $product)
                                                    @while ($counter < 4)
                                                        <div class="col-4">
                                                            <div class="card mb-2 grid-view-item">
                                                                <img class="card-img-top" src="{{ $product->product_image }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">{{ $product->product_title }} </h4>
                                                                    <p class="card-text">{{ $product->product_description }}</p>
                                                                </div>
                                                                <div class="card-footer">
                                                                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm" style="color: white;">Order Now</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php $counter++ @endphp
                                                    @endwhile
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <!--/.First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                        @if(isset($products)) 
                                                @php $counter = 1 @endphp
                                                @foreach($products as $product)
                                                    @while ($counter < 4)
                                                        <div class="col-4">
                                                            <div class="card mb-2 grid-view-item">
                                                                <img class="card-img-top" src="{{ $product->product_image }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">{{ $product->product_title }} </h4>
                                                                    <p class="card-text">{{ $product->product_description }}</p>
                                                                </div>
                                                                <div class="card-footer">
                                                                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm" style="color: white;">Order Now</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php $counter++ @endphp
                                                    @endwhile
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <!--/.Second slide-->
                                </div>
                                <!--/.Slides-->
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
                                    <img src="{{ $landings->director_image }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid" width="200" height="200">
                                </div>
                                <h4 class="card-title">Goley Dai
                                    <br>
                                    <small class="card-description text-muted">Managing Director</small>
                                </h4>
                                <div class="card-body">
                                    <p class="card-description">@if (isset($landings)) {{ $landings->director_message }} @endif</p>
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
                <div id="multi-item-team" class="carousel slide carousel-multi-item" data-ride="carousel">

                    <!--Controls-->
                    <div class="controls-top">
                        <a class="btn-floating" href="#multi-item-team" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="btn-floating" href="#multi-item-team" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                    </div>
                    <!--/.Controls-->

                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">

                        <!--First slide-->
                        <div class="carousel-item active">
                            <div class="row">
                                @if(isset($users)) 
                                    @php $counter = 1 @endphp
                                    @foreach($users as $user)
                                        @while ($counter < 5)
                                            <div class="col-3 col-sm-3">
                                                <div class="card card-plain grid-view-item">
                                                    <img src="{{ $user->profile_img }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                                                    <div class="card-body">                                    
                                                        <h4 class="card-title">{{ $user->name }}
                                                            <br>
                                                            <small class="card-description text-muted">{{ $user->user_type }}</small>
                                                        </h4>
                                                        <p class="card-description">{{ $user->message }}</p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="{{ $user->instagram_url }}" class="btn btn-link btn-just-icon btn-sm" target="_blank"><i class="fa fa-instagram"></i></a>
                                                        <a href="{{ $user->facebook_url }}" class="btn btn-link btn-just-icon btn-sm" target="_blank"><i class="fa fa-facebook-square"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $counter++ @endphp
                                        @endwhile
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!--/.First slide-->

                        <!--Second slide-->
                        <div class="carousel-item">
                            <div class="row">
                                @if(isset($users)) 
                                    @php $counter = 1 @endphp
                                    @foreach($users as $user)
                                        @while ($counter < 5)
                                            <div class="col-3 col-sm-3">
                                                <div class="card card-plain grid-view-item">
                                                    <img src="{{ $user->profile_img }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                                                    <div class="card-body">                                    
                                                        <h4 class="card-title">{{ $user->name }}
                                                            <br>
                                                            <small class="card-description text-muted">{{ $user->user_type }}</small>
                                                        </h4>
                                                        <p class="card-description">{{ $user->message }}</p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="{{ $user->instagram_url }}" class="btn btn-link btn-just-icon btn-sm" target="_blank"><i class="fa fa-instagram"></i></a>
                                                        <a href="{{ $user->facebook_url }}" class="btn btn-link btn-just-icon btn-sm" target="_blank"><i class="fa fa-facebook-square"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $counter++ @endphp
                                        @endwhile
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!--/.Second slide-->
                    </div>
                    <!--/.Slides-->
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
                    <form class="contact-form" action="{{ route('subscribe') }}"  method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Your Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Your Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
                        <textarea type="text" name="message" class="form-control" rows="4" id="exampleMessage"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto text-center">
                        <button class="btn btn-primary btn-raised" type="submit">
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
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
</body>

</html>