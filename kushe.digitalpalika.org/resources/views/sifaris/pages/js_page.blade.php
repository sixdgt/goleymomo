<script>








    //bipanna_nagarik_nibedan_table
    $(document).ready(function () {
        @isset($bipanna_nibedan_jaggas)
            @foreach($bipanna_nibedan_jaggas as $key=>$bipanna_nibedan_jagga)
                    // alert('dsaf')
                    add_row('{{$key+1}}','{{$bipanna_nibedan_jagga->jagga_area}}','{{$bipanna_nibedan_jagga->jagga_location}}');

            @endforeach
        @endisset
    })
    $(document).on('click','#bipanna_nagarik_nibedan_table_add_row',function (){
        var row_no=Number($('#tbody').data('row_no'))+1;
        add_row(row_no);
    })

    function add_row(row_no,area='',location='')
    {
        // alert(area)
        $('#bipanna_nagarik_nibedan_table').find('#tbody').append(
            '               <tr id="tr'+row_no+'">\n' +
            '                    <td id="td'+row_no+'">'+row_no+'</td>\n' +
            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="land_areas[]" type="text" placeholder="क्षेत्रफल" value="'+area+'">\n' +
                @else
                    '                <span>'+area+'</span>'+
                @endif
                    '                    </td>\n' +
            '                    <td>\n' +

                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="land_locations[]" type="text" placeholder="भूमिको स्थान" value="'+location+'">\n' +
                @else
                    '                <span>'+location+'</span>'+
                @endif
                    '                    </td>\n' +
                @if(!isset($view_only))
                    '                    <td>' +
            '                           <div class="delete_table_row btn" id="btn'+row_no+'" data-id="'+row_no+'"><i class="fas fa-times-circle"></i></div>' +
            '                     </td>'+
                @endif
                    '                </tr>'

        );
        $('#tbody').data('row_no',row_no)

    }

    $(document).on('click','#delete_table_row',function () {
        var id=$(this).data('id');
        $('#tr'+id).remove();
        var row_no=Number($('#bipanna_nagarik_nibedan_table').find('#tbody').data('row_no'))-1;
        $('#bipanna_nagarik_nibedan_table').find('#tbody').data('row_no',row_no);

        for(var i=Number(id);i<=row_no;i++)
        {
            var tr_no=i+1;
            $('#bipanna_nagarik_nibedan_table').find('#tr'+tr_no).attr('id','tr'+i);
            $('#bipanna_nagarik_nibedan_table').find('#td'+tr_no).html(i);
            $('#bipanna_nagarik_nibedan_table').find('#td'+tr_no).attr('id','td'+i);
            $('#bipanna_nagarik_nibedan_table').find('#btn'+tr_no).attr('data-id',i);
            $('#bipanna_nagarik_nibedan_table').find('#btn'+tr_no).attr('id','btn'+i);

        }
    })











    //angikrit_nagarikta_son_add
    $(document).ready(function () {
        @isset($bipanna_nibedan_jaggas)
        @foreach($bipanna_nibedan_jaggas as $key=>$bipanna_nibedan_jagga)
        // alert('dsaf')
        add_row('{{$key+1}}','{{$bipanna_nibedan_jagga->jagga_area}}','{{$bipanna_nibedan_jagga->jagga_location}}');

        @endforeach
        @endisset
    })
    $(document).on('click','#angikrit_nagarikta_son_add_row',function (){
        var row_no=Number( $('#angikrit_nagarikta_son_table').find('#tbody').data('row_no'))+1;
        angikrit_nagarikta_son_add(row_no);
    })

    function angikrit_nagarikta_son_add(row_no,area='',location='')
    {
        // alert(area)
        $('#angikrit_nagarikta_son_table').find('#tbody').append(
            '               <tr id="tr'+row_no+'">\n' +
            '                    <td id="td'+row_no+'">'+row_no+'</td>\n' +
            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="current_family_sons[]" type="text" placeholder="नाम " value="'+area+'">\n' +
                @else
                    '                <span>'+area+'</span>'+
                @endif
                    '                    </td>\n' +

                @if(!isset($view_only))
                    '                    <td>' +
                    '                           <div class="delete_angikrit_nagarikta_son_table_row btn" id="btn'+row_no+'" data-id="'+row_no+'"><i class="fas fa-times-circle"></i></div>' +
                    '                     </td>'+
                @endif
                    '                </tr>'

        );
        $('#angikrit_nagarikta_son_table').find('#tbody').data('row_no',row_no)

    }

    $(document).on('click','.delete_angikrit_nagarikta_son_table_row',function () {
        var id=$(this).data('id');
        $('#angikrit_nagarikta_son_table').find('#tr'+id).remove();
        var row_no=Number($('#angikrit_nagarikta_son_table').find('#tbody').data('row_no'))-1;
        $('#angikrit_nagarikta_son_table').find('#tbody').data('row_no',row_no);

        for(var i=Number(id);i<=row_no;i++)
        {
            var tr_no=i+1;
            $('#angikrit_nagarikta_son_table').find('#tr'+tr_no).attr('id','tr'+i);
            $('#angikrit_nagarikta_son_table').find('#td'+tr_no).html(i);
            $('#angikrit_nagarikta_son_table').find('#td'+tr_no).attr('id','td'+i);
            $('#angikrit_nagarikta_son_table').find('#btn'+tr_no).attr('data-id',i);
            $('#angikrit_nagarikta_son_table').find('#btn'+tr_no).attr('id','btn'+i);

        }
    })
















    //angikrit_nagarikta_daughter_add
    $(document).ready(function () {
        @isset($bipanna_nibedan_jaggas)
        @foreach($bipanna_nibedan_jaggas as $key=>$bipanna_nibedan_jagga)
        // alert('dsaf')
        add_row('{{$key+1}}','{{$bipanna_nibedan_jagga->jagga_area}}','{{$bipanna_nibedan_jagga->jagga_location}}');

        @endforeach
        @endisset
    })
    $(document).on('click','#angikrit_nagarikta_daughter_add_row',function (){
        var row_no=Number($('#angikrit_nagarikta_daughter_table').find('#tbody').data('row_no'))+1;
        angikrit_nagarikta_daughter_add(row_no);
    })

    function angikrit_nagarikta_daughter_add(row_no,area='',location='')
    {
        // alert(area)
        $('#angikrit_nagarikta_daughter_table').find('#tbody').append(
            '               <tr id="tr'+row_no+'">\n' +
            '                    <td id="td'+row_no+'">'+row_no+'</td>\n' +
            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="current_family_daughters[]" type="text" placeholder="नाम " value="'+area+'">\n' +
                @else
                    '                <span>'+area+'</span>'+
                @endif
                    '                    </td>\n' +

                @if(!isset($view_only))
                    '                    <td>' +
            '                           <div class="delete_angikrit_nagarikta_daughter_table_row btn" id="btn'+row_no+'" data-id="'+row_no+'"><i class="fas fa-times-circle"></i></div>' +
            '                     </td>'+
                @endif
                    '                </tr>'

        );
        $('#angikrit_nagarikta_daughter_table').find('#tbody').data('row_no',row_no)

    }

    $(document).on('click','.delete_angikrit_nagarikta_daughter_table_row',function () {
        var id=$(this).data('id');
        $('#angikrit_nagarikta_daughter_table').find('#tr'+id).remove();
        var row_no=Number($('#angikrit_nagarikta_daughter_table').find('#tbody').data('row_no'))-1;
        $('#angikrit_nagarikta_daughter_table').find('#tbody').data('row_no',row_no);

        for(var i=Number(id);i<=row_no;i++)
        {
            var tr_no=i+1;
            $('#angikrit_nagarikta_daughter_table').find('#tr'+tr_no).attr('id','tr'+i);
            $('#angikrit_nagarikta_daughter_table').find('#td'+tr_no).html(i);
            $('#angikrit_nagarikta_daughter_table').find('#td'+tr_no).attr('id','td'+i);
            $('#angikrit_nagarikta_daughter_table').find('#btn'+tr_no).attr('data-id',i);
            $('#angikrit_nagarikta_daughter_table').find('#btn'+tr_no).attr('id','btn'+i);
        }
    })







    //angikrit_nagarikta_husband_wife_add
    $(document).ready(function () {
        @isset($bipanna_nibedan_jaggas)
        @foreach($bipanna_nibedan_jaggas as $key=>$bipanna_nibedan_jagga)
        // alert('dsaf')
        add_row('{{$key+1}}','{{$bipanna_nibedan_jagga->jagga_area}}','{{$bipanna_nibedan_jagga->jagga_location}}');

        @endforeach
        @endisset
    })
    $(document).on('click','#angikrit_nagarikta_husband_wife_add_row',function (){
        var row_no=Number( $('#angikrit_nagarikta_husband_wife_table').find('#tbody').data('row_no'))+1;
        angikrit_nagarikta_husband_wife_add(row_no);
    })

    function angikrit_nagarikta_husband_wife_add(row_no,area='',location='')
    {
        // alert(area)
        $('#angikrit_nagarikta_husband_wife_table').find('#tbody').append(
            '               <tr id="tr'+row_no+'">\n' +
            '                    <td id="td'+row_no+'">'+row_no+'</td>\n' +
            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="current_family_husband_wife[]" type="text" placeholder="नाम " value="'+area+'">\n' +
                @else
                    '                <span>'+area+'</span>'+
                @endif
                    '                    </td>\n' +

                @if(!isset($view_only))
                    '                    <td>' +
            '                           <div class="delete_angikrit_nagarikta_husband_wife_table_row btn" id="btn'+row_no+'" data-id="'+row_no+'"><i class="fas fa-times-circle"></i></div>' +
            '                     </td>'+
                @endif
                    '                </tr>'

        );
        $('#angikrit_nagarikta_husband_wife_table').find('#tbody').data('row_no',row_no)

    }

    $(document).on('click','.delete_angikrit_nagarikta_husband_wife_table_row',function () {
        var id=$(this).data('id');
        $('#angikrit_nagarikta_husband_wife_table').find('#tr'+id).remove();
        var row_no=Number($('#angikrit_nagarikta_husband_wife_table').find('#tbody').data('row_no'))-1;
        $('#angikrit_nagarikta_husband_wife_table').find('#tbody').data('row_no',row_no);

        for(var i=Number(id);i<=row_no;i++)
        {
            var tr_no=i+1;
            $('#angikrit_nagarikta_husband_wife_table').find('#tr'+tr_no).attr('id','tr'+i);
            $('#angikrit_nagarikta_husband_wife_table').find('#td'+tr_no).html(i);
            $('#angikrit_nagarikta_husband_wife_table').find('#td'+tr_no).attr('id','td'+i);
            $('#angikrit_nagarikta_husband_wife_table').find('#btn'+tr_no).attr('data-id',i);
            $('#angikrit_nagarikta_husband_wife_table').find('#btn'+tr_no).attr('id','btn'+i);

        }
    })


















    //gar_jagga_namsari_kitani_hakdar_list_table
    $(document).ready(function () {
        @isset($alive_hakdars)
        @foreach($alive_hakdars as $key=>$alive_hakdar)
        // alert('dsaf')
        gar_jagga_namsari_kitani_hakdar_list_add('{{$key+1}}','{{$alive_hakdar->hakdar_name}}','{{$alive_hakdar->hakdar_relationship}}','{{$alive_hakdar->hakdar_father_name}}','{{$alive_hakdar->hakdar_citizenship_no}}');

        @endforeach
        @endisset
    })
    $(document).on('click','#gar_jagga_jibit_hakdar_table_add_row',function (){
        var row_no=Number( $('#gar_jagga_namsari_kitani_hakdar_list_table').find('#tbody').data('row_no'))+1;
        gar_jagga_namsari_kitani_hakdar_list_add(row_no);
    })

    function gar_jagga_namsari_kitani_hakdar_list_add(row_no,hakdar_name='',hakdar_relationship_with='',hakdar_father_name='',hakdar_citizenship_no='',hakdar_sign='')
    {
        // alert(area)
        $('#gar_jagga_namsari_kitani_hakdar_list_table').find('#tbody').append(
            '               <tr id="tr'+row_no+'">\n' +
            '                    <td id="td'+row_no+'">'+row_no+'</td>\n' +
            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="alive_hakdar_name[]" type="text" placeholder="" value="'+hakdar_name+'">\n' +
                @else
                    '                <span>'+hakdar_name+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="alive_hakdar_relationship_with[]" type="text" placeholder="" value="'+hakdar_relationship_with+'">\n' +
                @else
                    '                <span>'+hakdar_relationship_with+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="alive_hakdar_father_name[]" type="text" placeholder="" value="'+hakdar_father_name+'">\n' +
                @else
                    '                <span>'+hakdar_father_name+'</span>'+
                @endif
                    '             </td>\n' +


            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="alive_hakdar_citizenship_no[]" type="text" placeholder="" value="'+hakdar_citizenship_no+'">\n' +
                @else
                    '                <span>'+hakdar_citizenship_no+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="alive_hakdar_sign[]" type="text" placeholder="" value="'+hakdar_sign+'">\n' +
                @else
                    '                <span>'+hakdar_sign+'</span>'+
                @endif
                    '             </td>\n' +


                @if(!isset($view_only))
                    '                    <td>' +
            '                           <div class="delete_gar_jagga_namsari_kitani_hakdar_list_table_row btn" id="btn'+row_no+'" data-id="'+row_no+'"><i class="fas fa-times-circle"></i></div>' +
            '                     </td>'+
                @endif
                    '                </tr>'

        );
        $('#gar_jagga_namsari_kitani_hakdar_list_table').find('#tbody').data('row_no',row_no)

    }

    $(document).on('click','.delete_gar_jagga_namsari_kitani_hakdar_list_table_row',function () {
        var id=$(this).data('id');
        $('#gar_jagga_namsari_kitani_hakdar_list_table').find('#tr'+id).remove();
        var row_no=Number($('#gar_jagga_namsari_kitani_hakdar_list_table').find('#tbody').data('row_no'))-1;
        $('#gar_jagga_namsari_kitani_hakdar_list_table').find('#tbody').data('row_no',row_no);

        for(var i=Number(id);i<=row_no;i++)
        {
            var tr_no=i+1;
            $('#gar_jagga_namsari_kitani_hakdar_list_table').find('#tr'+tr_no).attr('id','tr'+i);
            $('#gar_jagga_namsari_kitani_hakdar_list_table').find('#td'+tr_no).html(i);
            $('#gar_jagga_namsari_kitani_hakdar_list_table').find('#td'+tr_no).attr('id','td'+i);
            $('#gar_jagga_namsari_kitani_hakdar_list_table').find('#btn'+tr_no).attr('data-id',i);
            $('#gar_jagga_namsari_kitani_hakdar_list_table').find('#btn'+tr_no).attr('id','btn'+i);

        }
    })








    //gar_jagga_namsari_kitani_hakdar_list_table
    $(document).ready(function () {
        @isset($namsari_garine_hakdars)
        @foreach($namsari_garine_hakdars as $key=>$namsari_garine_hakdar)
        // alert('dsaf')
        gar_jagga_namsari_kitani_namsari_garine_hakdar_list_add('{{$key+1}}','{{$namsari_garine_hakdar->hakdar_name}}','{{$namsari_garine_hakdar->hakdar_relationship}}','{{$namsari_garine_hakdar->hakdar_father_name}}','{{$namsari_garine_hakdar->hakdar_citizenship_no}}');

        @endforeach
        @endisset
    })
    $(document).on('click','#gar_jagga_namsari_kitani_garine_hakdar_table_add_row',function (){
        var row_no=Number( $('#gar_jagga_namsari_kitani_namesari_garine_hakdar_list_table').find('#tbody').data('row_no'))+1;
        gar_jagga_namsari_kitani_namsari_garine_hakdar_list_add(row_no);
    })

    function gar_jagga_namsari_kitani_namsari_garine_hakdar_list_add(row_no,hakdar_name='',hakdar_relationship_with='',hakdar_father_name='',hakdar_citizenship_no='',hakdar_sign='')
    {
        // alert(area)
        $('#gar_jagga_namsari_kitani_namesari_garine_hakdar_list_table').find('#tbody').append(
            '               <tr id="tr'+row_no+'">\n' +
            '                    <td id="td'+row_no+'">'+row_no+'</td>\n' +
            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="namsari_garine_hakdar_name[]" type="text" placeholder="" value="'+hakdar_name+'">\n' +
                @else
                    '                <span>'+hakdar_name+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="namsari_garine_hakdar_relationship_with[]" type="text" placeholder="" value="'+hakdar_relationship_with+'">\n' +
                @else
                    '                <span>'+hakdar_relationship_with+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="namsari_garine_hakdar_father_name[]" type="text" placeholder="" value="'+hakdar_father_name+'">\n' +
                @else
                    '                <span>'+hakdar_father_name+'</span>'+
                @endif
                    '             </td>\n' +


            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="namsari_garine_hakdar_citizenship_no[]" type="text" placeholder="" value="'+hakdar_citizenship_no+'">\n' +
                @else
                    '                <span>'+hakdar_citizenship_no+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="namsari_garine_hakdar_sign[]" type="text" placeholder="" value="'+hakdar_sign+'">\n' +
                @else
                    '                <span>'+hakdar_sign+'</span>'+
                @endif
                    '             </td>\n' +


                @if(!isset($view_only))
                    '                    <td>' +
            '                           <div class="gar_jagga_namesari_kitani_garine_hakdar_table_delete_row btn" id="btn'+row_no+'" data-id="'+row_no+'"><i class="fas fa-times-circle"></i></div>' +
            '                     </td>'+
                @endif
                    '                </tr>'

        );
        $('#gar_jagga_namsari_kitani_namesari_garine_hakdar_list_table').find('#tbody').data('row_no',row_no)

    }

    $(document).on('click','.gar_jagga_namesari_kitani_garine_hakdar_table_delete_row',function () {
        var id=$(this).data('id');
        $('#gar_jagga_namsari_kitani_namesari_garine_hakdar_list_table').find('#tr'+id).remove();
        var row_no=Number($('#gar_jagga_namsari_kitani_namesari_garine_hakdar_list_table').find('#tbody').data('row_no'))-1;
        $('#gar_jagga_namsari_kitani_namesari_garine_hakdar_list_table').find('#tbody').data('row_no',row_no);

        for(var i=Number(id);i<=row_no;i++)
        {
            var tr_no=i+1;
            $('#gar_jagga_namsari_kitani_namesari_garine_hakdar_list_table').find('#tr'+tr_no).attr('id','tr'+i);
            $('#gar_jagga_namsari_kitani_namesari_garine_hakdar_list_table').find('#td'+tr_no).html(i);
            $('#gar_jagga_namsari_kitani_namesari_garine_hakdar_list_table').find('#td'+tr_no).attr('id','td'+i);
            $('#gar_jagga_namsari_kitani_namesari_garine_hakdar_list_table').find('#btn'+tr_no).attr('data-id',i);
            $('#gar_jagga_namsari_kitani_namesari_garine_hakdar_list_table').find('#btn'+tr_no).attr('id','btn'+i);

        }
    })



    //gar kayam jagga bibaran
    $(document).ready(function () {
        @isset($gar_kayam_jagga_details)
        @foreach($gar_kayam_jagga_details as $key=>$gar_kayam_jagga_detail)
        // alert('dsaf')
        gar_kayam_jagga_detail_row_add('{{$key+1}}','{{$gar_kayam_jagga_detail->sabic_local_office_name}}','{{$gar_kayam_jagga_detail->sabic_local_ward_no}}','{{$gar_kayam_jagga_detail->current_palika_name}}','{{$gar_kayam_jagga_detail->current_palika_no}}','{{$gar_kayam_jagga_detail->sit_no_or_kitta_no}}','{{$gar_kayam_jagga_detail->jagga_area}}','{{$gar_kayam_jagga_detail->gar_developed_year}}');

        @endforeach
        @endisset
    })
    $(document).on('click','#gar_kayam_jagga_detail_table_add_row',function (){
        var row_no=Number( $('#gar_kayam_jagga_detail_list_table').find('#tbody').data('row_no'))+1;
        gar_kayam_jagga_detail_row_add(row_no);
    })

    function gar_kayam_jagga_detail_row_add(row_no,sabic_local_office_name='',sabic_local_ward_no='',current_palika_name='',current_palika_no='',sit_no_or_kitta_no='',jagga_area='',gar_developed_year='')
    {
        // alert(area)
        $('#gar_kayam_jagga_detail_list_table').find('#tbody').append(
            '               <tr id="tr'+row_no+'">\n' +
            '                    <td id="td'+row_no+'">'+row_no+'</td>\n' +
            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="sabic_local_office_name[]" type="text" placeholder="" value="'+sabic_local_office_name+'">\n' +
                @else
                    '                <span>'+sabic_local_office_name+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="sabic_local_ward_no[]" type="text" placeholder="" value="'+sabic_local_ward_no+'">\n' +
                @else
                    '                <span>'+sabic_local_ward_no+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="current_palika_name[]" type="text" placeholder="" value="'+current_palika_name+'">\n' +
                @else
                    '                <span>'+current_palika_name+'</span>'+
                @endif
                    '             </td>\n' +


            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="current_palika_no[]" type="text" placeholder="" value="'+current_palika_no+'">\n' +
                @else
                    '                <span>'+current_palika_no+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="sit_no_or_kitta_no[]" type="text" placeholder="" value="'+sit_no_or_kitta_no+'">\n' +
                @else
                    '                <span>'+sit_no_or_kitta_no+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="jagga_area[]" type="text" placeholder="" value="'+jagga_area+'">\n' +
                @else
                    '                <span>'+jagga_area+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="gar_developed_year[]" type="text" placeholder="" value="'+gar_developed_year+'">\n' +
                @else
                    '                <span>'+gar_developed_year+'</span>'+
                @endif
                    '             </td>\n' +


                @if(!isset($view_only))
                    '                    <td>' +
            '                           <div class="gar_kayam_jagga_detail_table_delete_row btn" id="btn'+row_no+'" data-id="'+row_no+'"><i class="fas fa-times-circle"></i></div>' +
            '                     </td>'+
                @endif
                    '                </tr>'

        );
        $('#gar_kayam_jagga_detail_list_table').find('#tbody').data('row_no',row_no)

    }

    $(document).on('click','.gar_kayam_jagga_detail_table_delete_row',function () {
        var id=$(this).data('id');
        $('#gar_kayam_jagga_detail_list_table').find('#tr'+id).remove();
        var row_no=Number($('#gar_kayam_jagga_detail_list_table').find('#tbody').data('row_no'))-1;
        $('#gar_kayam_jagga_detail_list_table').find('#tbody').data('row_no',row_no);

        for(var i=Number(id);i<=row_no;i++)
        {
            var tr_no=i+1;
            $('#gar_kayam_jagga_detail_list_table').find('#tr'+tr_no).attr('id','tr'+i);
            $('#gar_kayam_jagga_detail_list_table').find('#td'+tr_no).html(i);
            $('#gar_kayam_jagga_detail_list_table').find('#td'+tr_no).attr('id','td'+i);
            $('#gar_kayam_jagga_detail_list_table').find('#btn'+tr_no).attr('data-id',i);
            $('#gar_kayam_jagga_detail_list_table').find('#btn'+tr_no).attr('id','btn'+i);

        }
    })





    //gar jagga bibaran (घर जग्गा नामसारी सिफारिस)
    $(document).ready(function () {
        @isset($gar_jagga_details)
        @foreach($gar_jagga_details as $key=>$gar_jagga_detail)
        // alert('dsaf')
        gar_jagga_detail_row_add('{{$key+1}}','{{$gar_jagga_detail->palika_name}}','{{$gar_jagga_detail->palika_ward_no}}','{{$gar_jagga_detail->jagga_area}}','{{$gar_jagga_detail->kitta_no}}');

        @endforeach
        @endisset
    })
    $(document).on('click','#gar_jagga_detail_table_add_row',function (){
        var row_no=Number( $('#gar_jagga_detail_list_table').find('#tbody').data('row_no'))+1;
        gar_jagga_detail_row_add(row_no);
    })

    function gar_jagga_detail_row_add(row_no,palika_name='',palika_ward_no='',jagga_area='',kitta_no='')
    {
        // alert(area)
        $('#gar_jagga_detail_list_table').find('#tbody').append(
            '               <tr id="tr'+row_no+'">\n' +
            '                    <td id="td'+row_no+'">'+row_no+'</td>\n' +
            '                    <td>\n' +
                        @if(!isset($view_only))
                            '                <input class="input-text" id="" name="palika_name[]" type="text" placeholder="" value="'+palika_name+'">\n' +
                        @else
                            '                <span>'+palika_name+',</span>'+
                        @endif

                        @if(!isset($view_only))
                            '                वडा न॑.<input class="input-text input-number" id="" name="palika_ward_no[]" type="text" placeholder="" value="'+palika_ward_no+'">\n' +
                        @else
                            '                <span>वडा न॑.'+palika_ward_no+'</span>'+
                        @endif
                    '             </td>\n' +

            '                    <td>\n' +
                        @if(!isset($view_only))
                            '                <input class="input-text input-number" id="" name="jagga_area[]" type="text" placeholder="" value="'+jagga_area+'">\n' +
                        @else
                            '                <span>'+jagga_area+'</span>'+
                        @endif
                    '             </td>\n' +

            '                    <td>\n' +
                        @if(!isset($view_only))
                            '                <input class="input-text input-number" id="" name="kitta_no[]" type="text" placeholder="" value="'+kitta_no+'">\n' +
                        @else
                            '                <span>'+kitta_no+'</span>'+
                        @endif
                    '             </td>\n' +
            '                      <td></td>\n' +


                        @if(!isset($view_only))
                            '                    <td>' +
                    '                           <div class="gar_jagga_detail_table_delete_row btn" id="btn'+row_no+'" data-id="'+row_no+'"><i class="fas fa-times-circle"></i></div>' +
                    '                     </td>'+
                        @endif
                    '                </tr>'

        );
        $('#gar_jagga_detail_list_table').find('#tbody').data('row_no',row_no)

    }

    $(document).on('click','.gar_jagga_detail_table_delete_row',function () {
        var id=$(this).data('id');
        $('#gar_jagga_detail_list_table').find('#tr'+id).remove();
        var row_no=Number($('#gar_jagga_detail_list_table').find('#tbody').data('row_no'))-1;
        $('#gar_jagga_detail_list_table').find('#tbody').data('row_no',row_no);

        for(var i=Number(id);i<=row_no;i++)
        {
            var tr_no=i+1;
            $('#gar_jagga_detail_list_table').find('#tr'+tr_no).attr('id','tr'+i);
            $('#gar_jagga_detail_list_table').find('#td'+tr_no).html(i);
            $('#gar_jagga_detail_list_table').find('#td'+tr_no).attr('id','td'+i);
            $('#gar_jagga_detail_list_table').find('#btn'+tr_no).attr('data-id',i);
            $('#gar_jagga_detail_list_table').find('#btn'+tr_no).attr('id','btn'+i);

        }
    })


    //gar_jagga_namsari_sifaris_hakdar_list_table
    $(document).ready(function () {
        @isset($jagga_hakdars)
        @foreach($jagga_hakdars as $key=>$jagga_hakdar)
        // alert('dsaf')
        gar_jagga_namsari_sifaris_hakdar_list_add('{{$key+1}}','{{$jagga_hakdar->hakdar_name}}','{{$jagga_hakdar->hakdar_relationship}}','{{$jagga_hakdar->hakdar_father_name}}','{{$jagga_hakdar->hakdar_citizenship_no}}');

        @endforeach
        @endisset
    })
    $(document).on('click','#gar_jagga_hakdar_table_add_row',function (){
        var row_no=Number( $('#gar_jagga_namsari_sifaris_hakdar_list_table').find('#tbody').data('row_no'))+1;
        gar_jagga_namsari_sifaris_hakdar_list_add(row_no);
    })

    function gar_jagga_namsari_sifaris_hakdar_list_add(row_no,hakdar_name='',hakdar_relationship_with='',hakdar_father_name='',hakdar_citizenship_no='',hakdar_sign='')
    {
        // alert(area)
        $('#gar_jagga_namsari_sifaris_hakdar_list_table').find('#tbody').append(
            '               <tr id="tr'+row_no+'">\n' +
            '                    <td id="td'+row_no+'">'+row_no+'</td>\n' +
            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="jagga_hakdar_name[]" type="text" placeholder="" value="'+hakdar_name+'">\n' +
                @else
                    '                <span>'+hakdar_name+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="jagga_hakdar_relationship_with[]" type="text" placeholder="" value="'+hakdar_relationship_with+'">\n' +
                @else
                    '                <span>'+hakdar_relationship_with+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="jagga_hakdar_father_name[]" type="text" placeholder="" value="'+hakdar_father_name+'">\n' +
                @else
                    '                <span>'+hakdar_father_name+'</span>'+
                @endif
                    '             </td>\n' +


            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="jagga_hakdar_citizenship_no[]" type="text" placeholder="" value="'+hakdar_citizenship_no+'">\n' +
                @else
                    '                <span>'+hakdar_citizenship_no+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="jagga_hakdar_sign[]" type="text" placeholder="" value="'+hakdar_sign+'">\n' +
                @else
                    '                <span>'+hakdar_sign+'</span>'+
                @endif
                    '             </td>\n' +


                @if(!isset($view_only))
                    '                    <td>' +
            '                           <div class="delete_gar_jagga_namsari_sifaris_hakdar_list_table_row btn" id="btn'+row_no+'" data-id="'+row_no+'"><i class="fas fa-times-circle"></i></div>' +
            '                     </td>'+
                @endif
                    '                </tr>'

        );
        $('#gar_jagga_namsari_sifaris_hakdar_list_table').find('#tbody').data('row_no',row_no)

    }

    $(document).on('click','.delete_gar_jagga_namsari_sifaris_hakdar_list_table_row',function () {
        var id=$(this).data('id');
        $('#gar_jagga_namsari_sifaris_hakdar_list_table').find('#tr'+id).remove();
        var row_no=Number($('#gar_jagga_namsari_sifaris_hakdar_list_table').find('#tbody').data('row_no'))-1;
        $('#gar_jagga_namsari_sifaris_hakdar_list_table').find('#tbody').data('row_no',row_no);

        for(var i=Number(id);i<=row_no;i++)
        {
            var tr_no=i+1;
            $('#gar_jagga_namsari_sifaris_hakdar_list_table').find('#tr'+tr_no).attr('id','tr'+i);
            $('#gar_jagga_namsari_sifaris_hakdar_list_table').find('#td'+tr_no).html(i);
            $('#gar_jagga_namsari_sifaris_hakdar_list_table').find('#td'+tr_no).attr('id','td'+i);
            $('#gar_jagga_namsari_sifaris_hakdar_list_table').find('#btn'+tr_no).attr('data-id',i);
            $('#gar_jagga_namsari_sifaris_hakdar_list_table').find('#btn'+tr_no).attr('id','btn'+i);

        }
    })




    //kittakat jagga bibaran
    $(document).ready(function () {
        @isset($kittakat_jagga_details)
        @foreach($kittakat_jagga_details as $key=>$kittakat_jagga_detail)
        // alert('dsaf')
        kittakat_jagga_detail_row_add('{{$key+1}}','{{$kittakat_jagga_detail->sit_no}}','{{$kittakat_jagga_detail->kitta_no}}','{{$kittakat_jagga_detail->jagga_area}}');

        @endforeach
        @endisset
    })
    $(document).on('click','#kittakat_jagga_detail_table_add_row',function (){
        var row_no=Number( $('#kittakat_jagga_detail_list_table').find('#tbody').data('row_no'))+1;
        kittakat_jagga_detail_row_add(row_no);
    })

    function kittakat_jagga_detail_row_add(row_no,sit_no='',kitta_no='',jagga_area='')
    {
        // alert(area)
        $('#kittakat_jagga_detail_list_table').find('#tbody').append(
            '               <tr id="tr'+row_no+'">\n' +
            '                    <td id="td'+row_no+'">'+row_no+'</td>\n' +


            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="sit_no[]" type="text" placeholder="" value="'+sit_no+'">\n' +
                @else
                    '                <span>'+sit_no+'</span>'+
                @endif
                    '             </td>\n' +



            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="kitta_no[]" type="text" placeholder="" value="'+kitta_no+'">\n' +
                @else
                    '                <span>'+kitta_no+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="jagga_area[]" type="text" placeholder="" value="'+jagga_area+'">\n' +
                @else
                    '                <span>'+jagga_area+'</span>'+
                @endif
                    '             </td>\n' +



                @if(!isset($view_only))
                    '                    <td>' +
            '                           <div class="kittakat_jagga_detail_table_delete_row btn" id="btn'+row_no+'" data-id="'+row_no+'"><i class="fas fa-times-circle"></i></div>' +
            '                     </td>'+
                @endif
                    '                </tr>'

        );
        $('#kittakat_jagga_detail_list_table').find('#tbody').data('row_no',row_no)

    }

    $(document).on('click','.kittakat_jagga_detail_table_delete_row',function () {
        var id=$(this).data('id');
        $('#kittakat_jagga_detail_list_table').find('#tr'+id).remove();
        var row_no=Number($('#kittakat_jagga_detail_list_table').find('#tbody').data('row_no'))-1;
        $('#kittakat_jagga_detail_list_table').find('#tbody').data('row_no',row_no);

        for(var i=Number(id);i<=row_no;i++)
        {
            var tr_no=i+1;
            $('#kittakat_jagga_detail_list_table').find('#tr'+tr_no).attr('id','tr'+i);
            $('#kittakat_jagga_detail_list_table').find('#td'+tr_no).html(i);
            $('#kittakat_jagga_detail_list_table').find('#td'+tr_no).attr('id','td'+i);
            $('#kittakat_jagga_detail_list_table').find('#btn'+tr_no).attr('data-id',i);
            $('#kittakat_jagga_detail_list_table').find('#btn'+tr_no).attr('id','btn'+i);
        }
    })





    $(document).ready(function () {
        @isset($gar_bato_details)
        @foreach($gar_bato_details as $key=>$gar_bato_detail)
        // alert('dsaf')
        gar_bato_detail_row_add('{{$key+1}}','{{$gar_bato_detail->palika_ward_no}}','{{$gar_bato_detail->sit_no}}','{{$gar_bato_detail->kitta_no}}','{{$gar_bato_detail->jagga_area}}','{{$gar_bato_detail->bato_name}}','{{$gar_bato_detail->gar_present_or_not}}','{{$gar_bato_detail->bato_type}}');

        @endforeach
        @endisset
    })
    $(document).on('click','#gar_bato_detail_table_add_row',function (){
        var row_no=Number( $('#gar_bato_detail_list_table').find('#tbody').data('row_no'))+1;
        gar_bato_detail_row_add(row_no);
    })

    function gar_bato_detail_row_add(row_no,palika_ward_no='',sit_no='',kitta_no='',jagga_area='',bato_name='',gar_present_or_not='',bato_type='')
    {
        // alert(gar_present_or_not)
        $('#gar_bato_detail_list_table').find('#tbody').append(
            '               <tr id="tr'+row_no+'">\n' +
            '                    <td id="td'+row_no+'">'+row_no+'</td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="palika_ward_no[]" type="text" placeholder="" value="'+palika_ward_no+'">\n' +
                @else
                    '                <span>'+palika_ward_no+'</span>'+
                @endif
                    '             </td>\n' +


            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="sit_no[]" type="text" placeholder="" value="'+sit_no+'">\n' +
                @else
                    '                <span>'+sit_no+'</span>'+
                @endif
                    '             </td>\n' +



            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="kitta_no[]" type="text" placeholder="" value="'+kitta_no+'">\n' +
                @else
                    '                <span>'+kitta_no+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="jagga_area[]" type="text" placeholder="" value="'+jagga_area+'">\n' +
                @else
                    '                <span>'+jagga_area+'</span>'+
                @endif
                    '             </td>\n' +


            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="bato_name[]" type="text" placeholder="" value="'+bato_name+'">\n' +
                @else
                    '                <span>'+bato_name+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <select id="body_person_abbreviation" class="input-text" name="gar_present_or_not[]">' +
                    '                    <option></option>' +
                    '                    <option value="घरभएको" '+((gar_present_or_not=="घरभएको")? "selected":"")+'>घरभएको</option>' +
                    '                    <option value="नभएको" '+((gar_present_or_not=="नभएको")? "selected":"")+'>नभएको</option>' +
                    '                 </select>' +
                @else
                    '                <span>'+gar_present_or_not+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="bato_type[]" type="text" placeholder="" value="'+bato_type+'">\n' +
                @else
                    '                <span>'+bato_type+'</span>'+
                @endif
                    '             </td>\n' +



                @if(!isset($view_only))
                    '              <td>' +
            '                           <div class="gar_bato_detail_table_delete_row btn" id="btn'+row_no+'" data-id="'+row_no+'"><i class="fas fa-times-circle"></i></div>' +
            '                     </td>'+
                @endif
                    '                </tr>'

        );
        $('#gar_bato_detail_list_table').find('#tbody').data('row_no',row_no)

    }

    $(document).on('click','.gar_bato_detail_table_delete_row',function () {
        var id=$(this).data('id');
        $('#gar_bato_detail_list_table').find('#tr'+id).remove();
        var row_no=Number($('#gar_bato_detail_list_table').find('#tbody').data('row_no'))-1;
        $('#gar_bato_detail_list_table').find('#tbody').data('row_no',row_no);

        for(var i=Number(id);i<=row_no;i++)
        {
            var tr_no=i+1;
            $('#gar_bato_detail_list_table').find('#tr'+tr_no).attr('id','tr'+i);
            $('#gar_bato_detail_list_table').find('#td'+tr_no).html(i);
            $('#gar_bato_detail_list_table').find('#td'+tr_no).attr('id','td'+i);
            $('#gar_bato_detail_list_table').find('#btn'+tr_no).attr('data-id',i);
            $('#gar_bato_detail_list_table').find('#btn'+tr_no).attr('id','btn'+i);
        }
    })




    //char killa sifaris tapasil
    $(document).ready(function () {
        @isset($char_killa_tapasils)
        @foreach($char_killa_tapasils as $key=>$char_killa_tapasil)
        // alert('dsaf')
        char_killa_tapasil_row_add('{{$key+1}}','{{$char_killa_tapasil->area}}','{{$char_killa_tapasil->kitta_no}}','{{$char_killa_tapasil->sit_no}}','{{$char_killa_tapasil->jagga_area}}','{{$char_killa_tapasil->east}}','{{$char_killa_tapasil->west}}','{{$char_killa_tapasil->north}}','{{$char_killa_tapasil->south}}');

        @endforeach
        @endisset
    })

    @if(Session::has('char_killa_tapasils'))
    {{--<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>--}}
        @foreach(\Illuminate\Support\Facades\Session::get('char_killa_tapasils') as $key=>$char_killa_tapasil)
        // alert('dsaf')
        char_killa_tapasil_row_add('{{$key+1}}','{{$char_killa_tapasil->area}}','{{$char_killa_tapasil->kitta_no}}','{{$char_killa_tapasil->sit_no}}','{{$char_killa_tapasil->jagga_area}}','{{$char_killa_tapasil->east}}','{{$char_killa_tapasil->west}}','{{$char_killa_tapasil->north}}','{{$char_killa_tapasil->south}}');

        @endforeach
    @endif


    $(document).on('click','#char_killa_tapasil_table_add_row',function (){
        var row_no=Number( $('#char_killa_tapasil_list_table').find('#tbody').data('row_no'))+1;
        char_killa_tapasil_row_add(row_no);
    })

    function char_killa_tapasil_row_add(row_no,area='',kitta_no='',sit_no='',jagga_area='',east='',west='',north='',south='')
    {
        // alert(gar_present_or_not)
        $('#char_killa_tapasil_list_table').find('#tbody').append(
            '               <tr id="tr'+row_no+'">\n' +
            '                    <td id="td'+row_no+'">'+row_no+'</td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" required id="" name="area[]" type="text" placeholder="" value="'+area+'">\n' +
                @else
                    '                <span>'+area+'</span>'+
                @endif
                    '             </td>\n' +


            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="kitta_no[]" type="text" placeholder="" value="'+kitta_no+'">\n' +
                @else
                    '                <span>'+kitta_no+'</span>'+
                @endif
                    '             </td>\n' +


            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="sit_no[]" type="text" placeholder="" value="'+sit_no+'">\n' +
                @else
                    '                <span>'+sit_no+'</span>'+
                @endif
                    '             </td>\n' +





            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text input-number" id="" name="jagga_area[]" type="text" placeholder="" value="'+jagga_area+'">\n' +
                @else
                    '                <span>'+jagga_area+'</span>'+
                @endif
                    '             </td>\n' +


            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="east[]" type="text" placeholder="" value="'+east+'">\n' +
                @else
                    '                <span>'+east+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="west[]" type="text" placeholder="" value="'+west+'">\n' +
                @else
                    '                <span>'+west+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="north[]" type="text" placeholder="" value="'+north+'">\n' +
                @else
                    '                <span>'+north+'</span>'+
                @endif
                    '             </td>\n' +

            '                    <td>\n' +
                @if(!isset($view_only))
                    '                <input class="input-text" id="" name="south[]" type="text" placeholder="" value="'+south+'">\n' +
                @else
                    '                <span>'+south+'</span>'+
                @endif
                    '             </td>\n' +

            '       <td> </td>' +


                @if(!isset($view_only))
                    '              <td>' +
            '                           <div class="char_killa_tapasil_table_delete_row btn" id="btn'+row_no+'" data-id="'+row_no+'"><i class="fas fa-times-circle"></i></div>' +
            '                     </td>'+
                @endif
                    '                </tr>'

        );
        $('#char_killa_tapasil_list_table').find('#tbody').data('row_no',row_no)

    }

    $(document).on('click','.char_killa_tapasil_table_delete_row',function () {
        var id=$(this).data('id');
        $('#char_killa_tapasil_list_table').find('#tr'+id).remove();
        var row_no=Number($('#char_killa_tapasil_list_table').find('#tbody').data('row_no'))-1;
        $('#char_killa_tapasil_list_table').find('#tbody').data('row_no',row_no);

        for(var i=Number(id);i<=row_no;i++)
        {
            var tr_no=i+1;
            $('#char_killa_tapasil_list_table').find('#tr'+tr_no).attr('id','tr'+i);
            $('#char_killa_tapasil_list_table').find('#td'+tr_no).html(i);
            $('#char_killa_tapasil_list_table').find('#td'+tr_no).attr('id','td'+i);
            $('#char_killa_tapasil_list_table').find('#btn'+tr_no).attr('data-id',i);
            $('#char_killa_tapasil_list_table').find('#btn'+tr_no).attr('id','btn'+i);
        }
    })






    $(document).on('change','.document_file',function () {
        // Get a reference to the file input element
        console.log('input[id="nibedan_document_file'+$(this).data('id')+'"]')
        const inputElement = document.querySelector('input[id="nibedan_document_file'+$(this).data('id')+'"]');
        // Create a FilePond instance

        const pond = FilePond.create(inputElement);

    })



</script>

<script>
    @if(!$errors->isEmpty())
    @foreach(\GuzzleHttp\json_decode($errors) as $key=>$error)
    {{--                 {{$error[0]}}--}}
    $('#{{$key}}').addClass('error-input');
    @endforeach
    @endif

    $('.error-input').click(function () {
        $(this).removeClass('error-input');
        var name=$(this).attr('name');
        $('#error_'+name).html('');

    });
</script>







<script>

    // $(document).on('change','.document_file',function () {
    //     // Get a reference to the file input element
    //     console.log('input[id="nibedan_document_file'+$(this).data('id')+'"]')
    //     const inputElement = document.querySelector('input[id="nibedan_document_file'+$(this).data('id')+'"]');
    //     // Create a FilePond instance
    //
    //     const pond = FilePond.create(inputElement);
    //
    //
    //
    //
    //
    // })


    document.addEventListener('FilePond:removefile', (e) => {
        console.log('FilePond ready for use', e.detail);

    });


</script>