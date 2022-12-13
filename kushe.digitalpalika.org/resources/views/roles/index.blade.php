@extends('layouts.main')
@section('title')
    Digital Palika | Roles
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">

                    <a href="{{ route('home') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
                    <span class="card-title">रोल व्यवस्थापन</span>
                    @can('role-create')
                        <a class="btn_palika" href="{{ route('roles.create')}}" style="float: right"><i class="fa fa-plus-square"></i> नयाँ रोल थप्प्नुहोस</a>

                    @endcan

            </div>

        </div>

        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>न.</th>
                    <th>नाम</th>
                    <th width="280px">Action</th>
                </tr>

                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn_palika" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i></a>
                            @can('role-edit')
                                <a class="btn_palika" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-pencil"></i></a>
                            @endcan
                            @can('role-delete')
{{--                                <a class="btn_palika" href="{{ route('roles.destroy',$role->id) }}">DELETE</a>--}}

                                <a class="btn_palika" href="{{ route('roles.index') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById(
                                           'delete-form-{{$role->id}}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <form id="delete-form-{{$role->id}}"
                                      + action="{{route('roles.destroy', $role->id)}}"
                                      method="post">
                                    @csrf @method('DELETE')
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
<div class="row">
    <div class="col-lg-12 margin-tb">

    </div>
</div>



{!! $roles->render() !!}
@endsection