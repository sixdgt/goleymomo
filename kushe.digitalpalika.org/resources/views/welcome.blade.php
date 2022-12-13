<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- custom css  -->
    <link rel="stylesheet" href="{{ asset('css/login.css',
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>DIGITAL PALIKA | Login</title>
  </head>
  <body>
    <!-- login header  -->
        <div class="col-4 offset-1">
            <div class="card main-card">
                <div class="card-header login-card-header"><h3>WELCOME TO</h3><h6>Digital Palika</h6></div>
                <div class="card-body">
                    <!-- form  -->
                    <section>
                        <div class="1-form">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form_div">
                                    <input type="email"class="form_input" name="email" placeholder="" required>
                                    <label for="" class="form_label">Email</label>
                                </div>
                                <div class="form_div">
                                    <input type="password" name="password" class="form_input" required placeholder="">
                                    <label for="" class="form_label">Password</label>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Remember me
                                        </label>
                                    </div>
                                    <div class="pass"><p><a href="#">Forgot password?</a></p></div>
                                </div>
                                <input type="submit" class="form_button" value="LOGIN">
                            </form>
                        </div>
                    </section>
                    <!-- form  -->
                </div>
            </div>
        </div>
    <!-- login header  -->
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>







<div class="row sifaris-section">
    <div class="d-flex justify-content-between">
        <div class="sifaris-title">
            <h3><b>निबेदन</b></h3>
        </div>
        <div class="row">
            <div class="col-6 slide_btn" data-container_id="nibedan" data-btn_type="left" >
                <i class="fas sifaris-fa-icon fa-angle-double-left" style=""></i>
            </div>

            <div class="col-6 slide_btn" data-container_id="nibedan" data-btn_type="right" >
                <i class="fas sifaris-fa-icon fa-angle-double-right"></i>
            </div>
        </div>

    </div>


    <div class="col-sm-12 col-md-12 horizontal-scrollable" id="nibedan">
        <div class="d-flex  justify-content-start boxs">

            ['href'=>'aadibasi-pramanit.index', 'icon'=>'icons/sifaris_icons/adhibasi_pramanit_icon.png','title'=>'अधिबसी प्रमाणिकरण'],
            ['href'=>'briddha-bhatta.index', 'icon'=>'icons/sifaris_icons/bridha_bhatta_icon.png','title'=>'बृद्ध वत्त निबेदन '],
            ['href'=>'bipanna-nagarik.index', 'icon'=>'icons/sifaris_icons/bippanna_nagarik_icon.png','title'=>'बिप्पन्न नागरिक आबेदन',
            ['href'=>'byabasaya-darkhasta.index','icon'=>'icons/sifaris_icons/byabasaya_sifaris_icon.png','title'=>'ब्यबसाय दर्ता'],
            ['href'=>'form-khareji.index','icon'=>'icons/sifaris_icons/farm_icon.png','title'=>'फर्म खारेजी'],
            ['href'=>'jagga-sagh-simangkan.index','icon'=>'icons/sifaris_icons/simangkan_icon.png','title'=>'जग्गाको साँघ सिमाङ्कन'],

        </div>
    </div>

</div>


<div class="row sifaris-section">

    <div class="d-flex justify-content-between">
        <div class="sifaris-title">
            <h3><b>नागरिकता</b></h3>
        </div>
        <div class="row">
            <div class="col-6 slide_btn" data-container_id="nagarikta" data-btn_type="left" >
                <i class="fas sifaris-fa-icon fa-angle-double-left" style=""></i>
            </div>

            <div class="col-6 slide_btn" data-container_id="nagarikta" data-btn_type="right" >
                <i class="fas sifaris-fa-icon fa-angle-double-right"></i>
            </div>
        </div>

    </div>

    <div class="col-sm-12 col-md-12 horizontal-scrollable" id="nagarikta" style="overflow-x:hidden">
        <div class="d-flex  justify-content-start boxs">

            ['href'=>'nagarikta-pratilipi.index', 'icon'=>'icons/sifaris_icons/nagarikta_pratilipi_sifaris_icon.png','title'=>'नागरिकता प्रतिलिपि सिफारिस'],
            ['href'=>'nagarikta-pramanpatra.index','icon'=>'icons/sifaris_icons/nagarikta_pramand_patra_sifaris_icon.png','title'=>'नागरिकता प्रमाणपत्र सिफारिस'],
            ['href'=>'nagarikta-sifaris.index','icon'=>'icons/sifaris_icons/nepali_nagarikta_sifaris_icon.png','title'=>'नागरिकता सिफारिस'],
            ['href'=>'nagarikta-pramanpatra-frompati.index','icon'=>'icons/sifaris_icons/nepali_nagarikta_according_to_pati_icon.png','title'=>'पतिको नाममा नेपाली नागरिकताको प्रमाण-पत्र'],
            ['href'=>'nepali-angikrit-nagarikta.index','icon'=>'icons/sifaris_icons/nepali_angakrit_nagarikta_icon.png','title'=>'नेपाली अंगीकृत नागरिकता'],
            ['href'=>'nagarikta-pramanpatra-pratilipi.index','icon'=>'icons/sifaris_icons/nepali_nagarikta_pramand_patra.png','title'=>'नेपाली नागरिकताको प्रमाण-पत्र प्रतिलिपि पाऊँ']
  
        </div>
    </div>

</div>



<div class="row sifaris-section">

    <div class="d-flex justify-content-between">
        <div class="sifaris-title">
            <h3><b>दर्ता चलानी</b></h3>
        </div>
        <div class="row">
            <div class="col-6 slide_btn" data-container_id="darta_chalani" data-btn_type="left" >
                <i class="fas sifaris-fa-icon fa-angle-double-left" style=""></i>
            </div>

            <div class="col-6 slide_btn" data-container_id="darta_chalani" data-btn_type="right" >
                <i class="fas sifaris-fa-icon fa-angle-double-right"></i>
            </div>
        </div>

    </div>

    <div class="col-sm-12 col-md-12 horizontal-scrollable" id="darta_chalani" style="overflow-x:hidden">
        <div class="d-flex  justify-content-start boxs">

            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'दर्ता किताब','href'=>'']


            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'चलानी किताब','href'=>'']

            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'सुची दर्ता सिररिसको सुची ','href'=>'']

        </div>
    </div>

</div>


<div class="row sifaris-section">

    <div class="d-flex justify-content-between">
        <div class="sifaris-title">
            <h3><b>रिपोर्ट</b></h3>
        </div>
        <div class="row">
            <div class="col-6 slide_btn" data-container_id="sifaris_report" data-btn_type="left" >
                <i class="fas sifaris-fa-icon fa-angle-double-left" style=""></i>
            </div>

            <div class="col-6 slide_btn" data-container_id="sifaris_report" data-btn_type="right" >
                <i class="fas sifaris-fa-icon fa-angle-double-right"></i>
            </div>
        </div>

    </div>

    <div class="col-sm-12 col-md-12 horizontal-scrollable" id="sifaris_report" style="overflow-x:hidden">
        <div class="d-flex  justify-content-start boxs">

            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'कोटीको आधारमा रिपोर्ट हेर्नुहोस','href'=>''],
            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'कोटीको आधारमा सुची हेर्नुहोस','href'=>''],
            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'अस्वीकृत अपांगता परिचयपत्रको सुची','href'=>''],
            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'अस्वीकृत ज्येष्ठ नागरिक परिचयपत्रको सुची ','href'=>''],
            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'परिचयपत्र नवीकरण सुची','href'=>'']



        </div>
    </div>

</div>


<div class="row sifaris-section">

    <div class="d-flex justify-content-between">
        <div class="sifaris-title">
            <h3><b>आधिकारिक प्रयोग</b></h3>
        </div>
        <div class="row">
            <div class="col-6 slide_btn" data-container_id="aadhikarik_prayog" data-btn_type="left" >
                <i class="fas sifaris-fa-icon fa-angle-double-left" style=""></i>
            </div>

            <div class="col-6 slide_btn" data-container_id="aadhikarik_prayog" data-btn_type="right" >
                <i class="fas sifaris-fa-icon fa-angle-double-right"></i>
            </div>
        </div>

    </div>

    <div class="col-sm-12 col-md-12 horizontal-scrollable" id="aadhikarik_prayog" style="overflow-x:hidden">
        <div class="d-flex  justify-content-start boxs">

            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'कार्यवाहक तोकिएको सिफारिस','href'=>''],
            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'सूचना बिवरण सुची ','href'=>'']

        </div>
    </div>

</div>


<div class="row sifaris-section">

    <div class="d-flex justify-content-between">
        <div class="sifaris-title">
            <h3><b>प्रमाण-पत्र</b></h3>
        </div>
        <div class="row">
            <div class="col-6 slide_btn" data-container_id="praman_patra" data-btn_type="left" >
                <i class="fas sifaris-fa-icon fa-angle-double-left" style=""></i>
            </div>

            <div class="col-6 slide_btn" data-container_id="praman_patra" data-btn_type="right" >
                <i class="fas sifaris-fa-icon fa-angle-double-right"></i>
            </div>
        </div>

    </div>

    <div class="col-sm-12 col-md-12 horizontal-scrollable" id="praman_patra" style="overflow-x:hidden">
        <div class="d-flex  justify-content-start boxs">

            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'उपभोक्ता संस्था दर्ता प्रमाण-पत्र','href'=>''],
            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>' कृषक समूह/समिति दर्ता प्रमाण-पत्र','href'=>''],
            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'घ वर्गको निर्माण व्यवसाय इजाजत पत्र','href'=>''],
            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'निर्माण कार्य को पासबुक','href'=>''],
            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>' निर्माण कार्य को पासबुकको सूची','href'=>''],
            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'घ वर्गको निर्माण व्यवसाय इजाजत पत्रको','href'=>''],
            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>' निर्माण कार्य को पासबुकको सूची','href'=>''],
            ['icon'=>'icons/sifaris_icons/darta_chalani_icon.png','title'=>'घ वर्गको निर्माण व्यवसाय इजाजत पत्रको','href'=>'']

        </div>
    </div>

</div>