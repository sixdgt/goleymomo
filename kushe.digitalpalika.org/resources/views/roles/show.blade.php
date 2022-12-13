@extends('layouts.main')
@section('title')
    Digital Palika | Roles
@endsection
@section('content')






<div class="card">
    <div class="card-header">


            <a href="{{ route('roles.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
            <span class="card-title">रोलको विवरण</span>


    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>नाम:</strong>
                    {{ $role->name }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>अनुमतिहरू:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <label class="label label-success"><h5><span class="badge rounded-pill bg-success" style="background-color: #44A64B">{{ $v->name }}</span></h5></label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection