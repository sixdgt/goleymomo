@extends('dashboard.user.layouts.main')

@section('title')
GOLEY MOMO | Partner Dashboard
@endsection

@section('sidebar')
<ul class="nav">
    <li class="nav-item">
    <a class="nav-link" href="{{ route('user.home') }}">
        <i class="material-icons">dashboard</i>
        <p>Dashboard</p>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('user.product.index') }}">
        <i class="material-icons">library_books</i>
        <p>Product</p>
    </a>
    </li>
    <li class="nav-item active ">
    <a class="nav-link" href="{{ route('user.order.index') }}">
        <i class="material-icons">library_books</i>
        <p>Order</p>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('user.sales.index') }}">
        <i class="material-icons">library_books</i>
        <p>Sales</p>
    </a>
    </li>
    @if(Auth::user()->user_type == "marketings")
    <li class="nav-item">
    <a class="nav-link" href="{{ route('user.partners') }}">
        <i class="material-icons">library_books</i>
        <p>Sales Partner</p>
    </a>
    </li>
    @endif
    <li class="nav-item">
    <a class="nav-link" href="{{ route('user.commission.index') }}">
        <i class="material-icons">library_books</i>
        <p>Commission</p>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('user.setting.index') }}">
        <i class="material-icons">library_books</i>
        <p>Settings</p>
    </a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title text-center">Order History</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-hover table-condensed" id="sectorlist">
                    <thead class=" text-primary">
                        <th>No</th>
                        <th>Order Code</th>
                        <th>Ordered By</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Ordered At</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ($orders as $data)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $data->order_code }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->order_status }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td><a class="btn btn-primary btn-sm" href="{{ 'orders/'.$data->id }}">View</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>  
                
                <div class="d-flex justify-content-center mb-4">
                    {!! $orders->links() !!}
                </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection