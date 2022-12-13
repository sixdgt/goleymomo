@extends('layouts.main')

@section('title')
डिजिटल पालिका | गाउँपालिका/नगरपालिका
@endsection

@section('content')
<div class="d-flex justify-content-between p-2">
    <div class="nagarik-heading">
       <p>गाउँपालिका/नगरपालिका</p>
    </div>
</div>
<!-- Tab links -->
<div class="gaupalika">
    <button class="tablinks" onclick="openNagarpalika(event, 'janata')">जनता</button>
    <button class="tablinks" onclick="openNagarpalika(event, 'jankari')">जानकारी</button>
    <button class="tablinks" onclick="openNagarpalika(event, 'pratinidi')">प्रतिनीधी</button>
    <button class="tablinks" onclick="openNagarpalika(event, 'karma')">कर्माचारी</button>
</div>
<!-- janata content -->
<br>

<div id="janata" class="gaupalikaContent janata">
    <div class="nagarik-sub-box ">
        <div class="d-flex flex-wrap">
            <div class="button_box">
                <a href="{{route('palika-parichaya.show')}}"><img src="../icons/Gaupalika_Nagarpalika/Jatata/nagarpalika.png" alt=""><span class="">नगरपालिका </span><span class="">गाउँपालिका परिचय</span></a>
            </div>
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Jatata/jana ghunaso.png" alt=""><span >जन गुनासो</span></a>
            </div>
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Jatata/hello.png" alt=""><span>नमस्कार मेयर सर</span><span class="mayor"></span></a>
            </div>
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Jatata/law.png" alt=""><span >न्याय समिती</span></a>
            </div>

        </div>
        <br>
        <div class="d-flex flex-wrap">
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Jatata/woda.png" alt=""><span >वडा जानकारी</span></a>
            </div>
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Jatata/help.png" alt=""><span >सेवा</span></span></a>
            </div>
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Jatata/stage.png" alt=""><span >नगरपालिका </span> <span>गाँउपालिका मंच</span></a>
            </div>
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Jatata/emergency.png" alt=""><span >आकश्मिक सेवा</span></a>
            </div>
        </div>
    </div>
</div>
<!-- jankari content -->
<div id="jankari" class="gaupalikaContent">
    <div class="nagarik-sub-box ">
        <div class="d-flex flex-wrap">
            <div class="button_box">
                <a href="{{ route('yojana.index') }}"><img src="../icons/Gaupalika_Nagarpalika/Janakari/yojana.png" alt=""><span>योजना</span></a>
            </div>
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Janakari/aryatankia.png" alt=""><span >पर्यटकिय स्थल</span><span id="sthal"></span></a>
            </div>
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Janakari/programs.png" alt=""><span >कार्यक्रम</span></a>
            </div>
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Janakari/business.png" alt=""><span>व्यापार व्यावसाय</span><span class="bya"></span></a>
            </div>
        </div>
        <div class="d-flex flex-wrap">
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Janakari/yojana.png" alt=""><span >स्थानिय उत्पादन</span><span class="uutpadan"></span></a>
            </div>
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Janakari/bikas.png" alt=""><span >विकास केन्द्र</span><span class="sha"></span></a>
            </div>
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Janakari/Swasthya.png" alt=""><span >स्वास्थ्य केन्द्र</span><span class="ken"></span></a>
            </div>
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Janakari/karyalaya.png" alt=""><span >कार्यलय</span></a>
            </div>
        </div>
        <div class="d-flex flex-wrap">
            <div class="button_box">
                <a href="#"><img src="../icons/Gaupalika_Nagarpalika/Janakari/saichik.png" alt=""><span >शैक्षिक संस्था</span></a>
            </div>
            <div class="button_box">
                <a class="anya-img" href="#"><img src="../icons/Gaupalika_Nagarpalika/Janakari/other.png" alt=""><span >अन्य</span></a>
            </div>
        </div>
    </div>
</div>
<!-- pratinidi content -->
<div id="pratinidi" class="gaupalikaContent">
    <div class="accordion accordion-flush m-2" id="accordionFlushExample">
        <div class="accordion-item m-2">
          <h2 class="accordion-header" id="pratinidhi">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                <p class="pratinidhi-icon"><img src="../icons/Gaupalika_Nagarpalika/pratinidhi/people.png" alt=""><span class="sub-title">Nagarpalika</span></p>
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="pratinidhi" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body d-flex">
                <div class="row">

                </div>

            </div>
          </div>
        </div>
        <div class="accordion-item m-2">
          <h2 class="accordion-header" id="Karyapalika">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                <p class="pratinidhi-icon"><img src="../icons/Gaupalika_Nagarpalika/pratinidhi/people.png" alt=""><span class="sub-title">Karyapalika</span></p>
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="#Karyapalika" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body d-flex">
                <div class="button_box">
                    <div class="box-img">
                        <img src="../image/index.png" alt="">
                        <p class="title-name">Phuldev Mandal</p>
                        <p class="post-title">Nagar Pramukh</p>
                    </div>
                </div>
                <div class="button_box">
                    <div class="box-img">
                        <img src="../image/index.jpeg" alt="">
                        <p class="title-name">Phuldev Mandal</p>
                        <p class="post-title">Nagar Upapramukh</p>
                    </div>
                </div>
                <div class="button_box">
                    <div class="box-img">
                        <img src="../image/index.png" alt="">
                        <p class="title-name">Phuldev Mandal</p>
                        <p class="post-title">Nagar Pramukh</p>
                    </div>
                </div>
                <div class="button_box">
                    <div class="box-img">
                        <img src="../image/index.jpeg" alt="">
                        <p class="title-name">Phuldev Mandal</p>
                        <p class="post-title">Nagar Upapramukh</p>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="accordion-item m-2">
          <h2 class="accordion-header" id="Program">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                 <p class="pratinidhi-icon"><img src="../icons/Gaupalika_Nagarpalika/pratinidhi/people.png" alt=""> <span class="sub-title">Program</span></p>
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="#Program" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body d-flex">
                <div class="button_box">
                    <div class="box-img">
                        <img src="../image/index.png" alt="">
                        <p class="title-name">Phuldev Mandal</p>
                        <p class="post-title">Nagar Pramukh</p>
                    </div>
                </div>
                <div class="button_box">
                    <div class="box-img">
                        <img src="../image/index.jpeg" alt="">
                        <p class="title-name">Phuldev Mandal</p>
                        <p class="post-title">Nagar Upapramukh</p>
                    </div>
                </div>
                <div class="button_box">
                    <div class="box-img">
                        <img src="../image/index.png" alt="">
                        <p class="title-name">Phuldev Mandal</p>
                        <p class="post-title">Nagar Pramukh</p>
                    </div>
                </div>
                <div class="button_box">
                    <div class="box-img">
                        <img src="../image/index.jpeg" alt="">
                        <p class="title-name">Phuldev Mandal</p>
                        <p class="post-title">Nagar Upapramukh</p>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="accordion-item m-2">
            <h2 class="accordion-header" id="Ward">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapseThree">
                <p class="pratinidhi-icon"><img src="../icons/Gaupalika_Nagarpalika/pratinidhi/people.png" alt=""> <span class="sub-title">Woda</span></p>
              </button>
            </h2>
            <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="#Ward" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body d-flex">
                    <div class="button_box">
                        <div class="box-img">
                            <img src="../image/index.png" alt="">
                            <p class="title-name">Phuldev Mandal</p>
                            <p class="post-title">Nagar Pramukh</p>
                        </div>
                    </div>
                    <div class="button_box">
                        <div class="box-img">
                            <img src="../image/index.jpeg" alt="">
                            <p class="title-name">Nishant Joshi</p>
                            <p class="post-title">Nagar Upapramukh</p>
                        </div>
                    </div>
                    <div class="button_box">
                        <div class="box-img">
                            <img src="../image/index.png" alt="">
                            <p class="title-name">Nishant Joshi</p>
                            <p class="post-title">Nagar Pramukh</p>
                        </div>
                    </div>
                    <div class="button_box">
                        <div class="box-img">
                            <img src="../image/index.jpeg" alt="">
                            <p class="title-name">Phuldev Mandal</p>
                            <p class="post-title">Nagar Upapramukh</p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>
<!-- karma content -->
<div id="karma" class="gaupalikaContent">
    <div class="accordion accordion-flush m-2" id="accordionFlushExample">
        <div class="accordion-item m-2">
          <h2 class="accordion-header" id="devOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                <p class="pratinidhi-icon"><img src="../icons/Gaupalika_Nagarpalika/pratinidhi/people.png" alt=""> <span class="sub-title">Nagarpalika</span></p>
            </button>
          </h2>
          <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="#devOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">phuldev content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
          </div>
        </div>
        <div class="accordion-item m-2">
          <h2 class="accordion-header" id="devTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                <p class="pratinidhi-icon"><img src="../icons/Gaupalika_Nagarpalika/pratinidhi/people.png" alt=""> <span class="sub-title">Woda</span></p>
            </button>
          </h2>
          <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="#devTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <p class="wada-title">wada no.1</p>
                <div class="accordion-body d-flex">
                    <div class="button_box">
                        <div class="box-img">
                            <img src="../image/index.png" alt="">
                            <p class="title-name">Phuldev Mandal</p>
                            <p class="post-title">Nagar Pramukh</p>
                        </div>
                    </div>
                    <div class="button_box">
                        <div class="box-img">
                            <img src="../image/index.jpeg" alt="">
                            <p class="title-name">Nishant Joshi</p>
                            <p class="post-title">Nagar Upapramukh</p>
                        </div>
                    </div>
                    <div class="button_box">
                        <div class="box-img">
                            <img src="../image/index.png" alt="">
                            <p class="title-name">Saugat Basnet</p>
                            <p class="post-title">Nagar Pramukh</p>
                        </div>
                    </div>
                    <div class="button_box">
                        <div class="box-img">
                            <img src="../image/index.jpeg" alt="">
                            <p class="title-name">Robin Shrestha</p>
                            <p class="post-title">Nagar Upapramukh</p>
                        </div>
                    </div>
                </div>
                <hr>
                <p class="wada-title">wada no.1</p>
                <div class="accordion-body d-flex">
                    <div class="button_box">
                        <div class="box-img">
                            <img src="../image/index.png" alt="">
                            <p class="title-name">Phuldev Mandal</p>
                            <p class="post-title">Nagar Pramukh</p>
                        </div>
                    </div>
                    <div class="button_box">
                        <div class="box-img">
                            <img src="../image/index.jpeg" alt="">
                            <p class="title-name">Nishant Joshi</p>
                            <p class="post-title">Nagar Upapramukh</p>
                        </div>
                    </div>
                    <div class="button_box">
                        <div class="box-img">
                            <img src="../image/index.png" alt="">
                            <p class="title-name">Saugat Basnet</p>
                            <p class="post-title">Nagar Pramukh</p>
                        </div>
                    </div>
                    <div class="button_box">
                        <div class="box-img">
                            <img src="../image/index.jpeg" alt="">
                            <p class="title-name">Robin Shrestha</p>
                            <p class="post-title">Nagar Upapramukh</p>
                        </div>
                    </div>
                </div>
                </div>
          </div>
        </div>
    </div>
</div>
@endsection
