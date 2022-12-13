@extends('layouts.main')
@section('custom-css')
    <style>
        a {
            font-size: 12px;
        }

        .navbar {
            display: flex;

        }

    </style>
@endsection

@section('content')
    <?php
    $yojanas = [
        [
            'menu_name' => 'आधारभूत वीवरर्ण',
            'sub_menu' => [
                [
                    'name' => 'योजना सम्बन्धी',
                    'sub_menu_of_sub' => [
                        ['route' => route('kharcha-faatwari-bhiwaran.index'), 'name' => 'खार्चाको फाटवारी वीवरण'],
                        ['route' => route('yojana-kissim.index'), 'name' => 'योजनाको किसिम'],
                        ['route' => route('yojana-udesya.index'), 'name' => 'याजनाका उदश्य'],
                        ['route' => route('yojana-sanchalan-prakriya.index'), 'name' => 'योजना संचालन प्रक्रिया'],
                        ['route' => route('yojana-prakriti.index'), 'name' => 'योजनाको प्रकृति'],
                        ['route' => route('yojana-stara.index'), 'name' => 'योजनाको स्तर '],
                        ['route' => route('yojana-kriyakalap.index'), 'name' => 'योजना किर्यकलाप'],
                        ['route' => route('kharid-prakar.index'), 'name' => 'खरिदको प्रकार'],
                        ['route' => route('prathmikata-prakar.index'), 'name' => 'प्राथमिकताको प्रकार'],
                        ['route' => route('yojana-chanaut-adhar.index'), 'name' => 'योजना छनौट आधार'],
                        ['route' => route('ranautic-sanket.index'), 'name' => 'रणनैतिक संकेत'],
                        ['route' => route('karyakram.index'), 'name' => 'कार्यक्रम'],
                        ['route' => route('lachit-samaha.index'), 'name' => 'लक्षित समह'],
                        ['route' => route('ekaiko-prakar.index'), 'name' => 'इकाईको प्रकार'],
                        ['route' => route('yojana-awastha.index'), 'name' => 'योजनाको अवस्था'],
                        ['route' => route('thekedar-prakar.index'), 'name' => 'ठेकेदारको प्रकार'],
                    ],
                ],
                [
                    'name' => 'साधारण',
                    'sub_menu_of_sub' => [
                        [
                            'name' => 'कार्यालय / स्थानीय हत',
                            'sub_menu_of_sub_of_sub' => [['route' => route('karyalaya.index'), 'name' => 'कार्यालय'], ['route' => route('sadharan-ekaiko-prakar.index'), 'name' => 'इकाइको प्रकार']],
                        ],
                        [
                            'name' => 'सुचिकृत विवरण',
                            'sub_menu_of_sub_of_sub' => [['route' => route('suchikrit-prakar.index'), 'name' => 'सुचिकृतको प्रकार'], ['route' => route('suchikrit-bhiwaran.index'), 'name' => 'सुचिकृतको विवरण']],
                        ],
                        ['name' => 'सडक', 'sub_menu_of_sub_of_sub' => [['route' => route('sadak-sethiti.index'), 'name' => 'सडक स्थिति'], ['route' => route('sadak-prakar.index'), 'name' => 'सडक प्रकार'], ['route' => route('dhal-nikas-kissim.index'), 'name' => 'ढल निकासको किसिम'], ['route' => '#', 'name' => 'सडकका नामावली बिबरण']]],
                        ['route' => route('arthik-barsa.index'), 'name' => 'आर्थिक वर्ष'],
                        ['route' => route('mudha-nam.index'), 'name' => 'मुद्राको नाम'],
                        ['route' => route('bisayagat-karya-chetras.index'), 'name' => 'विषयगत कार्यक्षेत्र'],
                        ['route' => route('sahayak-module.index'), 'name' => 'सहायक मोड्युल'],
                        ['route' => route('patra-patrika-bhiwaran.index'), 'name' => 'पत्र-पत्रिका विवरण'],
                        ['route' => route('nirman-samagri-bhiwaran.index'), 'name' => 'निर्माण सामग्रीको विवरण'],
                    ],
                ],
                [
                    'name' => 'बजेट तथा  स्रोत ब्वास्थापन',
                    'sub_menu_of_sub' => [['route' => route('budget-upsepark.index'), 'name' => 'बजेट उपशीर्षक'], ['route' => route('bhutani-bidhi.index'), 'name' => 'भुक्तानी विधि'], ['route' => route('prasi-ko-shrot.index'), 'name' => 'प्राप्तिको स्रोत'], ['route' => route('bhootani-madyam.index'), 'name' => 'भूक्तानी माध्यम'], ['route' => route('sahayak-ledger.index'), 'name' => 'सहायक लेजर'], ['route' => route('lekha-shirsak-beywasthanpan.create'), 'name' => 'लेखा शीर्षक व्यवस्थापन'], ['route' => route('budget-shrot.index'), 'name' => 'बजेट स्रोत'], ['route' => '#', 'name' => 'स्रोत व्यहोर्ने निकायको प्रकार'], ['route' => '#', 'name' => 'स्रोत व्यहोर्ने निकाय']],
                ],
            ],
        ],
        [
            'menu_name' => 'बजेट प्रक्रिया तथा व्यस्थापन',
            'sub_menu' => [
                [
                    'name' => 'बजेट प्रक्रिया',
                    'sub_menu_of_sub' => [['route' => '#', 'name' => 'व्यय बजेट सिमा निर्धारण (वडा)'], ['route' => '#', 'name' => 'आय बजेट सिमा निर्धारण'], ['route' => '#', 'name' => 'व्यय बजेट सिमा निधरिण'], ['route' => '#', 'name' => 'व्यय बजेट अन्‌मान'], ['route' => '#', 'name' => 'वित्तीय व्यवस्था अनुमान']],
                ],
                [
                    'name' => 'बजेट व्यस्थापन',
                    'sub_menu_of_sub' => [['route' => '#', 'name' => 'व्यय बजेट व्यवस्थापन'], ['route' => '#', 'name' => 'बजेट संशोधनको विवरण'], ['route' => '#', 'name' => 'बजेट रकमान्तर']],
                ],
            ],
        ],
        [
            'menu_name' => 'आधारभूत वीवरर्ण',
        ],
        [
            'menu_name' => 'योजना तर्जुना ',
            'sub_menu' => [
                [
                    'name' => 'काम/योजनाको प्रकार',
                ],
                [
                    'name' => 'काम योजना/कार्यक्रम (न.पा./गा.पा. )',
                ],
                [
                    'name' => 'काम योजना/कार्यक्रम (वडा स्तरिय)',
                ],
                [
                    'name' => 'काम योजना/कार्यक्रम (प्राथमिकीकरण)',
                ],
                [
                    'name' => 'काम/योजना/कार्यक्रम (सुचिकृत/ShortList)',
                ],
                [
                    'name' => 'काम/योजना/कार्यक्रम (स्वीकृत गर्न)',
                ],
            ],
        ],
        [
            'menu_name' => 'योजना कार्यान्वयन',
            'sub_menu' => [
                [
                    'name' => 'योजनाको विवरण',
                ],
                [
                    'name' => 'ठेक्कापट्टा',
                ],
                [
                    'name' => 'उपभोक्ता समिति',
                ],
                [
                    'name' => 'अमानत',
                ],
                [
                    'name' => 'संस्थागत सहकार्य',
                ],
                [
                    'name' => 'आयोजनाको चालु तथा सम्पन्न विवरण',
                ],
            ],
        ],
        [
            'menu_name' => 'मानव संसाधन',
            'sub_menu' => [
                [
                    'name' => 'कर्मचारीको विवरण',
                ],
                [
                    'name' => 'विभाग',
                ],
                [
                    'name' => 'पदको प्रकार',
                ],
                [
                    'name' => 'पद श्रेणी विवरण',
                ],
                [
                    'name' => 'स्वीकृत पद विवरण',
                ],
                [
                    'name' => 'कर्मचारीको किसिम',
                ],
                [
                    'name' => 'जनप्रतिनिधीको पद',
                ],
            ],
        ],
        [
            'menu_name' => 'प्रतिबेदन',
            'sub_menu' => [
                [
                    'name' => 'ठेक्का सम्बन्धी लगत प्रतिवेदन',
                ],
                [
                    'name' => 'आयोजनाको बोलपत्र सम्बन्धी विवरण',
                ],
                [
                    'name' => 'सम्पन्न हुन बाँकी आयोजनाको सुची',
                ],
                [
                    'name' => 'संचालन प्रकृयाको आधारमा आयोजनाहरूको सुची',
                ],
                [
                    'name' => 'Customer Report Template',
                ],
                [
                    'name' => 'Customer Report Fields Mapping',
                ],
            ],
        ],

        [
            'menu_name' => 'प्रयोगकर्ता व्यवस्थापन',
            'sub_menu' => [
                [
                    'name' => 'प्रयोगकर्ता',
                ],
                [
                    'name' => 'भूमिका',
                ],
                [
                    'name' => 'अधिकार',
                ],
                [
                    'name' => 'एप्लिकेशन व्यवस्थापप',
                ],
                [
                    'name' => 'प्रयोगकर्ता क्रियाकलाप',
                ],
            ],
        ],
    ];
    ?>



    <nav class="navbar-expand-lg navbar-light bg-light h-auto " style="overflow-x:scroll;scrollbar-width: thin;">
        <div class="container-fluid">
            <div class="navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @foreach ($yojanas as $yojana)
                        <li class="text-nowrap">
                            <a class="nav-link px-3 sidebar-link dropdown-toggle" data-bs-toggle="collapse"
                                href="#submenu{{ $loop->index }}" role="button" aria-expanded="false"
                                aria-controls="collapseExample">
                                <span class="me-2"></span>
                                <span>{{ $yojana['menu_name'] }}</span>
                                <span class="right-icon ms-auto"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                            </a>
                            <div class="collapse" id="submenu{{ $loop->index }}">
                                <div>
                                    @if (array_key_exists('sub_menu', $yojana))
                                        <ul class="navbar-nav ps-3 ">
                                            @foreach ($yojana['sub_menu'] as $sub_menu_name)
                                                <li class="text-nowrap">
                                                    @if (array_key_exists('sub_menu_of_sub', $sub_menu_name) && array_key_exists('name', $sub_menu_name))
                                                        <?php $unique_id = rand(0, 1933); ?>
                                                        <a class="nav-link px-3 sidebar-link dropdown-toggle"
                                                            data-bs-toggle="collapse"
                                                            href="#testing{{ $loop->index }}{{ $unique_id }}"
                                                            role="button" aria-expanded="false"
                                                            aria-controls="collapseExample">
                                                            <span class="me-2"></span>
                                                            <span>{{ $sub_menu_name['name'] }}</span>
                                                            <span class="right-icon ms-auto"><i class="fa fa-chevron-down"
                                                                    aria-hidden="true"></i></span>
                                                        </a>

                                                        <ul class="navbar-nav ps-3 " class="collapse"
                                                            id="testing{{ $loop->index }}{{ $unique_id }}">
                                                            @foreach ($sub_menu_name['sub_menu_of_sub'] as $sub_menu_of_sub)
                                                                <li class="text-nowrap">
                                                                    @if (array_key_exists('sub_menu_of_sub_of_sub', $sub_menu_of_sub))
                                                                        <?php $unique_id = rand(0, 1933); ?>
                                                                        <a class="nav-link px-3 sidebar-link dropdown-toggle"
                                                                            data-bs-toggle="collapse"
                                                                            href="#testing{{ $loop->index }}{{ $unique_id }}"
                                                                            role="button" aria-expanded="false"
                                                                            aria-controls="collapseExample">
                                                                            <span class="me-2"></span>
                                                                            <span>{{ $sub_menu_of_sub['name'] }}</span>
                                                                            <span class="right-icon ms-auto"><i
                                                                                    class="fa fa-chevron-down"
                                                                                    aria-hidden="true"></i></span>
                                                                        </a>
                                                                        <div class="collapse"
                                                                            id="testing{{ $loop->index }}{{ $unique_id }}">
                                                                            <ul class="navbar-nav ps-3 ">

                                                                                @foreach ($sub_menu_of_sub['sub_menu_of_sub_of_sub'] as $sub_menu_of_sub_of_sub)
                                                                                    <li class="text-nowrap">
                                                                                        <a class="nav-link px-3 sidebar-link"
                                                                                            href="{{ $sub_menu_of_sub_of_sub['route'] }}">
                                                                                            <span
                                                                                                class="me-2"></span>
                                                                                            <span>{{ $sub_menu_of_sub_of_sub['name'] }}</span>
                                                                                        </a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @else
                                                                        <a href="{{ $sub_menu_of_sub['route'] }}"
                                                                            class="nav-link px-3">
                                                                            <span class="me-2">
                                                                            </span>
                                                                            <span>
                                                                                {{ $sub_menu_of_sub['name'] }}
                                                                            </span>
                                                                        </a>
                                                                    @endif
                                                            @endforeach
                                                </li>
                                        </ul>
                                    @else
                                        <a href="#" class="nav-link px-3">
                                            <span class="me-2"></span>
                                            <span>{{ $sub_menu_name['name'] }}</pre></span>
                                        </a>
                                    @endif
                        </li>
                    @endforeach
                </ul>
            @else
                @endif
            </div>
        </div>
        </li>
        @endforeach
        </ul>
        </div>

        </div>
    </nav>
    @yield('yojana-content')
@endsection
@section('custom-script')
    <script></script>
@endsection
