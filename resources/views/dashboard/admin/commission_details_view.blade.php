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
<style>

</style>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title text-center">Commission Details</h4>
      </div>
      <div class="card-body">
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
            </div> 
            <hr>
            
            @if(isset($commissions))
            <h3>Partners' Commission Details</h3>
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
                    <th >Action</th>
                  </tr>
                </thead>
                <tbody>
                @php $counter = 1 @endphp
                @foreach($commissions as $key => $up)
                  <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $up['name'] }}</td>
                    <td>{{ $up['commission_rate'] }}</td>
                    <td>{{ $up['total_amt'] }}</td>
                    <td>{{ $up['commission_payable'] }}</td>
                    <td>{{ $up['commission_payable'] }}</td>
                    <td>
                    @if($up['commission_payable'] != 0)
                    <button class="btn btn-primary btn-sm" id="{{ $up['user_id'] }}" onClick="pay_click(this.id)"><i class="fa fa-money"></i> Pay</button>
                    <button class="btn btn-primary btn-sm" id="{{ 'close'.$up['user_id'] }}" style="display: none" onClick="close_click(this.id)"><i class="fa fa-close"></i> Close</button>
                    <div id="{{ 'pay-form'.$up['user_id'] }}" style="display: none">
                      <form action="{{ route('admin.commission.partnerpay') }}" id=user-setting-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="uid" id="uid" value="{{ $up['user_id'] }}">
                        <input type="hidden" name="total_amt" id="total_amt" value="{{ $up['total_amt'] }}">
                        <input type="hidden" name="sg_id" id="sid" value="{{ $up['sg_id'] }}">
                        <input type="hidden" name="parent_id" id="pid" value="{{ $users->id }}">
                        <input type="hidden" name="commission_payable" id="uid" value="{{ $up['commission_payable'] }}">
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
                  @php $counter++ @endphp
                @endforeach
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
    <div class="col-md-6">
      <div class="card">
        <div class="card-header card-header-primary">
        <h4 class="card-title text-center">Payment History - Self</h4>
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