@extends('layouts.main')
 
 
 
@section('custom-css')
 
 
@endsection
 
@section('title')
डिजिटल पालिका | गृह पृष्ट
@endsection
@section('content')
<div class="">
 
 
{{--    <ul>--}}
{{--        <li>--}}
{{--            <div class="icon" id="ele-dropdown"> <i class="fa fa-bell"></i> </div>--}}
{{--            <div class="notifications" id="dropdown-div">--}}
{{--                <h2>--}}
{{--                    <input type="radio" class="btn-check " name="options-outlined" id="all_notification" autocomplete="off" checked>--}}
{{--                    <label class="btn btn-outline-success rounded-pill" for="all_notification">All</label>--}}
 
{{--                    <input type="radio" class="btn-check " name="options-outlined" id="unread_notification" autocomplete="off">--}}
{{--                    <label class="btn btn-outline-success rounded-pill" for="unread_notification">pinned</label>--}}
{{--                </h2>--}}
{{--                <div class="notifications-item">--}}
{{--                    <ul class="list-group" style="width: 100%;">--}}
{{--                        <li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-bs-toggle="collapse" href=".collapse-btn">--}}
{{--                                <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                    bikram--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <span class="notifications_no bg-success rounded-pill">14</span>--}}
{{--                            <button class="btn btn-info rounded-pill collapse collapse-horizontal collapse-btn">pin</button>--}}
{{--                        </li>--}}
 
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="notifications-item">--}}
{{--                    <ul class="list-group" style="width: 100%;">--}}
{{--                        <li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">--}}
{{--                                <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                    sunil--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <span class="notifications_no bg-success rounded-pill">14</span>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--    </ul>--}}
 
 
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12 p-3">
                <a class="bg-light p-3 rounded shadow  nav-link" href="{{ route('darta.index') }}">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="col-6 overflow-wrap-break">
                            <P class="text-dark">दर्ता संख्या</p>
                            {{-- <h2 class="text-dark">{{ $dashboard_counts['darta']['total'] }}</h2> --}}
                            <h2 class="text-dark">२३४</h2>
                        </div>
                        <div class="col-6 text-end">
                            {{-- <div  style="
                                background-image:url('icons/dashboard/darta.png');
                                background-repeat:no-repeat;
                                background-position:right;
                                height:100px;
                                width:100px;
                                float:right;
                                ">
                            </div> --}}
                            <img class="dashboard-card-img" src="icons/dashboard/darta.png"/>
                        </div>
                    </div>
                    <p class="text-dark"><span class="text-primary">५% </span>गत हप्ता</p>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 p-3">
                <a class="bg-light p-3 rounded shadow  nav-link" href="{{ route('chalani.index') }}">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="col-6 overflow-wrap-break">
                            <P class="text-dark">चलानी संख्या </p>
                            {{-- <h2 class="text-dark">{{ $dashboard_counts['chalani']['total'] }}</h2> --}}
                            <h2 class="text-dark">१२</h2>
                        </div>
                        <div class="col-6 text-end">
                            <img class="dashboard-card-img" src="icons/dashboard/form.png"/>
                        </div>
                    </div>
                    <p class="text-dark"><span class="text-primary">५% </span>गत हप्ता</p>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 p-3">
                <a class="bg-light p-3 rounded shadow  nav-link" href="{{ route('sifaris.index') }}">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="col-6 overflow-wrap-break">
                            <P  class="text-dark">सिफारिस संख्या</p>
                            {{-- <h2 class="text-dark">{{ $dashboard_counts['sifaris']['total'] }}</h2> --}}
                            <h2 class="text-dark">६७</h2>
                        </div>
                        <div class="col-6 text-end">
                            <img class="dashboard-card-img" src="icons/event_icon.png"/>
                        </div>
                    </div>
                    <p class="text-dark"><span class="text-primary">५% </span>गत हप्ता</p>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 p-3">
                <a class="bg-light p-3 rounded shadow  nav-link" href="{{ route('yojana.index') }}">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="col-6 overflow-wrap-break">
                            <P class="text-dark">योजना संख्या</p>
                            {{-- <h2 class="text-dark">{{ $dashboard_counts['yojana']['total'] }}</h2> --}}
                            <h2 class="text-dark">४५</h2>
                        </div>
                        <div class="col-6 text-end">
                            <img class="dashboard-card-img" src="icons/plan_icon.png"/>
                        </div>
                    </div>
                    <p class="text-dark"><span class="text-primary">५% </span>गत हप्ता</p>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 p-3">
                <a class="bg-light p-3 rounded shadow  nav-link" href="#">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="col-6 overflow-wrap-break">
                            <P class="text-dark">सूचना संख्या</p>
                            {{-- <h2 class="text-dark">{{ $dashboard_counts['suchana']['total'] }}</h2> --}}
                            <h2 class="text-dark">५६</h2>
                        </div>
                        <div class="col-6 text-end">
                            <img class="dashboard-card-img" src="icons/information_icon.png"/>
                        </div>
                    </div>
                    <p class="text-dark"><span class="text-primary">५% </span>गत हप्ता</p>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 p-3">
                <a class="bg-light p-3 rounded shadow  nav-link" href="{{ route('parichaya-patra.index') }}">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="col-6 overflow-wrap-break">
                            <P class="text-dark">परिचय पत्र संख्या</p>
                            {{-- <h2 class="text-dark">{{ $dashboard_counts['parichaya_patra']['total'] }}</h2> --}}
                            <h2 class="text-dark">७८</h2>
                        </div>
                        <div class="col-6 text-end">
                            <img class="dashboard-card-img" src="icons/idcard_icon.png"/>
                        </div>
                    </div>
                    <p class="text-dark"><span class="text-primary">५% </span>गत हप्ता</p>
                </a>
            </div>
        </div>
 
        <div class="row">
            <div class="p-3 col-12 col-xl-9 mt-4">
                <canvas id="home-main-chart" class="bg-light rounded shadow p-3" style="min-height=100px" ></canvas>
            </div>
            
            <div class=" p-3 col-12 col-xl-3 mt-4" >
                <div class="bg-light rounded shadow">
                    <div class="home-recent p-4">
                        <p> पछिल्लो सर्वेक्षण </p>
                    </div>
                    <div class="mt-2">
                        <div class="d-flex px-4 py-2 justify-content-between align-items-start">
                            <img src="https://picsum.photos/25/25" class="pt-1"/>
                            <div>
                                <p class="m-0 break-word">
                                    सर्वेक्षण-0१
                                </p>
                                <p class="m-0 text-primary">
                                    ५%
                                </p>
                                <small class="m-0">
                                    बृदि
                                </small>
                            </div>
                            <h2 class="m-0 align-self-center">
                                १२३,४
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="p-3">
                <div class="rounded shadow bg-light p-3">
                    <h2>यन्त्रहरू भएका स्थानहरूद्वारा बिक्री रिपोर्ट</h2>
                    <hr/>
                    <div class="text-center">
                        {{-- <img src="/image/nepal-states.svg"/> --}}

                        {{-- <object data="/image/nepal-states.svg"> --}}
                        
                        @include('nepal-states-map')
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="border-0 border-b२३m border-3">यन्त्र</th>
                                    <th scope="col" class="border-0 border-b२३m border-3">प्रदेश 0१</th>
                                    <th scope="col" class="border-0 border-b२३m border-3">प्रदेश 0२</th>
                                    <th scope="col" class="border-0 border-b२३m border-3">प्रदेश 0३</th>
                                    <th scope="col" class="border-0 border-b२३m border-3">प्रदेश 0४</th>
                                    <th scope="col" class="border-0 border-b२३m border-3">प्रदेश 0५</th>
                                    <th scope="col" class="border-0 border-b२३m border-3">प्रदेश 0६</th>
                                    <th scope="col" class="border-0 border-b२३m border-3">प्रदेश 0७</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>एपल</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                </tr>
                                <tr>
                                    <td>एपल</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                </tr>
                                <tr>
                                    <td>एपल</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                    <td>२३</td>
                                </tr>
                            </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>
       
 
</div>
@endsection
 
@section('custom-script')
   
 
    <script>
        var down = false;
        //drop down notification
        $('#ele-dropdown').click(function(e){
 
            var color = $(this).text();
            if(down){
 
                $('#dropdown-div').css('height','0px');
                $('#dropdown-div').css('opacity','0');
                down = false;
            }else{
 
                $('#dropdown-div').css('height','auto');
                $('#dropdown-div').css('opacity','1');
                down = true;
            }
        });
    </script>
 
 
    <script>
 
            var Toast = Swal.mixin({
                toast: true,
                position: 'button',
                showConfirmButton: false,
                timer: 3000
            });
 
            $('.swalDefaultSuccess').click(function() {
                // alert('dfas');
                Toast.fire({
                    icon: 'success',
                    title: 'this is success'
                })
            });
            $('.swalDefaultInfo').click(function() {
                Toast.fire({
                    icon: 'info',
                    title: 'this is info'
                })
            });
            $('.swalDefaultError').click(function() {
                Toast.fire({
                    icon: 'error',
                    title: 'this is error'
                })
            });
            $('.swalDefaultWarning').click(function() {
                Toast.fire({
                    icon: 'warning',
                    title: 'this is warning'
                })
            });
            $('.swalDefaultQuestion').click(function() {
                Toast.fire({
                    icon: 'question',
                    title: 'this is question'
                })
            });
 
    </script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
    <script>
 
            const ctx = document.getElementById('home-main-chart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['ब्राह्मण', 'छेत्री ', 'मगर', 'थारु', 'नेवार', 'अन्य'],
                    datasets: [{
                        label: 'गिन्ती संख्या',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio:true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'जातको आधारमा'
                        }
                    }
                }
            });
    </script>

    {{-- making bootstrap tooltip work with svg icons --}}

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <script>
    // document.getElementById("province06").addEventListener("click", callMe);
        // function callMe(){
            // alert("ok")
        // }
    </script>
 
@endsection