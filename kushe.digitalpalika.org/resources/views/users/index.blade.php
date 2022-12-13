@extends('layouts.main')
@section('title')
    Digital Palika | Users
@endsection
@section('content')
    <div class="card">
        <div class="card-header">

                <a href="{{ route('home') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
                <span class="card-title">प्रयोगकर्ता व्यवस्थापन</span>
                <a class="btn_palika" href="{{ route('users.create') }}" style="float: right;"> नयाँ प्रयोगकर्ता थप्नुहोस् </a>

        </div>

        <div class="card-body table-responsive">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>न.</th>
                    <th>नाम</th>
                    <th>इमेल</th>
                    <th>रोलहरू</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn-sm btn-info" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye"></i></a>
                            @can('role-edit')
                                <a class="btn-sm btn-info" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-pencil"></i></a>
                            @endcan
                            @can('role-delete')
                                {{--                                <a class="btn_palika" href="{{ route('users.destroy',$user->id) }}">DELETE</a>--}}

                                <a class="btn-sm btn-info" href="{{ route('users.index') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById(
                                           'delete-form-{{$user->id}}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <form id="delete-form-{{$user->id}}"
                                      + action="{{route('users.destroy', $user->id)}}"
                                      method="post">
                                    @csrf @method('DELETE')
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $data->render() !!}

        </div>
    </div>



@endsection