
<table class="page_table" id="gar_jagga_detail_list_table" border="1">
    <thead>
    <tr>
        <th>क्र.स.</th>
        <th>स्थानीय तह</th>
        <th>क्षेत्रफल</th>
        <th>कित्ता नं.</th>
        <th>कैफियत</th>
{{--        <th></th>--}}
    </tr>

    </thead>
    <tbody id="tbody" data-row_no="0">
    {{--                <tr id="tr1">--}}
    {{--                    <td>1</td>--}}
    {{--                    <td>--}}
    {{--                        <input class="input-text" id="" name="land_area[]" type="text" placeholder="क्षेत्रफल" value="">--}}
    {{--                    </td>--}}
    {{--                    <td>--}}
    {{--                        <input class="input-text" id="" name="land_area[]" type="text" placeholder="भूमिको स्थान" value="">--}}
    {{--                    </td>--}}
    {{--                    <td>--}}
    {{--                        <button class="delete_table_row" data-id="1"><i class="fas fa-times-circle"></i></button>--}}

    {{--                    </td>--}}
    {{--                </tr>--}}

    @if(isset($gar_jagga_details) && isset($view_only))
        @foreach($gar_jagga_details as $key=>$gar_jagga_detail)
            <tr id="tr1">
                <td>{{$key+1}} </td>
                <td>
                    <span>{{$gar_jagga_detail->palika_name}},</span>

                    <span>{{$gar_jagga_detail->palika_ward_no}}</span>
                </td>
                <td>
                    <span>{{$gar_jagga_detail->jagga_area}}</span>
                </td>
                <td>
                    <span>{{$gar_jagga_detail->kitta_no}}</span>
                </td>
                <td style="width: 150px"></td>

            </tr>
        @endforeach
    @endif


    </tbody>
    <tfoot>
    @if(!isset($view_only))
        <tr>

            <td colspan="8">

                <div class='btn' id="gar_jagga_detail_table_add_row"><i class="fas fa-plus-square"></i></div>

            </td>
        </tr>
    @endif
    </tfoot>
</table>


