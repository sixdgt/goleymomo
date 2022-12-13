
<table class="page_table" id="char_killa_tapasil_list_table" border="1">
    <thead>
    <tr>
        <th>क्र.स.</th>
        <th>क्षेत्र</th>
        <th>कित्ता नं.</th>
        <th>सिट नं.</th>
        <th>क्षेत्रफल</th>
        <th>पूर्व</th>
        <th>पश्चिम</th>
        <th>उत्तर</th>
        <th>दक्षिण</th>
        <th>कैफियत</th>

        {{--        <th></th>--}}
    </tr>

    </thead>
    <tbody id="tbody" data-row_no="0">

    @if(isset($char_killa_tapasils) && isset($view_only))
        @foreach($char_killa_tapasils as $key=>$char_killa_tapasil)
            <tr id="tr1">
                <td>{{$key+1}} </td>
                <td>
                    <span>{{$char_killa_tapasil->area}}</span>
                </td>
                <td>
                    <span>{{$char_killa_tapasil->kitta_no}}</span>
                </td>
                <td>
                    <span>{{$char_killa_tapasil->sit_no}}</span>
                </td>
                <td>
                    <span>{{$char_killa_tapasil->jagga_area}}</span>
                </td>
                <td>
                    <span>{{$char_killa_tapasil->east}}</span>
                </td>
                <td>
                    <span>{{$char_killa_tapasil->west}}</span>
                </td>
                <td>
                    <span>{{$char_killa_tapasil->north}}</span>
                </td>
                <td>
                    <span>{{$char_killa_tapasil->south}}</span>
                </td>
                <td style="width: 150px"></td>

            </tr>
        @endforeach
    @endif


    </tbody>
    <tfoot>
    @if(!isset($view_only))
        <tr>

            <td colspan="11">

                <div class='btn' id="char_killa_tapasil_table_add_row"><i class="fas fa-plus-square"></i></div>

            </td>
        </tr>
    @endif
    </tfoot>
</table>


