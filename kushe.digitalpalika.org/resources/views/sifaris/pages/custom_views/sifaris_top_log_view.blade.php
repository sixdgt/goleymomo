<div>

    <div class="div-logo" style="position:absolute;padding-left:20px;padding-top:30px;width: 100%;height: 95px;">
        <img src="{{getdataurl('parichayapatra/nep_gov_logo.jpg')}}" style="height: 90px; width: 90px;">
    </div>


</div>
@php

    function getdataurl($imagePath) {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($imagePath);
        return 'data:' . $type . ';base64,' . base64_encode(file_get_contents($imagePath));
    }

@endphp