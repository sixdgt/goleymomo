@extends('layouts.main')
@section('title')
    Digital Palika | Roles
@endsection

@section('custom-css')
    <link
            rel="stylesheet"
            type="text/css"
            href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
    />

    <style>
        .role-list
        {
            border-radius: 20px; padding: 5px; width: 250px; float: left; margin: 5px; background-color: whitesmoke
        }
    </style>
@endsection
@section('content')

    <div class="card">
        <div class="card-header">

                <a href="{{ route('roles.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>

                <span class="card-title">रोल एडित</span>

        </div>

        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>नाम:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'नाम','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group overflow-auto">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fa  fa-search"></i></span>
                                    <input type="text" class="form-control search-role-title" placeholder="role title" aria-label="अनुमतिहरू" aria-describedby="addon-wrapping">
                                </div>
                                <div id="role_list_div" style="margin-top: 10px">
{{--                                    @foreach($permission as $value)--}}

{{--                                        <div class="role-list">--}}
{{--                                            <label>--}}
{{--                                                <input class="role-checkbox" type="checkbox" {{in_array($value->id, $rolePermissions) ? 'checked' : ''}} name="permission[]" value="{{$value->id}}"> {{ $value->name }}</label>--}}
{{--                                            <br/>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
                                 </div>
{{--                        {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}--}}

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn_palika">Submit</button>
                </div>
            </div>

        </div>
    </div>






@endsection

@section('custom-script')
    <script
            type="text/javascript"
            charset="utf8"
            src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

    <script>
        const  all_role_list={};
        var all_selected_role_id_list=[];
        @foreach($permission as $value)
            @if(in_array($value->id, $rolePermissions))
                all_selected_role_id_list.push({{$value->id}});
            @endif
                all_role_list['{{$value->id}}']='{{$value->name}}';
        @endforeach

        $(document).on('click','.role-checkbox',function () {

            var click_id=$(this).val();
            all_selected_role_id_list.push(click_id);

        });

        $('.search-role-title').on('input',function () {
            var input_value=$(this).val();
            // alert(input_value)
            var list_view='';

            if(!input_value=='')
            {
                $.each(all_role_list, function(key, value) {
                    // console.log(all_selected_role_id_list)
                    if (value.includes(input_value))
                    {
                        // alert('value')

                        var check_checked=false;
                        $.each(all_selected_role_id_list, function(key_checked, value_checked) {
                            // alert(value_checked+''+key)
                            if (Number(value_checked) === Number(key))
                            {
                                // alert(key+''+value_checked)
                                check_checked=true;
                                return false;
                            }
                        });


                        if(check_checked==true)
                        {
                            list_view=list_view+'<div class="role-list">'+
                                '<label id="checkbox_label'+key+'">'+
                                '<input type="checkbox" id="'+key+'" class="role-checkbox" name="'+key+'" checked value="1">'+value+' </label>'+

                                '<br/>'+
                                '</div>';
                        }
                        else {
                            list_view=list_view+'<div class="role-list">'+
                                '<label id="checkbox_label'+key+'">'+
                                '<input type="checkbox" id="'+key+'" class="role-checkbox" name="'+key+'" value="0">'+value+' </label>'+
                                '<div hidden id="div-hidden_checkbox'+key+'"><input type="checkbox" id="hidden_checkbox'+key+'" class="role-checkbox" name="'+key+'" checked value="0"></div>'+
                                '<br/>'+
                                '</div>';
                        }
                    }
                });
            }

            // console.log(list_view)
            $('#role_list_div').html(list_view)

        })

        $(document).on('change','.role-checkbox',function() {
            var id=$(this).attr('id');
            if(!this.checked) {

                $('#checkbox_label'+id).append('<div hidden id="div-hidden_checkbox'+id+'"><input type="checkbox" id="hidden_checkbox'+id+'" class="role-checkbox" name="'+id+'" checked value="0"></div>');
            }
            else {
                if($('#hidden_checkbox'+id).length>0)
                {
                    $(this).val('1');
                    // alert('fdsaf')
                    $("#div-hidden_checkbox"+id).remove();
                }
            }

        });

        $(function() {
            $("#permission").dataTable();
        });
    </script>
@endsection