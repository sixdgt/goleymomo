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
        <h4 class="card-title text-center">Order Details</h4>
      </div>
      <div class="card-body">
          <a href="{{ route('user.order.index') }}" class="btn btn-primary">Back</a>
          <div class="row">
            <div class="col-md-12">
              <form method="post" action="#">
                @csrf
                @if(Session::get('fail'))
                  <div class="alert alert-danger">
                    <span>{{ Session::get('fail') }}</span>
                  </div>
                @endif
                @if(Session::get('success'))
                  <div class="alert alert-success">
                    <span>{{ Session::get('success') }}</span>
                  </div>
                @endif  
                @if(isset($order_items))
                <div class="row">
                  <div class="col-md-12">
                    <h4>Order Items</h4>
                    <h5>Ordered At:- {{ $order_items[0]->created_at }}</h5>  
                    <h5>Status:- {{ $order_items[0]->order_status }}</h5>  
                    <h5>Order Code:- {{ $order_items[0]->order_code }}</h5> 
                  </div>
                </div>  
                <table class="table">
                    <thead>
                        <tr>
                        <th>S.No</th>
                        <th>Product Title</th>
                        <th>Product Price</th>
                        <th>Product Desc</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $counter = 1 @endphp
                    @foreach($order_items as $item)
                    <tr>
                        <td>{{ $counter }}</td>
                        <td>{{ $item->product_title }}</td>
                        <td>{{ $item->product_price }}</td>
                        <td>{{ $item->product_description }}</td>
                        <td><img src="{{ $item->product_image }}" alt="{{ $item->product_title }}" width="50" height="50"></td>
                        <td>{{ $item->product_quantity }}</td>
                        <td>{{ $item->product_subtotal }}</td>
                    </tr>
                    @php $counter++ @endphp
                    @endforeach
                    <tbody>
                </table>
                @endif
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection