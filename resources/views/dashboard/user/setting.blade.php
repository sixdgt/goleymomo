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
    <li class="nav-item active">
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
					<h4 class="text-center card-title">Change/Update Password</h4>
				</div>
				<div class="card-body">
					<div class="alert alert-danger" role="alert">
						Please! note down your password carefully once you update.
					</div>
					<form action="{{ route('user.password.update') }}" method="POST">
						@if(Session::get('fail'))
							<div class="alert alert-danger">
								{{ Session::get('fail') }}
							</div>
						@endif
						@if(Session::get('success'))
							<div class="alert alert-success">
								{{ Session::get('success') }}
							</div>
						@endif
						@csrf
						<div class="col-8">
							<br>
							<div class="form-outline mb-3">
								<label class="form-label" for="formControlLg">Current Password</label>
								<input name="password" type="password" id="formControlLg" class="form-control form-control-lg" />
							</div>
							<span class="text-danger">@error('password') {{ $message }} @enderror</span>

							<div class="form-outline mb-3">
								<label class="form-label" for="new_password">New Password</label>
								<input name="new_password" type="password" id="new_password" class="form-control form-control-lg" />
							</div>
							<span class="text-danger">@error('new_password') {{ $message }} @enderror</span>

							<div class="form-outline mb-3">
								<label class="form-label" for="confirm_password">Confirm New Password</label>
								<input type="password" id="confirm_password" class="form-control" name="confirm_password" />
							</div>
							<span class="text-danger">@error('confirm_password') {{ $message }} @enderror</span>

						</div>
						<div class="row">
						<!--  <div class="col-4">
								<button type="button" class="btn btn-info btn-block">Generate</button>
							</div> -->
							<div class="col-4">
								<input type="submit" class="btn btn-primary btn-block" value="Update"></input>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header card-header-primary">
					<h4 class="text-center card-title">SETTINGS</h4>
				</div>
				<div class="card-body">
					<a href="{{ route('user.profile') }}" class="btn btn-primary">VIEW PROFILE</a>
					<a href="{{ route('logout') }}" class="btn btn-primary">LOGOUT</a>
				</div>
			</div>
		</div>
    </div>
@endsection