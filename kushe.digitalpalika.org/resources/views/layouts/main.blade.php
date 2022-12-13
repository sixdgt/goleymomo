<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <title>@yield('title')</title>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- datatable --}}
{{--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    {{-- datatable --}}


    {{-- boostrapv5.1 --}}

{{--        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}
{{--        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">--}}
    {{-- boostrapv5.1 --}}

    {{--Incon cdn link --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/font-awesome-line-awesome/css/all.min.css" integrity="sha512-dC0G5HMA6hLr/E1TM623RN6qK+sL8sz5vB+Uc68J7cBon68bMfKcvbkg6OqlfGHo1nMmcCxO5AinnRTDhWbWsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>--}}
    {{--Incon cdn link --}}

    {{-- Fontawesome 5.10 CDN --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    {{-- Fontawesome 5.10 CDN --}}
    {{-- w3 tabs --}}
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    {{-- w3 tabs --}}

    {{-- custom css  --}}
        @yield('custom-css')
        <link rel="stylesheet" href="{{ asset('css/dg_pis.css') }}">
        <link rel="stylesheet" href="{{ asset('css/media.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/gov_paper.css')}}">
        <link rel="stylesheet" href="{{ asset('css/gn_details.css') }}">
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    {{-- custom css  --}}

    <!-- Nepali Datepicker -->
        <link href="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v3.7.min.css" rel="stylesheet" type="text/css"/>
    <!-- Nepali Datepicker -->
        <link rel="stylesheet" type="text/css" href="{{url('css/date1.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('plugins/sweetalter2/sweetalert2.css')}}">

{{--    filepond--}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />


    <style>


        /** {*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*    -moz-box-sizing: border-box;*/
        /*    -webkit-box-sizing: border-box;*/
        /*    box-sizing: border-box;*/
        /*    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;*/
        /*    font-size: 12px;*/
        /*}*/

        /*body {*/
        /*    scrollbar-width: 2px;*/
        /*}*/





    </style>
</head>

<body>


    {{-- new navbar --}}
    <div class="">
        <div class="" style="position:sticky;">
            <nav class="navbar navbar-expand">
                <!-- demo -->
                <div class="sidebar-btn">

                    <a role="button" id="btn_sidebar" data-bs-toggle="collapse" href=".collapse-Menu" aria-expanded="false" aria-controls="side-bar content-bar">

                        <i class="fas fa-bars"></i>
                    </a>
                </div>
                <!-- demo  -->
                <!-- toggle  -->
                <!-- logo  -->
                <div id="logo">
                    <a href="{{ route('home') }}" class="navbar-brand navbar-toggle">

                        <img src="{{ asset('image/digital_palika.png')}}"height="40px" width="40px" alt="">

                        <span class="heading"> डिजिटल पालिका</span>
                    </a>
                </div>
                <!-- logo  -->
                <!-- Collection of nav links, forms, and other content for toggling -->
                <div id="navbarCollapse" class="navbar-collapse">

                    <div class="navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>

                                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @else
                                <li class="nav-item">
                                    <div class="icon notification-click" data-box="search_box"> <i class="las la-search"></i> </div>

                                    <div class="notifications" id="search_box" data-down="0" hidden>

                                        <form class="navbar-form" id="searchBox">
                                            <div class="input-group search-box">

                                                <input type="text" id="search" class="form-control" placeholder="खोज्नुहोस्" autocomplete="off">

                                                <span class="input-group-addon"><i class="las la-search"></i></span>
                                            </div>
                                        </form>
                                    </div>
                                </li>

                                <li class="nav-item ">
                                    <div class="icon notification-click d-flex" data-box="notification_box">
                                        <i class="fa fa-bell"></i>
                                        <div class="position-absolute" id="count" style="margin:-9px 20px;">0</div>
                                    </div>
                                    {{-- <label class="position-absolute">1</label> --}}
                                    <div class="notifications" id="notification_box" style=" box-shadow: 0px 2px 6px 0px rgba(0,0,0,0.79);
                                                                                                -webkit-box-shadow: 0px 2px 6px 0px rgba(0,0,0,0.79);
                                                                                                -moz-box-shadow: 0px 2px 6px 0px rgba(0,0,0,0.79);
                                                                                                max-height: 300px;
                                                                                                overflow-y: scroll;
                                                                                                scrollbar-width: thin;
                                                                                                scroll:smooth;
                                                                                                scrollbar-color:green white;
                                                                                                " data-down="0" hidden>
                                        <h2>
                                            <input type="radio" class="btn-check " name="options-outlined"
                                                id="all_notification" autocomplete="off" checked>
                                            <label id="all" class="btn btn-outline-success rounded-pill"
                                                for="all_notification">All</label>

                                            <input type="radio" class="btn-check " name="options-outlined"
                                                id="unread_notification" autocomplete="off">
                                            <label id="pin" class="btn btn-outline-success rounded-pill"
                                                for="unread_notification">pinned</label>
                                        </h2>
                                        <div id="notification-items">

                                        </div>

                                    </div>
                                    {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="true"> --}}
                                    {{-- <i class="fa fa-bell"></i> --}}
                                    {{-- </a> --}}
                                    {{-- <div class="dropdown-menu show_dropdown" aria-labelledby="navbarDropdown" style=""> --}}
                                    {{-- <div class="card" style="margin-top: -10px"> --}}
                                    {{-- <div class="card-header"> --}}
                                    {{-- <input type="radio" class="btn-check " name="options-outlined" id="all_notification" autocomplete="off" checked> --}}
                                    {{-- <label class="btn btn-outline-info rounded-pill" for="all_notification">All Notifications</label> --}}

                                    {{-- <input type="radio" class="btn-check " name="options-outlined" id="unread_notification" autocomplete="off"> --}}
                                    {{-- <label class="btn btn-outline-info rounded-pill" for="unread_notification">Unread Notifications</label> --}}
                                    {{-- </div> --}}

                                    {{-- <div class="card-body"> --}}
                                    {{-- <ul class="list-group"> --}}
                                    {{-- <li class="list-group-item d-flex justify-content-between align-items-center"> --}}
                                    {{-- <div class="form-check"> --}}
                                    {{-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> --}}
                                    {{-- <label class="form-check-label" for="flexCheckDefault"> --}}
                                    {{-- Default checkbox --}}
                                    {{-- </label> --}}
                                    {{-- </div> --}}
                                    {{-- <span class="notifications_no bg-primary rounded-pill">14</span> --}}
                                    {{-- </li> --}}
                                    {{-- <li class="list-group-item d-flex justify-content-between align-items-center"> --}}
                                    {{-- <div class="form-check"> --}}
                                    {{-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> --}}
                                    {{-- <label class="form-check-label" for="flexCheckDefault"> --}}
                                    {{-- Default checkbox --}}
                                    {{-- </label> --}}
                                    {{-- </div> --}}
                                    {{-- <span class="notifications_no bg-primary rounded-pill">14</span> --}}
                                    {{-- </li> --}}
                                    {{-- <li class="list-group-item d-flex justify-content-between align-items-center"> --}}
                                    {{-- <div class="form-check"> --}}
                                    {{-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> --}}
                                    {{-- <label class="form-check-label" for="flexCheckDefault"> --}}
                                    {{-- Default checkbox --}}
                                    {{-- </label> --}}
                                    {{-- </div> --}}
                                    {{-- <span class="notifications_no bg-primary rounded-pill">14</span> --}}
                                    {{-- </li> --}}
                                    {{-- </ul> --}}

                                    {{-- </div> --}}
                                    {{-- </div> --}}
                                    {{-- </div> --}}

                                </li>
                                <li class="nav-item">

                                    <div class="icon notification-click" data-box="profile_box">
                                        <i class="fa fa-user"></i>

                                    </div>
                                    <div class="notifications" id="profile_box" data-down="0" hidden>
                                        <div class="card">
                                            <div class="card-header">

                                                <span class="" style="padding-left: 3px;"> {{ Auth::user()->name }} </span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <a role="button" class=" nav-link dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                                            <a role="button" class="nav-link dropdown-item" href="#"><i class="fa fa-cog"></i>settings</a>
                                            <a role="button" class="nav-link dropdown-item" href="{{ route('logout') }}"><i class="fa  fa-sign-out"></i>logout</a>
                                        </div>

                                    </div>
                                </li>
                            @endguest
                        </ul>


                    </div>
                </div>
            </nav>
        </div>

        {{-- new navbae --}}



        {{-- side_menu --}}
        <div class="container-fluid content-body">
            <div class="row ">
                <div class="container-fluid collapse show collapse-Menu collapse-horizontal" id="side_bar">

                    <div class="main-menu" >
                            <ul class="main-menu-ul flex-wrap">
                                <a href="{{ route('gn.index') }}"><li class="box"><img src="{{ asset('icons/sidebar/Nagarpalika.png')}}" alt=""><p class="menu-title display-1">गाँउपालिका/ नगरपालिका</p></li></a>
                                <a href="{{ route('sewa.index') }}"><li class="box"><img src="{{ asset('icons/sewa_icon.png')}}" alt=""><p class="menu-title">सेवा</p></li></a>

                                <a href="{{ route('sifaris.index') }}"><li class="box"><img src="{{ asset('icons/sifaris_icon.png')}}" alt=""><p class="menu-title">सिफारिस</p></li></a>

                                <a href="{{ route('wada-patra.index') }}"><li class="box"><img src="{{ asset('icons/sidebar/nagarik_badapatra.png')}}" alt=""><p class="menu-title">वडापत्र</p></li></a>
                                <a href="{{route('yojana.index')}}"><li class="box"><img src="{{ asset('icons/yojana_icon.png')}}" alt=""><p class="menu-title">योजना</p></li></a>
                                <a href="{{ route('settings.index') }}"><li class="box"><img src="{{ asset('icons/sidebar/setting.png')}}" alt=""><p class="menu-title">सेटिङ्ग</p></li></a>

                                <a href="#"><li class="box"><img src="{{ asset('icons/sidebar/Inventory.png')}}" alt=""><p class="menu-title">इन्भेन्ट्री</p></li></a>
                                <a href="#"><li class="box"><img src="{{ asset('icons/sidebar/user_icon.png')}}" alt=""><p class="menu-title">प्रयोगकर्ता/ व्यावस्थापन</p></li></a>

                                <a href="#"><li class="box"><img src="{{ asset('icons/sidebar/Communication.png')}}" alt=""><p class="menu-title">संचार</p></li></a>
                                <a href="#"><li class="box"><img src="{{ asset('icons/sidebar/HR.png')}}" alt=""><p class="menu-title">मानव संसाधान</p></li></a>

                                <a href="#"><li class="box"><img src="{{ asset('icons/sidebar/PIS.png')}}" alt=""><p class="menu-title">व्यतिगत/ जानकारी/ प्रणाली</p></li></a>
                                <a href="#"><li class="box"><img src="{{ asset('icons/sidebar/Budget.png')}}" alt=""><p class="menu-title">बजेट</p></li></a>


                                <a href="#"><li class="box"><img src="{{ asset('icons/sidebar/setting.png')}}" alt=""><p class="menu-title">लाइसेन्स</p></li></a>

                            </ul>
                    </div>
                </div>


                {{-- sub__navbar --}}
                <div class="container-fluid" id="content_bar">
                    <div class="container-fluid collapse show collapse-Menu display-view">
                        <div class="content-navbar">
                            <div class="content-navbar-box d-flex">

                                    <a href="{{ route('roles.index') }}"><div><img src="{{ asset('icons/buttom_navbar/Jana.png')}}" alt=""><span class="navbar-box-title">रोल म्यानेज</span></div></a>
                                    <a href="{{ route('users.index') }}"><div><img src="{{ asset('icons/buttom_navbar/user.png')}}" alt=""><span class="navbar-box-title">युजर म्यानेज</span></div></a>
                                    <a href="#"><div><img src="{{ asset('icons/buttom_navbar/namaste_icon.png')}}" alt=""><span class="navbar-box-title">नमस्ते मेयर</span></div></a>

                                    <a href="#"><div><img src="{{ asset('icons/buttom_navbar/publication.png')}}" alt=""><span class="navbar-box-title">प्रकाशन</span></div></a>

                                    <a href="#"><div><img src="{{ asset('icons/buttom_navbar/Budget.png')}}" alt=""><span class="navbar-box-title">बजेट</span></div></a>
                                    <a href="#"><div><img src="{{ asset('icons/buttom_navbar/Jana.png')}}" alt=""><span class="navbar-box-title">युजर म्यानेज</span></div></a>
                                    <a href="#"><div><img src="{{ asset('icons/buttom_navbar/Salla.png')}}" alt=""><span class="navbar-box-title">सुझाब सल्ला</span></div></a>

{{--                                                                    <div><a href="{{ route('roles.index') }}"><img src="{{ asset('icons/buttom_navbar/Jana.png')}}" alt="" /><span class="navbar-box-title">रोल म्यानेज</span></a></div>--}}
{{--                                                                    <div><a href="{{ route('users.index') }}"><img src="{{ asset('icons/buttom_navbar/user.png')}}" alt="" /><span class="navbar-box-title">युजर म्यानेज</span></a></div>--}}
{{--                                                                    <div><a href="#"><img src="{{ asset('icons/buttom_navbar/namaste_icon.png')}}" alt="" /><span class="navbar-box-title">नमस्ते मेयर</span></a></div>--}}

{{--                                                                    <div><a href="#"><img src="{{ asset('icons/buttom_navbar/publication.png')}}" alt="" /><span class="navbar-box-title">प्रकाशन</span></a></div>--}}

{{--                                                                    <div><a href="#"><img src="{{ asset('icons/buttom_navbar/Budget.png')}}" alt="" /><span class="navbar-box-title">बजेट</span></a></div>--}}
{{--                                                                    <div><a href="#"><img src="{{ asset('icons/buttom_navbar/Jana.png')}}" alt="" /><span class="navbar-box-title">युजर म्यानेज</span></a></div>--}}
{{--                                                                    <div><a href="#"><img src="{{ asset('icons/buttom_navbar/Salla.png')}}" alt="" /><span class="navbar-box-title">सुझाब सल्ला</span></a></div>--}}

{{--                                                                    <div><a href="{{ route('roles.index') }}"><img src="{{ asset('icons/buttom_navbar/Jana.png')}}" alt="" /><span class="navbar-box-title">रोल म्यानेज</span></a></div>--}}
{{--                                                                    <div><a href="{{ route('users.index') }}"><img src="{{ asset('icons/buttom_navbar/user.png')}}" alt="" /><span class="navbar-box-title">युजर म्यानेज</span></a></div>--}}
{{--                                                                    <div><a href="#"><img src="{{ asset('icons/buttom_navbar/namaste_icon.png')}}" alt="" /><span class="navbar-box-title">नमस्ते मेयर</span></a></div>--}}

{{--                                                                    <div><a href="#"><img src="{{ asset('icons/buttom_navbar/publication.png')}}" alt="" /><span class="navbar-box-title">प्रकाशन</span></a></div>--}}

{{--                                                                    <div><a href="#"><img src="{{ asset('icons/buttom_navbar/Budget.png')}}" alt="" /><span class="navbar-box-title">बजेट</span></a></div>--}}
{{--                                                                    <div><a href="#"><img src="{{ asset('icons/buttom_navbar/Jana.png')}}" alt="" /><span class="navbar-box-title">युजर म्यानेज</span></a></div>--}}
{{--                                                                    <div><a href="#"><img src="{{ asset('icons/buttom_navbar/Salla.png')}}" alt="" /><span class="navbar-box-title">सुझाब सल्ला</span></a></div>--}}

                            </div>
                            {{-- buttom navbar  --}}

                        </div>

                    </div>



                           @php
                                $last_url= str_replace(url('/'), '', \Illuminate\Support\Facades\URL::current());
                                $exploded_url=explode('/',$last_url);
                                $urls=array(url('/').'/home');
                                $url=url('/');
                                foreach ($exploded_url as $key=>$url_name){

                                        if(!($key==0))
                                        {
                                            $url=$url.'/'.$url_name;
                                            array_push($urls,$url);
                                        }
                                }
                           @endphp

                        <ul id="breadcrumb">
                            @foreach($exploded_url as $key=>$url_name)

                                <li>
                                    <a href="{{url($urls[$key])}}">

                                        @if(!is_numeric($url_name))
                                            @if(array_key_exists($url_name,$route_np_names))
                                                {{$route_np_names[$url_name]}}
                                                @else
                                                {{$url_name}}
                                                @endif

                                        @else
                                            {{$url_name}}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>






                    <div class="container-fluid main-content-view">

                        @yield('content')

                    </div>
                </div>


            </div>
        </div>

        {{-- sub__navbar --}}

{{--        <p class="text-center text-primary"><small>COPYRIGHT 2022 <a href="https://www.mindrisersnepal.com/" target="_blank">@MindRisers Consortium</a></small></p>--}}
    </div>


{{--    <!-- Datables JS -->--}}

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>--}}
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

{{--     bootstrapcdn--}}
{{--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>--}}
{{--     bootstrapcdn--}}

{{--     boostrapv5.1--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>--}}
{{--     boostrapv5.1--}}





    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

{{--    filepond--}}
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    {{-- custome js --}}
        <script src="{{ asset('js/romanize.js')}}"></script>
        <!-- <script src="{{ asset('js/birth.js')}}"></script> -->
        <script src="{{ asset('js/navbar.js')}}"></script>
        <script src="{{ asset('js/preeti.js')}}"></script>

         <script src="{{url('js/date1.js')}}"></script>

{{--    sweetalert2--}}
        <script src="{{url('plugins/sweetalter2/sweetalert2.js')}}"></script>

    {{-- custome js --}}

    <!-- {{-- chat js --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    {{-- chat js --}} -->


    <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v3.7.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/nepalify@0.5.0/umd/nepalify.production.min.js" />



    <script>

    </script>
    <!-- {{--Nepali date--}}


        <script type="text/javascript">
            window.onload = function() {
                var mainInput = document.getElementById("nepali-datepicker");
                mainInput.nepaliDatePicker();

                var dartaDate = document.getElementById("darta-datepicker");
                dartaDate.nepaliDatePicker();

                var bridegroomDate = document.getElementById("marriage-bridegroom");
                bridegroomDate.nepaliDatePicker();

                var brideDate = document.getElementById("marriage-bride");
                brideDate.nepaliDatePicker();
            };
        </script>

    {{--Nepali date--}} -->

    <!-- {{-- mulitsetp form --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- mulitsetp form --}} -->
    <script>
// <<<<<<< HEAD
//
//        $(".start-np-date").nepaliDatePicker({
//
//             dateFormat: "%y-%m-%d",
//             closeOnDateSelect: true
//         });
// =======
//         // $(".start-np-date").nepaliDatePicker({
//         //     dateFormat: "%y-%m-%d",
//         //     closeOnDateSelect: true,
//         // });
// >>>>>>> ca1e8a876dc8b83f00fa62aeb8f99f2161587456

        // $(".end-np-date").nepaliDatePicker({
        //     // dateFormat: "%D, %M %d, %y",
        //     dateFormat: "%y-%m-%d",
        //
        //     closeOnDateSelect: true
        // });
        //

        // console.log(setUnicodePreeti('='))
        $(".date-picker").nepaliDatePicker({
            // dateFormat: "%D, %M %d, %y",
            dateFormat: "%y-%m-%d",
            closeOnDateSelect: true
        });



        $(document).on('focusin','.en-date',function (e) {
            e.target.type = 'date';
        })

        $(document).on('focusout','.en-date',function (e) {
            e.target.type = '';
        })









    </script>
    <script>

        // $('.show_dropdown').find('.card').click(function () {
        //     $(this).parent().toggleClass('show');
        // });
        $(window).on('resize', function(){
            var win = $(this); //this = window
            if (win.width()< 700) {

                $('.main-menu-ul').removeClass('flex-wrap');
                $('.content-navbar-box').removeClass('flex-wrap');
            }
        });


        $(document).ready(function(){

            const options = {
                layout: "traditional",
            };

            $(document).on('keyup','.input-text',function (e) {
                var input_classes=$(this).attr('class');
                // alert(input_classes.includes('en-input-text'))
                if(!input_classes.includes('en-input-text'))
                {
                    var cursor_po=e.target.selectionStart;//get cursor position
                    var text=$(this).val();
                    $(this).val(setUnicodePreeti(text));
                    setCaretPosition(this,cursor_po);//setting cursor after translating en char to np
                }

            });

            $(document).on('keyup','.np-input-text',function (e) {
                var text=$(this).val();
                var cursor_po=e.target.selectionStart;//get cursor position
                // $(this).val(nepalify.format(text, options));
                $(this).val(setUnicodePreeti(text));
                setCaretPosition(this,cursor_po);//setting cursor after translating en char to np
            });

            $(document).on('keyup','.select2-search__field',function (e) {
                var text=$(this).val();
                var cursor_po=e.target.selectionStart;//get cursor position
                // $(this).val(nepalify.format(text, options));
                $(this).val(setUnicodePreeti(text));
                setCaretPosition(this,cursor_po);//setting cursor after translating en char to np

            });

            function setCaretPosition(ctrl, pos) {
                // Modern browsers
                if (ctrl.setSelectionRange) {
                    ctrl.focus();
                    ctrl.setSelectionRange(pos, pos);

                    // IE8 and below
                } else if (ctrl.createTextRange) {
                    var range = ctrl.createTextRange();
                    range.collapse(true);
                    range.moveEnd('character', pos);
                    range.moveStart('character', pos);
                    range.select();
                }
            }












            var win = $(this); //this = window
            if (win.width()< 700) {

                $('.main-menu-ul').removeClass('flex-wrap');
                $('.content-navbar-box').removeClass('flex-wrap');
            }


            var dropdown_ids = ['notification', ''];
            //drop down notification


            $('.notification-click').click(function(e) {
                $.ajax({
                    type: "PUT",
                    url: "{{ route('notification.update', '') }}" + "/1",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        read: true
                    },
                    success: function(response) {
                        // console.log(response);
                    }
                });

                $('#count').html(0)
                var color = $(this).text();
                var current_box_id = $(this).data('box');
                notification_dropdown(current_box_id);

                //to set card z-index -1 when drop down in down
                var dropdown_down = 0
                $(".notification-click").each(function() {
                    var box = $(this).data('box');
                    var down = $("#" + box).data('down');
                    if (down == 1) {
                        dropdown_down = 1;
                    }
                });
                if (dropdown_down == 1) {
                    $('.card').css('z-index', '-1')
                } else {
                    $('.card').css('z-index', '1')

                }

                //to close all other dropdown
                $(".notification-click").each(function() {

                    var box=$(this).data('box');
                    var down=$(this).data('down');
                    if (!(current_box_id==box))
                    {
                        $("#"+box).data('down',1)

                        notification_dropdown(box);
                    }
                });
            });

            function notification_dropdown(box) {
                var down=$("#"+box).data('down');
                if(down==1){
                    $('#'+box).attr('hidden',true);
                    $('#'+box).css('height','0px');
                    $('#'+box).css('opacity','0');
                    $('#'+box).css('z-index','0');
                    $("#"+box).data('down',0)
                    // $('.card').css('z-index','1')
                }else{
                    $('#'+box).removeAttr('hidden');
                    $('#'+box).css('height','auto');
                    $('#'+box).css('opacity','1');
                    $('#'+box).css('z-index','1');
                    $("#"+box).data('down',1)

                    // $('.card').css('z-index','1')
                }
            }


            $(document).click((event) => {


                    // if (!$(event.target).closest('.notifications').length) {
                    //     var dropdown_down=0
                    //     $(".notification-click").each(function() {
                    //         var box=$(this).data('box');
                    //         var down=$("#"+box).data('down');
                    //         if(down==1) {
                    //             alert('fdsa')
                    //             dropdown_down=1;
                    //         }
                    //     });
                    //     if(dropdown_down==1)
                    //     {
                    //         $(".notification-click").each(function() {
                    //             var box=$(this).data('box');
                    //             var down=$(this).data('down');
                    //             $("#"+box).data('down',1)
                    //             notification_dropdown(box);
                    //             // alert('fsdfa')
                    //         });
                    //     }
                    // }



            });
        });




        $(document).ready(function(){
            $(".profile .icon_wrap").click(function(){
                $(this).parent().toggleClass("active");
                $(".notifications").removeClass("active");
            });

            $(".notifications .icon_wrap").click(function(){

                $(this).parent().toggleClass("active");
                $(".profile").removeClass("active");
            });


            $(".show_all .link").click(function(){

                $(".notifications").removeClass("active");
                $(".popup").show();
            });


            $(".close").click(function(){
                $(".popup").hide();
            });
        });



        function load_pdf(loading_div, url)
        {
            $('.'+loading_div).html(
                '<iframe class="iframe-pdf" src="' + url + '" style="margin:auto;width: 100%; height: 148mm">\n' +
                '\n' +
                '</iframe>'
            )
        }

        $('.print-pdf').click(function () {
            const target_iframe = $(".iframe-pdf")
            target_iframe[0].contentWindow.print()
        })


        function htmltopdf(element_id,callback)
        {
            var opt = {
                margin:       0,
                filename:     'myfile.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 5 },
                jsPDF:        { unit: 'mm',format: 'a4', orientation: 'portrait' }
            };
            var element = document.getElementById(element_id);
            // get show page content and convert into pdf
            html2pdf().set(element,'option',opt).from(element).outputPdf().then(function(pdf) {
                //Convert to base 64
                const base64pdf = btoa(pdf);
                //data that contains converted base64pdf file
                var data = {
                    base64pdf: base64pdf,
                    _token: "{{ csrf_token() }}",
                }
                $.ajax({
                    type: "post",
                    url: "{{ route('base64topdf') }}",
                    data: data,
                    success: function(response) {
                        // console.log(response);
                        callback(response);
                    }
                });
            });
        }
    </script>

    <script type="text/javascript">






        $(function(){
            $(window).bind("resize",function(){
                console.log($(this).width())
                if($(this).width() <500){
                    $('#side_bar').removeClass('collapse-horizontal')
                }
                else{

                    $('#side_bar').addClass('collapse-horizontal')
                }
            })
        })



    function myFunction(){

            // var sidebar = document.getElementById("scroll");
            // sidebar.classList.toggle("collapse-menu");
            var yield = document.getElementById("view");
            var classes = document.getElementById("view").classList;

            for(var i = 0; i < classes.length; i++){
                if(classes[i]=='display-none')
                {
                    yield.classList.toggle("display-view")
                    break;
                }
                if(classes[i]=='display-view')
                {

                    yield.classList.toggle("display-none");
                    break;
                }
            }


        }
    </script>


    <script>
        $('#add_kagajpatra').click(function () {

            var kagajpatra_no=$(this).data('kagajpatra_no');
            $('.kagajpatra').append(
                '<div id="'+kagajpatra_no+'" class="file_upload_div">\n' +
                '                            <div class="d-flex flex-nibedan justify-content-start">\n' +
                '                                <img class="remove_kagajpatra" data-kagajpatra_no="'+kagajpatra_no+'" src="{{asset("icons/nibedan/remove.png")}}" height="25px" width="25px"/>\n' +
                '                                <b class="nibedan-b"> कागज पत्र :-</b>\n' +
                '                            </div>\n' +
                '\n' +
                '                            <div>\n' +
                '                                <div class="d-flex flex-nibedan justify-content-end">\n' +
                '\n' +
                '                                    <input  class="input-text" style="width:100%;" id="document_file_title" name="document_file_title[]" type="text" placeholder="कागज पत्र विवरण">\n' +
                '                                    '+

                '                                </div>\n' +
                '                                <div class="">\n' +
                '                                    <input required class="document_file" id="nibedan_document_file'+kagajpatra_no+'" name="nibedan_document_file" type="file" data-id="'+kagajpatra_no+'">\n' +
                '                                       <input id="uploaded_file_name'+kagajpatra_no+'" name="uploaded_file_names[]" value="" hidden>'+
                '                                </div>\n' +
                '                            </div>\n' +
                '</div>'
            )


            // Get a reference to the file input element
            const inputElement = document.querySelector('input[id="nibedan_document_file'+kagajpatra_no+'"]');
            // Create a FilePond instance
            const pond = FilePond.create(inputElement);
            FilePond.setOptions({
                server:
                    {
                        url:"{{route('file.upload')}}",
                        headers:{
                            'X-CSRF-TOKEN':'{{csrf_token()}}'
                        },
                        process: {
                            onload: (res) => {

                                // select the right value in the response here and return
                                // var file_name_list=$('#uploaded_file_names').val();
                                // if(file_name_list=="")
                                // {
                                //     file_name_list=res;
                                // }
                                // else {
                                //     file_name_list=file_name_list+','+res;
                                // }
                                // $('#uploaded_file_names').attr('value',file_name_list);
                                $('#uploaded_file_name'+kagajpatra_no).attr('value',res);
                                // console.log(kagajpatra_no)

                            }
                        }
                    }
            });


            $(this).data('kagajpatra_no',kagajpatra_no+1);
        })

        $(document).on('click','.remove_kagajpatra',function () {
            $('#'+$(this).data('kagajpatra_no')).remove();
        })
        $(document).on('input','.input-text',function () {
            $('.error-div').html('');
        })



        $(document).on('change','.form-control',function () {
            // alert('dfsa')
            var field_name=$(this).attr('name');

            $('#error_'+field_name).html('')
        })




        $(document).ready(function() {
            loadData()
            setInterval(() => {
                loadData()
            }, 10000);

            function loadData() {
                $.ajax({
                    type: "get",
                    url: "{{ route('notification.index') }}",
                    success: function(response) {
                        // console.log(response);
                        // console.log(response.data.length);
                        if (response.data.length === 0) {
                            $('#notification-items').html('');
                            $('#notification-items').append(
                                "<p class='m-2'>There no Notification available at a moment.</p>");
                        } else {
                            $('#count').html(response.data.length);
                            $('#notification-items').html('');
                            $.map(response.data, function(e, i) {
                                $('#notification-items').append(
                                    `

                                    <div class="notifications-item">
                                                    <ul class="list-group" style="width: 100%;">
                                                        <li
                                                            class="list-group-item ">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="` +
                                    e
                                    .id + `"
                                                                    id="flexCheckDefault" ">
                                                                    <a href="` + e.notification_url +
                                    `">
                                                                    <h3>
                                                                        <label class="form-check-label" for="flexCheckDefault">
                                                                            ` + e.notification_type + `
                                                                            </label>
                                                                    </h3>
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                    ` + e.notificaiton_message + `
                                                                </label>
                                                                <br>
                                                                <label class="form-check-label float-end" for="flexCheckDefault">
                                                                   From:- ` + e.user.name + `
                                                                </label>
                                                                <br>
                                                                <label class="form-check-label float-end" for="flexCheckDefault">
                                                                   Date:- ` + e.created_at.split("T", 1) + `
                                                                </label>
                                    </a>

                                                            </div>

                                                            <button
                                                                class="btn btn-info collapse collapse-horizontal collapse-btn"><i
                                                                    class="fa fa-map-pin"></i></button>
                                                        </li>
                                                    </ul>
                                                </div>
                                `
                                );
                            });

                        }
                        // $('#notification_count').append(response);
                    }
                });
            }
            $('#all').click(function(e) {
                e.preventDefault();
                // console.log('all');
                loadData()

            });
        });



        $('#pin').click(function(e) {
            e.preventDefault();
            getPinnedData();
        });

        function getPinnedData() {
            $.ajax({
                type: "get",
                url: "{{ route('notification.index') }}",
                data: {
                    pin: true
                },
                success: function(response) {
                    // console.log(response);
                    // console.log(response.data.length);
                    if (response.length === 0) {
                        $('#notification-items').html('');
                        $('#notification-items').append(
                            "<p class='m-2'>There no Notification available at a moment.</p>");
                    } else {
                        // $('#count').html(response.data.length);
                        $('#notification-items').html('');
                        $.map(response, function(e, i) {
                            $('#notification-items').append(
                                `
                                    <div class="notifications-item">
                                                    <ul class="list-group" style="width: 100%;">
                                                        <li
                                                            class="list-group-item ">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1"
                                                                     checked>
                                    <a href="` + e.notification_url + `">

                                                                    <h3>
                                                                        <label class="form-check-label" for="flexCheckDefault">
                                                                            ` + e.notification_type + `
                                                                            </label>
                                                                    </h3>
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                    ` + e.notificaiton_message + `
                                                                </label>
                                                                <br>
                                                                <label class="form-check-label float-end" for="flexCheckDefault">
                                                                   From:- ` + e.user.name + `
                                                                </label>
                                                                <br>
                                                                <label class="form-check-label float-end" for="flexCheckDefault">
                                                                   Date:- ` + e.created_at.split("T", 1) + `
                                                                </label>
                                                            </div>

                                                            <button
                                                                class="btn btn-info collapse collapse-horizontal collapse-btn"><i
                                                                    class="fa fa-map-pin"></i></button>
                                                        </li>
                                                    </ul>
                                    </a>
                                </div>
                                `
                            );
                        });

                    }
                    // $('#notification_count').append(response);
                }
            });

        }

        $(document).on('click', '.form-check-input', function() {
            if (this.checked === true) {
                var data = {
                    _token: "{{ csrf_token() }}",
                    id: this.value,
                    pin: true
                }

            } else {
                var data = {
                    _token: "{{ csrf_token() }}",
                    id: this.value,
                    pin: false
                }


            }
            $.ajax({
                type: "PUT",
                url: "{{ route('notification.update', '') }}" + "/" + this.value,
                data: data,
                success: function(response) {
                    // console.log(response);
                }
            });
        })

    </script>



    @include('sweetalert::alert')


    {{-- custom js --}}
    @yield('custom-script')
    {{-- custom js --}}


</body>

</html>
