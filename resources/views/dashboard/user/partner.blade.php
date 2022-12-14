@extends('dashboard.user.layouts.main')

@section('title')
GOLEY MOMO | Marketing Dashboard
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
    <li class="nav-item">
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
    <li class="nav-item active">
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
    <div class="col-md-8">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Your Sales Partner</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover table-condensed" id="sectorlist">
                <thead class=" text-primary">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                </thead>
                <tbody>
                @foreach ($partners as $partner)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $partner->name }}</td>
                    <td>{{ $partner->email }}</td>
                    <td>{{ $partner->created_at->format('d-m-Y') }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>   
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Add New Partner</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('user.partners.add') }}" id="order-form" method="post">
                @csrf
                <br>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control">
                    <span class="text-danger">@error('sales_desc') {{ $message }} @enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                    <span class="text-danger">@error('sales_amount') {{ $message }} @enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="text-danger">@error('sales_amount') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-success">Add</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection