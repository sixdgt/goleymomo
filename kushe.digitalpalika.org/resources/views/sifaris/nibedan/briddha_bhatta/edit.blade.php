@extends('layouts.main')
@section('title')
    बिप्पन्न नागरिक आबेदन
@endsection

@section('content')
    {{ $data }}
    <form action="{{ route('briddha-bhatta.store') }}" method="post">
        @csrf
        <div class="container-fluid border border-dark py-2"
            style="background: url('https://st2.depositphotos.com/1006009/11103/i/950/depositphotos_111038830-stock-photo-nepalese-natural-lokta-paper.jpg')">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center">
                                अनुसूची - ३ (क)
                            </p>
                            <p class="text-center">
                                (दफा ६ को उपदफा ३ सँग सम्बन्धित)
                            </p>
                            <p class="text-center">
                                वृद्धा भत्ताको निवेदन
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row my-5">
                                <div class="col-md-8 ">
                                    <div class="d-flex">
                                        <p class="text-left">श्री , </p>
                                        <select name="designation" id="">
                                            <option selected="{{ $data->designation }}">{{ $data->designation }}</option>
                                            <option value="adakchaya 1">अध्यक्ष</option>
                                            <option value="adakchaya 2">अध्यक्ष</option>
                                            <option value="adakchaya 3">अध्यक्ष</option>
                                        </select>
                                        <p class="text-left"> ज्यू,</p>
                                    </div>
                                    @error('designation')
                                        <p class="text-danger my-1">{{ $message }}</p>
                                    @enderror
                                    <br>
                                    <input type='text' value="{{ $data->from_palika }}" name="from_palika"
                                        style="width: 147px" placeholder=" भूमे गाउँपालिका" class="text-left">
                                    @error('from_palika')
                                        <p class="text-danger my-1">{{ $message }}</p>
                                    @enderror
                                    <input type='text' value="{{ $data->to_palika }}" name="to_palika" style="width: 147px"
                                        placeholder="  गाउँपालिका " class="text-left">
                                    को कार्यालय
                                    @error('to_palika')
                                        <p class="text-danger my-1">{{ $message }}</p>
                                    @enderror
                                    <br>

                                </div>

                                <div class="col-md-4 py-1">
                                    <input class="float-end" value="{{ $data->application_date }}"
                                        name="application_date" type="date" name="" id="">
                                    <p class="float-end">
                                        मिति:
                                    </p>
                                    @error('application_date')
                                        <p class="text-danger my-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-center">
                        <b> विषय:<u>

                                नाम दर्ता सम्बन्धमा
                            </u></b>
                    </p>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-left">
                                महोदय,
                            </p>
                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;उपरोक्त विषयमा सामाजिक सुरक्षा भत्ता
                                पाउनका लागि नयाँ नाम दर्ता गरिदिनुहुन देहायका विवरण सहित यो
                                दरखास्त पेश गरेको छु। मैले राज्य कोषबाट मासिक पारिश्रमिक, पेन्सन वा यस्तै प्रकारका कुनै अन्य
                                सुविधा पाएको छैन। व्यहोरा ठीक साँचो हो, झुठो ठहरे प्रचलित कानुन बमोजिम सहुँला बुझाउँला।

                            </p>
                            <div class="d-flex">
                                लक्षित समूह:
                                <select name="category" id="">
                                    <option selected="{{ $data->category }}">{{ $data->category }}</option>
                                    <option value="jestha nagarik 1">जेष्ठ नागरिक (दलित)</option>
                                    <option value="jestha nagarik 2">जेष्ठ नागरिक (दलित)</option>
                                    <option value="jestha nagarik 3">जेष्ठ नागरिक (दलित)</option>
                                    <option value="jestha nagarik 4">जेष्ठ नागरिक (दलित)</option>
                                </select>
                            </div>
                            @error('category')
                                <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                            <p class="my-1">
                                (उपयुक्त कुने एकमा चिन्ह लगाउने)
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-left my-2">
                                        <b>
                                            <u>
                                                निवेदक
                                            </u>
                                        </b>
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">

                                            नाम, थर: <input type="text" value="{{ $data->name }}" name="name" id="">
                                            @error('name')
                                                <p class="text-danger my-1">{{ $message }}</p>
                                            @enderror
                                            <br><br>
                                            बाबुको नाम: <input type="text" value="{{ $data->father_name }}"
                                                name="father_name" id="">
                                            @error('father_name')
                                                <p class="text-danger my-1">{{ $message }}</p>
                                            @enderror
                                            <br><br>
                                            ठेगाना: <input type="text" value="{{ $data->address }}" name="address" id="">
                                            @error('address')
                                                <p class="text-danger my-1">{{ $message }}</p>
                                            @enderror
                                            <br><br>
                                            ना.प्र.नं.: <input type="text" value="{{ $data->citizenship_number }}"
                                                name="citizenship_number" id="">
                                            @error('citizenship_number')
                                                <p class="text-danger my-1">{{ $message }}</p>
                                            @enderror
                                            <br><br>
                                            जेस नागरिकको हकमा उमेर परेको मिती:<input type=""
                                                value="{{ $data->date_of_old_age_citizen }}" name="date_of_old_age_citizen"
                                                id="">
                                            @error('date_of_old_age_citizen')
                                                <p class="text-danger my-1">{{ $message }}</p>
                                            @enderror
                                            <br><br>
                                            पतिको मृत्यु दर्ता नम्बर : <input type="text"
                                                value="{{ $data->widow_spouse_name }}" name="widow_spouse_name" id="">
                                            @error('widow_spouse_name')
                                                <p class="text-danger my-1">{{ $message }}</p>
                                            @enderror
                                            <br><br>
                                            दस्तखत: <input type="text" value="{{ $data->signature }}" name="signature"
                                                id="">
                                            @error('signature')
                                                <p class="text-danger my-1">{{ $message }}</p>
                                            @enderror
                                            <br><br>
                                        </div>
                                        <div class="col-md-6">
                                            लिङ्ग: <select name="gender" id="">
                                                <option selected="{{ $data->gender }}">{{ $data->gender }}</option>
                                                <option value="male1">पुरुष</option>
                                                <option value="male2">पुरुष</option>
                                                <option value="male3">पुरुष</option>
                                                <option value="male">पुरुष</option>
                                            </select>
                                            @error('gender')
                                                <p class="text-danger my-1">{{ $message }}</p>
                                            @enderror
                                            <br><br>
                                            आमाको नाम: <input value="{{ $data->mother_name }}" type="text"
                                                name="mother_name" id="">
                                            @error('mother_name')
                                                <p class="text-danger my-1">{{ $message }}</p>
                                            @enderror
                                            <br><br>
                                            जन्ममिति: <input value="{{ $data->date_of_birth }}" type="date"
                                                name="date_of_birth" id="">
                                            @error('date_of_birth')
                                                <p class="text-danger my-1">{{ $message }}</p>
                                            @enderror
                                            <br><br>
                                            जार जिल्ला: <input value="{{ $data->issued_district }}" type="text"
                                                name="issued_district" id="">
                                            @error('issued_district')
                                                <p class="text-danger my-1">{{ $message }}</p>
                                            @enderror
                                            <br><br>
                                            सम्पर्क मोबाईल न: <input value="{{ $data->contact_number }}" type="number"
                                                name="contact_number" id="">
                                            @error('contact_number')
                                                <p class="text-danger my-1">{{ $message }}</p>
                                            @enderror
                                            <br><br>
                                            पतिको मृत्यु मिति: <input value="{{ $data->window_spouse_death_date }}"
                                                type="date" name="window_spouse_death_date" id="">
                                            @error('window_spouse_death_date')
                                                <p class="text-danger my-1">{{ $message }}</p>
                                            @enderror
                                            <br><br>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container border border-dark py-3">
                <p class="text-center"><b> <u>कार्यालय प्रयोजनको लागि</u></b></p>
                नाम दर्ता निर्णय मिति: <input value="{{ $data->registered_date }}" type="date" name="registered_date"
                    id="">
                @error('registered_date')
                    <p class="text-danger my-1">{{ $message }}</p>
                @enderror
                <br><br>

                भत्ताको किसिम: <input type="text" value="{{ $data->type }}" name="type" id="">
                @error('type')
                    <p class="text-danger my-1">{{ $message }}</p>
                @enderror
                <br><br>

                परिचय पत्र नं.: <input type="text" value="{{ $data->card_number }}" name="card_number" id="">
                @error('card_number')
                    <p class="text-danger my-1">{{ $message }}</p>
                @enderror
                <br><br>

                भत्ता पाउने सुरु मिति: आ.व. <input type="text" value="{{ $data->bhatta_started_date }}"
                    name="bhatta_started_date" id=""> को <select name="month_type" id="">
                    <option selected="{{ $data->month_type }}">{{ $data->month_type }}</option>
                    <option value="1 month"> पहिलो</option>
                    <option value="2 month"> पहिलो</option>
                    <option value="3 month"> पहिलो</option>
                    <option value="4 month"> पहिलो</option>
                </select> चौमासिकदेखि
                @error('bhatta_started_date')
                    <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>
            <hr>
            <p>निवेदकको विवरण</p>
            <div class="container border border-dark py-3">
                निवेदकको नाम:<br> <input type="text" value="{{ $data->applicant_name }}" name="applicant_name" id="">
                @error('applicant_name')
                    <p class="text-danger my-1">{{ $message }}</p>
                @enderror
                <br><br>

                निवेदकको ठेगाना
                <br> <input type="text" name="applicant_address" value="{{ $data->applicant_address }}" id="">
                @error('applicant_address')
                    <p class="text-danger my-1">{{ $message }}</p>
                @enderror
                <br><br>

                निवेटकको नागरिकता न.
                <br>
                <input type="text" name="applicant_citizenship_no" value="{{ $data->applicant_citizenship_no }}" id="">
                @error('applicant_citizenship_no')
                    <p class="text-danger my-1">{{ $message }}</p>
                @enderror
                <br><br>

                निवेदकको फोन नं.
                <input type="text" name="applicant_contact" value="{{ $data->applicant_contact }}" id="">
                @error('applicant_contact')
                    <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <button class="btn btn-dark align-center">रेकर्ड सेभ र प्रिन्ट गर्नुहोस |
            </div>
            </button>
            <br>
        </div>
    </form>
@endsection
@section('custom-script')
@endsection
