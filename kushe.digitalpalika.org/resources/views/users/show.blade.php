@extends('layouts.main')
@section('title')
    Digital Palika | Users
@endsection
@section('content')


<div class="card">
    <div class="card-header">

            <a href="{{ route('users.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
            <span class="card-title">युजर</span>


    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>नाम:</strong>
                    {{ $user->name }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>इमेल:</strong>
                    {{ $user->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>रोल:</strong>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success"><h5><span class="badge rounded-pill bg-success" style="background-color: #44A64B">{{ $v }}</span></label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



@endsection