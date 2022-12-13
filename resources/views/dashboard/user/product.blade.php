@extends('dashboard.user.layouts.main')

@section('title')
GOLEY MOMO | Partner Dashboard
@endsection

@section('styles')
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        margin: auto;
        text-align: center;
        font-family: arial;
    }

    .price {
        color: grey;
        font-size: 22px;
    }

    .card button {
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }

    .card button:hover {
        opacity: 0.7;
    }
</style>
@endsection

@section('sidebar')
<ul class="nav">
    <li class="nav-item">
    <a class="nav-link" href="{{ route('user.home') }}">
        <i class="material-icons">dashboard</i>
        <p>Dashboard</p>
    </a>
    </li>
    <li class="nav-item active">
    <a class="nav-link" href="{{ route('user.product.index') }}">
        <i class="material-icons">library_books</i>
        <p>Product</p>
    </a>
    </li>
    <li class="nav-item  ">
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
            <h4 class="card-title text-center">Products</h4>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12 main-section">
                        <div class="dropdown">
                            <button type="button" class="btn btn-info" data-toggle="dropdown">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                            </button>
                            <div class="dropdown-menu">
                                <div class="row total-header-section">
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                    </div>
                                    @php $total = 0;  @endphp

                                    @foreach((array) session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                    @endforeach
                                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                        <!-- <p>Total: <span class="text-info">$ {{ $total }}</span></p> -->
                                    </div>
                                </div>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <div class="row cart-detail">
                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                <img src="{{ $details['image'] }}" />
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                <p>{{ $details['name'] }}</p>
                                                <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="{{ route('user.cart') }}" class="btn btn-primary btn-block">View all</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section>
                <!-- <div class="card">
                    
                </div> -->
                    @if(session('success'))
                    <div class="alert alert-success">
                      {{ session('success') }}
                    </div> 
                @endif
            </section>
            <div class="row">

                @foreach($products as $data)
                    <div class="col-xs-18 col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="{{ $data->product_image }}" alt="" width="400" height="250">
                            <div class="caption">
                                <h4>{{ $data->product_title }}</h4>
                                <p>{{ $data->product_description }}</p>
                                <p><strong>Price: </strong> {{ $data->product_price }}$</p>
                                <p class="btn-holder"><a href="{{ route('user.add.to.cart', $data->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</div> 
@endsection