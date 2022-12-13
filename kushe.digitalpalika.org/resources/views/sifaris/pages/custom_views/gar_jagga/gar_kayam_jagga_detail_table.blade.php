
<table class="page_table" id="gar_kayam_jagga_detail_list_table" border="1">
    <thead>
    <tr>
        <th rowspan="2">क्र.स.</th>
        <th colspan="2">साविक</th>

        <th colspan="2">हाल</th>

        <th rowspan="2">सिट नकि.नं.</th>
        <th rowspan="2">क्षेत्रफल</th>
        <th rowspan="2">घर निर्माण भएको साल /अनुमति लिएको</th>

    </tr>
    <tr>

        <th>
            @if(isset($view_only))
                <span>@isset($model){{$model->table_sabic_local_office_type}}@endisset</span>
            @else
                <select id="" class="input-text" name="table_sabic_local_office_type">

                    <option></option>
                    <option value="गा.वि.स" {{ (old('table_sabic_local_office_type')=='गा.वि.स') ? "selected": ""}} @isset($model){{($model->table_sabic_local_office_type=='गा.वि.स') ? "selected": ""}}@endisset>गा.वि.स</option>
                    <option value="नगरपालिका" {{ (old('table_sabic_local_office_type')=='नगरपालिका') ? "selected": "" }}  @isset($model){{($model->table_sabic_local_office_type=='नगरपालिका') ? "selected": ""}}@endisset>नगरपालिका</option>
                </select>
                <span class="text-danger " id="error_table_sabic_local_office_type">@error('table_sabic_local_office_type')({{$message}})@enderror</span>
            @endif
        </th>
        <th>
            वडा न॑
        </th>
        <th>
            @if(isset($view_only))
                <span>@isset($model){{$model->table_current_palika_type}}@endisset</span>
            @else
                <select id="" class="input-text" name="table_current_palika_type">

                    <option></option>
                    <option value="गाउँपालिका" {{ (old('table_current_palika_type')=='गाउँपालिका') ? "selected": ""}} @isset($model){{($model->table_current_palika_type=='गाउँपालिका') ? "selected": ""}}@endisset>गाउँपालिका</option>
                    <option value="नगरपालिका" {{ (old('table_current_palika_type')=='नगरपालिका') ? "selected": ""}} @isset($model){{($model->table_current_palika_type=='नगरपालिका') ? "selected": ""}}@endisset>नगरपालिका</option>
                </select>
                <span class="text-danger " id="error_table_current_palika_type">@error('table_current_palika_type')({{$message}})@enderror</span>
            @endif
        </th>
        <th>
            वडा न॑
        </th>


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

    @if(isset($gar_kayam_jagga_details) && isset($view_only))
        @foreach($gar_kayam_jagga_details as $key=>$gar_kayam_jagga_detail)
            <tr id="tr1">
                <td>{{$key+1}} </td>
                <td>
                    <span>{{$gar_kayam_jagga_detail->sabic_local_office_name}}</span>
                </td>
                <td>
                    <span>{{$gar_kayam_jagga_detail->sabic_local_ward_no}}</span>
                </td>
                <td>
                    <span>{{$gar_kayam_jagga_detail->current_palika_name}}</span>
                </td>
                <td>
                    <span>{{$gar_kayam_jagga_detail->current_palika_no}}</span>
                </td>
                <td>
                    <span>{{$gar_kayam_jagga_detail->sit_no_or_kitta_no}}</span>
                </td>
                <td>
                    <span>{{$gar_kayam_jagga_detail->jagga_area}}</span>
                </td>
                <td>
                    <span>{{$gar_kayam_jagga_detail->gar_developed_year}}</span>
                </td>
            </tr>
        @endforeach
    @endif


    </tbody>
    <tfoot>
    @if(!isset($view_only))
        <tr>

            <td colspan="8">

                <div class='btn' id="gar_kayam_jagga_detail_table_add_row"><i class="fas fa-plus-square"></i></div>

            </td>
        </tr>
    @endif
    </tfoot>
</table>

