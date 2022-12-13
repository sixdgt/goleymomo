@extends('dashboard.admin.layouts.main')

@section('title')
GOLEY MOMO | Admin Dashboard
@endsection

@section('styles')

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
    <li class="nav-item">
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
    <li class="nav-item active">
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
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title text-center">Commissions</h4>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Name</th>
              <th>Total Sales</th>
              <th>Commission Payable</th>
              <th>Commission Due</th>
              <th>Action</th>
            </tr>
          </thead>
          @if(isset($users))
          @php $counter = 1 @endphp
          @foreach($users as $user)
            <tbody>
              <tr>
                <th scope="row">{{ $counter }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->total_amt }} </td>
                <td>{{ $user->commission_payable }} </td>
                <td>{{ $user->commission_payable }} </td>
                <td>
                  <a class="btn btn-primary btn-sm" href="{{ 'details/'.$user->id }}" id="view">View</a>
                  @if($user->commission_payable != 0)
                  <button class="btn btn-primary btn-sm" id="{{ $user->id }}" onClick="pay_click(this.id)"><i class="fa fa-money"></i> Pay</button>
                  <button class="btn btn-primary btn-sm" id="{{ 'close'.$user->id }}" style="display: none" onClick="close_click(this.id)"><i class="fa fa-close"></i> Close</button>
                  <div id="{{ 'pay-form'.$user->id }}" style="display: none">
                    <form action="{{ route('admin.commission.pay') }}" id="user-setting-form" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="uid" id="uid" value="{{ $user->id }}">
                      <input type="hidden" name="total_amt" id="uid" value="{{ $user->total_amt }}">
                      <input type="hidden" name="commission_payable" id="uid" value="{{ $user->commission_payable }}">
                      <input type="hidden" name="sg_id" id="uid" value="{{ $user->sg_id }}">
                      <input type="text" class="form-control mb-2" name="amount" placeholder="Enter Amount">
                      <div class="file-field">
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="file" name="payment_voucher">
                        </div>
                        <span class="text-danger">@error('sales_voucher') {{ $message }} @enderror</span>
                      </div>
                      <span class="text-danger error-text amount_error"></span>
                      <input type="submit" class="btn btn-success btn-sm" value="Submit">
                    </form>
                  </div>
                  @else 
                    N/A
                  @endif
                </td>
              </tr>
            </tbody>
            @php $counter++ @endphp
          @endforeach
          @endif
        </table>
      </div>
    </div>
  </div>
</div>


@endsection
@section('footer-scripts')
<script type="text/javascript">
    function pay_click(clicked_id){
      document.getElementById(clicked_id).style.display = "none";
      document.getElementById("close" + clicked_id).style.display = "inline";
      document.getElementById("pay-form" + clicked_id).style.display = "block";
    }
    function close_click(clicked_id){
      btn_id = clicked_id.split("close");
      document.getElementById(btn_id[1]).style.display = "inline";
      document.getElementById(clicked_id).style.display = "none";
      document.getElementById("pay-form" + btn_id[1]).style.display = "none";
    }
</script>
@endsection