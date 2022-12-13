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
    <li class="nav-item active">
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
<style>

</style>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title text-center">Commission Details</h4>
      </div>
      <div class="card-body">
        @if($users)
        <h4>{{ $users->name }}</h4>
        <h5>User Type: {{ $users->user_type }}</h5>
        <div class="row">
          <div class="col-md-12">
            @if($users->commission_rate != NULl)
            <div class="row"> 
              <div class="col-md-8">
                <span id="marketing-cr-view">
                  Commission Rate: <span>{{$users->commission_rate }}</span>
                </span>
              </div>
            @endif
        @endif
            </div> 
            <hr>
            
            @if(isset($users))
            <h3>Commission Details</h3>
            <div id="content">
              <table class="table">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Commissions Rate</th>
                    <th>Total Sales</th>
                    <th>Commission Payable</th>
                    <th>Commission Due</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->commission_rate }}</td>
                    <td>{{ $users->total_amt }}</td>
                    <td>{{ $users->commission_payable }}</td>
                    <td>{{ $users->commission_payable }}</td>
                  </tr>
                </tbody>
              </table>
            </div>            
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header card-header-primary">
        <h4 class="card-title text-center">Payment History</h4>
        </div>
        <div class="card-body">
          @if(isset($self_history))
            <table class="table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Paid Amount</th>
                  <th>Paid Date</th>
                  <th>Voucher</th>
                </tr>
              </thead>
              <tbody>
              @php $counter = 1 @endphp
              @foreach($self_history as $key => $value)
              <tr>
                <td>{{ $counter }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->paid_amt }}</td>
                <td>{{ $value->paid_at  }}</td>
                <td><a href="{{ $value->payment_voucher }}">View Voucher</a></td>
              </tr> 
                @php $counter++ @endphp
              @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header card-header-primary">
        <h4 class="card-title text-center">Payment History - Partner</h4>
        </div>
        <div class="card-body">
          @if(isset($partner_history))
            <table class="table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Paid Amount</th>
                  <th>Paid Date</th>
                  <th>Voucher</th>
                </tr>
              </thead>
              <tbody>
              @php $counter = 1 @endphp
              @foreach($partner_history as $key => $value)
              <tr>
                <td>{{ $counter }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->paid_amt }}</td>
                <td>{{ $value->paid_at  }}</td>
                <td><a href="{{ $value->payment_voucher }}">View Voucher</a></td>
              </tr> 
                @php $counter++ @endphp
              @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection