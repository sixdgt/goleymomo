@extends('layouts.main')

@section('title')
डिजिटल पालिका | योजनाको चरन सेटिङ
@endsection

@section('content')

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
    }

    .yojana_navbar {
        overflow: hidden;
        background-color: #44a64b;
    }

    .yojana_navbar a {
        float: left;
        font-size: 14px;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .subnav {
        float: left;
        overflow: hidden;
    }

    .subnav .subnavbtn {
        font-size: 14px !important;
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    .yojana_navbar a:hover, .subnav:hover .subnavbtn {
        background-color: #1b25b9;
    }

    .subnav-content {
        display: none;
        position: absolute;
        left:15px;
        background-color: #1b25b9;
        width: 97%;
        z-index: 1;
    }

    .subnav-content a {
        float: left;
        color: white;
        text-decoration: none;
    }

    .subnav-content a:hover {
        background-color: #44a64b;
        color: black;
    }

    .subnav:hover .subnav-content {
        display: block;
    }

    i {
        color: white !important;
    }

    .asterik {
        color: red;
    }

    form {
        box-shadow: 0 0 0 rgba(240,240,240,0);
    }

    .card {
        box-shadow: 0 10px 25px rgba(92,99,105,.2);
    }

    .btns {
        font-size: 1rem !important;
        border-radius: 0px !important;
    }

    .card-header, .modal-header {
        background-color: #44a64b !important;
        color: #fff;
        text-align: center;
    }

    .modal-title {
        text-align: center;
    }
</style>
<div class="yojana_navbar">
    <a href="{{ route('yojana.index') }}"><i class="fas fa-arrow-left fs-2x"></i></a>
    <div class="subnav">
      <button class="subnavbtn">बिषयगत क्षेत्र<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('subjective-area.create') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('subjective-area.index') }}">बिषयगत क्षेत्र</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">बिषयगत उप-क्षेत्र<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('subjective-sub-area.create') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('subjective-sub-area.index') }}">बिषयगत उप-क्षेत्र</a>
        </div>
    </div>
    <div class="subnav">
      <button class="subnavbtn">बिषयगत उप-क्षेत्र प्रकार<i class="fa fa-caret-down"></i></button>
      <div class="subnav-content">
        <a href="{{ route('subjective-subarea-type.create') }}">नयाँ थप गर्नुहोस</a>
        <a href="{{ route('subjective-subarea-type.index') }}">बिषयगत उप-क्षेत्र प्रकार</a>
      </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">चरन<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('process-level.create') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('process-level.index') }}">चरन</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">श्रोत<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('sources.create') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('sources.index') }}">श्रोत</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">बिभाग छान्नुहोस्<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('department.create') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('department.index') }}">बिभाग छान्नुहोस्</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">योजनाको स्थर<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('level.create') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('level.index') }}">योजनाको स्थर</a>
        </div>
    </div>
</div>

<section id="process-level-add-form" class="process-level-add-form">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <span class=>योजनाको चरनको विवरन समाबेश गर्नुहोस्</span>
                <span class="pull-right">
                </span>
                </div>
                <div class="card-body">
                    <form style="width: 100%;" id="add-form-process-level">
                    @csrf
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="plan_subjective_area">योजनाको चरनको नाम</label>
                                <input type="text" name="plan_subjective_area" placeholder="योजनाको चरनको नाम भर्नुहोस">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="alert alert-danger">नोट: क्रिपया आवश्यक सम्पूर्ण जानकारीहरु भर्नु होला |</div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary btns" type="submit" id="btn-save"><i class="fas fa-save"></i> सेभ</button>
                                <a href="{{ route('process-level.index') }}" class="btn btn-sm btn-primary btns" id="btn-back"><i class="fas fa-backspace"></i> पछाडी</a>
                                <button class="btn btn-sm btn-primary btns"><i class="fas fa-undo-alt"></i> रिसेट</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
@endsection

@section('custom_script')

    
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="application_doc"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);
</script>
@endsection
