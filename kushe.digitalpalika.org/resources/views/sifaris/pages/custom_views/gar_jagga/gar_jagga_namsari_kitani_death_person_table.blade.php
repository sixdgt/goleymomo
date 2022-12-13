<table class="page_table" id="" border="1">
    <thead>
    <tr>
        <th>क्र.स.</th>
        <th> नाम थर </th>
        <th> नाता </th>
        <th> मृत्यु मिति </th>
    </tr>
    </thead>
    <tbody id="tbody" data-row_no="0">
                    <tr id="tr1" >
                        <td>1</td>
                        <td>
                            <input style="text-align: center" class="input-text" id="" name="table_death_person_name" type="text" placeholder="नाम थर" value="{{old('table_death_person_name')}}@isset($model){{$model->table_death_person_name}}@endisset">
                            <span class="text-danger " id="error_table_death_person_name">@error('table_death_person_name')({{$message}})@enderror</span>
                        </td>
                        <td>
                            <input style="text-align: center" class="input-text" id="" name="table_relation_with_death_person" type="text" placeholder="नाता" value="{{old('table_relation_with_death_person')}} @isset($model){{$model->table_death_person_name}}@endisset">
                            <span class="text-danger " id="error_table_relation_with_death_person">@error('table_relation_with_death_person')({{$message}})@enderror</span>
                        </td>
                        <td>
                            <input style="text-align: center" class="input-text date-picker" id="" name="table_death_date" type="text" placeholder="" value="{{old('table_death_date')}}@isset($model){{$model->table_death_person_name}} @endisset">
                            <span class="text-danger " id="error_table_death_date">@error('table_table_death_date')({{$message}})@enderror</span>
                        </td>
                    </tr>




{{--            <tr id="tr1">--}}
{{--                <td>{{$key+1}} </td>--}}
{{--                <td>--}}
{{--                    <span>{{$bipanna_nibedan_jagga->jagga_area}}</span>--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    <span>{{$bipanna_nibedan_jagga->jagga_location}}</span>--}}
{{--                </td>--}}
{{--                <td> </td>--}}
{{--            </tr>--}}



    </tbody>



</table>
