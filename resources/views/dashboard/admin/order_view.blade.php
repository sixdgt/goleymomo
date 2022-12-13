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
        <h4 class="card-title text-center">Order Details</h4>
      </div>
      <div class="card-body">
          <a class="btn btn-primary" href="{{ route('admin.order.index') }}">Back</a>
          <div class="row">
            <div class="col-md-12">

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
                  <div class="col-md-6">
                    <h4>Order Items</h4>
                    <h5>Ordered By:- {{ $order_items[0]->name }}</h5>  
                    <h5>Ordered Status:- {{ $order_items[0]->order_status }}</h5>  
                    <h5>Ordered At:- {{ $order_items[0]->created_at }}</h5>  
                    <h5>Contact:- {{ $order_items[0]->email }}</h5>  
                    <h5>Order Code:- {{ $order_items[0]->order_code }}</h5> 
                    <h5>Voucher:- <a href="{{ $order_items[0]->file_uri }}" target="_blank">View</a></h5> 
                  </div>
                  <div class="col-md-6"> 
                    <h4>Update Order Status</h4>   
                    <form method="post" action="{{ route('admin.order.status') }}">
                    @csrf
                    <input type="hidden" name="oid" value="{{ $order_items[0]->order_code }}">
                    <div class="form-group">
                      <select name="order_status" class="form-control">
                        <option value="Processing">Processing</option>
                        <option value="Packaging">Packaging</option>
                        <option value="Ready to Shift">Ready to Shift</option>
                        <option value="Delivering">Delivering</option>
                      </select>
                    </div>                
                    <div class="form-group">
                      <input type="submit" class="btn btn-md btn-primary" value="Update">
                    </div>
                  </form>
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
                        <td>{{ $item->product_image }}</td>
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