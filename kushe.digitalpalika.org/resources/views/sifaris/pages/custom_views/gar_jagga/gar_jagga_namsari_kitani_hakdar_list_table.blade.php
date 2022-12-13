
<table class="page_table" id="gar_jagga_namsari_kitani_hakdar_list_table" border="1">
    <thead>
    <tr>
        <th>क्र.स.</th>
        <th>हकदारहरूको नाम</th>
        <th>नाता</th>
        <th>वाबु/पतिको नाम</th>
        <th>नागरिकता नं.</th>
        <th>कैफियत</th>
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

    @if(isset($alive_hakdars) && isset($view_only))
        @foreach($alive_hakdars as $key=>$alive_hakdar)
            <tr id="tr1">
                <td>{{$key+1}} </td>
                <td>
                    <span>{{$alive_hakdar->hakdar_name}}</span>
                </td>
                <td>
                    <span>{{$alive_hakdar->hakdar_relationship}}</span>
                </td>
                <td>
                    <span>{{$alive_hakdar->hakdar_father_name}}</span>
                </td>
                <td>
                    <span>{{$alive_hakdar->hakdar_citizenship_no}}</span>
                </td>
                <td> </td>
            </tr>
        @endforeach
    @endif


    </tbody>
    <tfoot>
    @if(!isset($view_only))
        <tr>

            <td colspan="6">

                <div class='btn' id="gar_jagga_jibit_hakdar_table_add_row"><i class="fas fa-plus-square"></i></div>

            </td>
        </tr>
    @endif
    </tfoot>
</table>
