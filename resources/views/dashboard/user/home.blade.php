@extends('dashboard.user.layouts.main')

@section('title')
GOLEY MOMO | Partner Dashboard
@endsection

@section('sidebar')

<ul class="nav">
    <li class="nav-item active">
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
    <li class="nav-item ">
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
<div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title text-center">Today's Location</h4>
            </div>
            <div class="card-body">
                @if (isset($locations))
                    @foreach ($locations as $value)
                        <h4>{{ $value->location_name }}</h4>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-primary">
            
                <h4 class="card-title text-center">Add New Location</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user.todays_location') }}" id="order-form" method="post">
                    @csrf
                    <br>
                    <div class="form-group mb-2">
                        <label>Today's Location</label>
                        <input type="text" name="location_name" class="form-control">
                        <span class="text-danger">@error('sales_desc') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection

@section('modal')
<!-- Button trigger modal -->


@endsection