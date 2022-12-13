@extends('dashboard.admin.layouts.main')

@section('title')
GOLEY MOMO | Admin Dashboard
@endsection

@section('sidebar')
<ul class="nav">
    <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.home') }}">
        <i class="material-icons">dashboard</i>
        <p>Dashboard</p>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.user.index') }}">
        <i class="material-icons">library_books</i>
        <p>Partners</p>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.product.index') }}">
        <i class="material-icons">library_books</i>
        <p>Product</p>
    </a>
    </li>
    <li class="nav-item active">
    <a class="nav-link" href="{{ route('admin.order.index') }}">
        <i class="material-icons">library_books</i>
        <p>Order</p>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.commission.index') }}">
        <i class="material-icons">library_books</i>
        <p>Commission Management</p>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.commission.detail') }}">
        <i class="material-icons">library_books</i>
        <p>Commission</p>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link" href="{{ route('admin.landing.index') }}">
        <i class="material-icons">library_books</i>
        <p>Landing Page</p>
    </a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Your Order List</h4>
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
            </div>
        </div>
        </div>
    </div>
</div>
@endsection