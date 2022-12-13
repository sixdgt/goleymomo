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
    <li class="nav-item">
    <a class="nav-link" href="{{ route('user.order.index') }}">
        <i class="material-icons">library_books</i>
        <p>Order</p>
    </a>
    </li>
    <li class="nav-item active">
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
    <div class="col-md-8">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Sales History</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover table-condensed" id="sectorlist">
                <thead class=" text-primary">
                    <th>No</th>
                    <th>Sales Desc</th>
                    <th>Card Amount</th>
                    <th>Cash Amount</th>
                    <th>Voucher</th>
                    <th>Entry At</th>
                </thead>
                <tbody>
                @foreach ($sales as $sale)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $sale->sales_desc }}</td>
                    <td>{{ $sale->card_amount }}</td>
                    <td>{{ $sale->cash_amount }}</td>
                    <td><a href="{{ $sale->sales_voucher }}" target="_blank" >View Voucher</a></td>
                    <td>{{ $sale->created_at->format('d-m-Y'). " ". $sale->created_at->diffForHumans() }}</td>
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
            <h4 class="card-title text-center">Sales Entry</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('user.sales.entry') }}" id="order-form" method="post" enctype="multipart/form-data">
                @csrf
                <br>
                <div class="form-group mb-2">
                    <label>Sales Description</label>
                    <input type="text" name="sales_desc" class="form-control">
                    <span class="text-danger">@error('sales_desc') {{ $message }} @enderror</span>
                </div>
                <div class="form-group mb-2">
                    <label>Sales Amount Cash</label>
                    <input type="text" name="cash_amount" class="form-control">
                    <span class="text-danger">@error('cash_amount') {{ $message }} @enderror</span>
                </div>
                <div class="form-group mb-2">
                    <label>Sales Amount Card</label>
                    <input type="text" name="card_amount" class="form-control">
                    <span class="text-danger">@error('card_amount') {{ $message }} @enderror</span>
                </div>
                <div class="file-field">
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="file" placeholder="Upload your file" name="sales_voucher">
                    </div>
                    <span class="text-danger">@error('sales_voucher') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-success">SAVE</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection