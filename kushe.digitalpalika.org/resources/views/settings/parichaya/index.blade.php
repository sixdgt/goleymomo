@extends('layouts.main')

@section('title')
डिजिटल पालिका | परिचय
@endsection

@section('content')
<!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />

<div class="card">
    <div class="card-header">
        परिचय र विवरण
    </div>
    <div class="card-body">
        <section>
            <div id="smartwizard">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#step-1">
                            परिचय र विवरण
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#step-2">
                            भूगोल र सीमा
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#step-3">
                            जनसांख्यिकी, धर्म र संस्कृति
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#step-4">
                            वास्तुकला, शहर दृश्य र पर्यटन क्षेत्र
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#step-5">
                            जनसंख्या, शिक्षा, स्वास्थ्य सेवा र यातायात
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <form action="{{ route('parichaya.store') }}" method="post">

                        @csrf
                        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                            <div class="form-group p-3">
                                <input type="text" class="form-control" name="dp_gn_name" placeholder="गाउँपालिकाको नाम...">
                            </div>
                            <div class="form-group p-3">
                                <textarea class="form-control" name="dp_gn_history" rows="3" placeholder="गाउँपालिकाको बारैमा लेख्नुहोस्..."></textarea>
                            </div>
                        </div>

                        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">

                            <div class="row p-3">
                                <div class="col">
                                    <input type="text" name="dp_gn_long" class="form-control" placeholder="longitude उल्लेख गर्नुहोस्...">
                                </div>
                                <div class="col">
                                    <input type="text" name="dp_gn_lat" class="form-control" placeholder="latitude उल्लेख गर्नुहोस्...">
                                </div>
                            </div>

                            <div class="form-group p-3">
                                <textarea class="form-control" name="dp_gn_boundary" rows="3" placeholder="गाउँपालिकाको सिमा उल्लेख गर्नुहोस्..."></textarea>
                            </div>
                            <div style="width: 100%"><iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Kumari%20Galli%202,%20Kathmandu%2044600+(Mind%20Risers%20Consortium%20Pvt.%20Ltd.)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="200" frameborder="0"><a href="http://www.gps.ie/">truck gps</a></iframe></div>
                        </div>

                        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                            <div class="form-group p-3">
                                <textarea class="form-control" name="dp_gn_demographics" rows="3" placeholder="गाउँपालिकाको जनसांख्यिकी विवरण उल्लेख गर्नुहोस्..."></textarea>
                            </div>
                            <div class="form-group p-3">
                                <textarea class="form-control" name="dp_gn_religion" rows="3" placeholder="गाउँपालिकाको धर्म विवरण उल्लेख गर्नुहोस्..."></textarea>
                            </div>
                            <div class="form-group p-3">
                                <textarea class="form-control" name="dp_gn_culture" rows="3" placeholder="गाउँपालिकाको संस्कृति विवरण उल्लेख गर्नुहोस्..."></textarea>
                            </div>
                        </div>

                        <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                            <div class="form-group p-3">
                                <textarea class="form-control" name="dp_gn_architecture" rows="3" placeholder="गाउँपालिकाको वास्तुकलाको विवरण उल्लेख गर्नुहोस..."></textarea>
                            </div>
                            <div class="form-group p-3">
                                <textarea class="form-control" name="dp_gn_city_scape" rows="3" placeholder="Write the city scape..."></textarea>
                            </div>
                            <div class="form-group p-3">
                                <textarea class="form-control" name="dp_gn_tourism_area" rows="3" placeholder="गाउँपालिकाको पर्यटक क्षेत्रको विवरण उल्लेख गर्नुहोस..."></textarea>
                            </div>
                        </div>

                        <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
                            <div class="form-group p-3">
                                <textarea class="form-control" name="dp_gn_population" rows="3" placeholder="गाउँपालिकाको जनसंख्याको विवरण उल्लेख गर्नुहोस..."></textarea>
                            </div>
                            <div class="form-group p-3">
                                <textarea class="form-control" name="dp_gn_education" rows="3" placeholder="गाउँपालिकाको शिक्षाको विवरण उल्लेख गर्नुहोस..."></textarea>
                            </div>
                            <div class="form-group p-3">
                                <textarea class="form-control" name="dp_gn_healthcare" rows="3" placeholder="गाउँपालिकाको स्वास्थ्य सेवाको विवरण उल्लेख गर्नुहोस..."></textarea>
                            </div>
                            <div class="form-group p-3">
                                <textarea class="form-control" name="dp_gn_transport" rows="3" placeholder="गाउँपालिकाको यातायातको विवरण उल्लेख गर्नुहोस..."></textarea>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Submit" id="btnSubmit">
                        </div>

                    </form>
                </div>

            </div>
        </section>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#smartwizard').smartWizard();

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-submit").click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var email = $("#email").val();
            var pswd = $("#pwd").val();
            var address = $("#address").val();

            $.ajax({
                url: "#",
                type:'POST',
                data: {_token:_token, email:email, pswd:pswd,address:address},
                success: function(data) {
                  console.log(data.error)
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
        }); 

        function printErrorMsg (msg) {
            $.each( msg, function( key, value ) {
            console.log(key);
              $('.'+key+'_err').text(value);
            });
        }
    });

</script>

<script type="text/javascript">
$('#smartwizard').smartWizard({
  selected: 0, // Initial selected step, 0 = first step
  theme: 'default', // theme for the wizard, related css need to include for other than default theme
  justified: true, // Nav menu justification. true/false
  darkMode:false, // Enable/disable Dark Mode if the theme supports. true/false
  autoAdjustHeight: true, // Automatically adjust content height
  cycleSteps: false, // Allows to cycle the navigation of steps
  backButtonSupport: true, // Enable the back button support
  enableURLhash: true, // Enable selection of the step based on url hash
  transition: {
      animation: 'none', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
      speed: '400', // Transion animation speed
      easing:'' // Transition animation easing. Not supported without a jQuery easing plugin
  },
  toolbarSettings: {
      toolbarPosition: 'bottom', // none, top, bottom, both
      toolbarButtonPosition: 'right', // left, right, center
      showNextButton: true, // show/hide a Next button
      showPreviousButton: true, // show/hide a Previous button
      toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
  },
  anchorSettings: {
      anchorClickable: true, // Enable/Disable anchor navigation
      enableAllAnchors: false, // Activates all anchors clickable all times
      markDoneStep: true, // Add done state on navigation
      markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
      removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
      enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
  },
  keyboardSettings: {
      keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
      keyLeft: [37], // Left key code
      keyRight: [39] // Right key code
  },
  lang: { // Language variables for button
      next: 'अर्को',
      previous: 'पछि'
  },
  disabledSteps: [], // Array Steps disabled
  errorSteps: [], // Highlight step with errors
  hiddenSteps: [] // Hidden steps
});
</script>
@endsection


