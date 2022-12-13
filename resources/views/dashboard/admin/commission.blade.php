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
    <li class="nav-item active">
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
        <h4 class="card-title text-center">Commissions</h4>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Commission Rate</th>
              <th >Action</th>
            </tr>
          </thead>
          @if(isset($users))
          @php $counter = 1 @endphp
          @foreach($users as $user)
          <tbody>
            <tr>
              <th scope="row">{{ $counter }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>@if ($user->commission_rate) {{ $user->commission_rate }} @else N/A @endif</td>
              <td><a class="btn btn-primary btn-sm" href="{{ 'commissions/'.$user->id }}">View</a></td>
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
<!-- modal -->
<div class="modal fade userSetting" id="userSet" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Commission Settings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
        </button>
      </div>
      <form action="" id="user-setting-form" method="post">
        @csrf
        <div class="modal-body">
          Name: Sandesh Tamang
        <input type="hidden" name="uid" id="uid" value="">
          
          <div class="row">
            Sales Partners
          </div>
          <div class="row form-group">
            <div class="col-md-4"><Label><strong>Madan Rai :</strong></Label></div>
            <div class="col-md-6"><input type="password" class="form-control" name="password" placeholder="Commission Rate">
            <span class="text-danger error-text password_error"></span></div>
          </div>
          <div class="row form-group">
            <div class="col-md-4"><Label><strong>Raymond Bran:</strong></Label></div>
            <div class="col-md-6"><input type="password" class="form-control" name="cpassword" placeholder="Commission Rate">
            <span class="text-danger error-text cpassword_error"></span></div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-block btn-success" value="UDPATE">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
        </div>
    </div>
</div>
@endsection