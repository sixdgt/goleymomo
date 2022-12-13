
<table class="page_table" id="angikrit_nagarikta_son_table" border="1">
    <thead>
    <tr>
        <th>क्र.स.</th>
        <th> नाम </th>
        <th> </th>
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

    @if(isset($bipanna_nibedan_jaggas) && isset($view_only))
    @foreach($bipanna_nibedan_jaggas as $key=>$bipanna_nibedan_jagga)
    <tr id="tr1">
        <td>{{$key+1}} </td>
        <td>
            <span>{{$bipanna_nibedan_jagga->jagga_area}}</span>
        </td>
        <td>
            <span>{{$bipanna_nibedan_jagga->jagga_location}}</span>
        </td>
        <td> </td>
    </tr>
    @endforeach
    @endif


    </tbody>
    <tfoot>
    @if(!isset($view_only))
    <tr>

        <td colspan="4">

            <div class='btn' id="angikrit_nagarikta_son_add_row"><i class="fas fa-plus-square"></i></div>

        </td>
    </tr>
    @endif
    </tfoot>
</table>
<?php
