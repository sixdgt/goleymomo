









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
                <span class="card-title">नयाँ रोल</span>



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


            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <div class="form-group">
                        <strong>नाम:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group overflow-auto">
                        <strong>अनुमतिहरू:</strong>
                        <br/>
                        <div class="form-group overflow-auto">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa  fa-search"></i></span>
                                <input type="text" class="form-control search-role-title" placeholder="role title" aria-label="role title" aria-describedby="addon-wrapping">
                            </div>
                            <div id="role_list_div" style="margin-top: 10px">
                                @foreach($permission as $value)

                                    <div class="role-list col-sm-3">
                                        <label>
                                            <input type="checkbox" name="permission[]" value="{{$value->id}}"> {{ $value->name }}</label>
                                        <br/>
                                    </div>
                                @endforeach
                            </div>
                            {{--                        {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}--}}




                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>





@endsection
@section('custom-script')
    <script
            type="text/javascript"
            charset="utf8"
            src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

    <script>
        const  all_fole_list={};

        @foreach($permission as $value)

            all_fole_list['{{$value->id}}']='{{$value->name}}';
        @endforeach
        console.log(all_fole_list);
        $('.search-role-title').on('input',function () {
            var input_value=$(this).val();
            // alert(input_value)
            var list_view='';
            $.each(all_fole_list, function(key, value) {
                console.log(key)
                if (value.includes(input_value))
                {
                    // alert('value')


                    list_view=list_view+'<div class="role-list">'+
                        '<label>'+
                        '<input type="checkbox" name="permission[]" value="'+key+'">'+value+'</label>'+
                        '<br/>'+
                        '</div>';

                }
            });
            // console.log(list_view)
            $('#role_list_div').html(list_view)

        })

        $(function() {
            $("#permission").dataTable();
        });
    </script>
@endsection