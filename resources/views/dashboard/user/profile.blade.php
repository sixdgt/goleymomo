@extends('dashboard.user.layouts.main')

@section('title')
GOLEY MOMO | Partner Profile
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
                <h4 class="card-title text-center">Profile</h4>
            </div>
            <div class="card-body">
                @if (isset($profile))
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="team-player">
                                <div class="card card-plain">
                                <div class="col-md-6 ml-auto mr-auto">
                                    <img src="{{ $profile->profile_img }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                                </div>
                                <h4 class="card-title">{{ $profile->name }}
                                    <br>
                                    <small class="card-description text-muted">{{ $profile->user_type }}</small>
                                    <br><small class="card-description text-muted">Verified:- {{ $profile->is_verified }}</small>
                                </h4>
                                <div class="card-body">
                                    <p class="card-description">{{ $profile->message }}</p>
                                </div>
                                <div class="card-footer justify-content-center">
                                    <a href="{{ $profile->instagram_url }}" class="btn btn-link btn-just-icon" target="_blank"><i class="fa fa-instagram"></i></a>
                                    <a href="{{ $profile->facebook_url }}" class="btn btn-link btn-just-icon" target="_blank"><i class="fa fa-facebook-square"></i></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title text-center">Update Profile</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <br>
                    <div class="form-group mb-2">
                        <label>Full Name</label><br>
                        <input type="text" name="name" class="form-control mt-2" value="{{ $profile->name }}" readonly>
                    </div><br>
                    <div class="form-group mb-2">
                        <label>Email</label><br>
                        <input type="text" name="email" class="form-control mt-2" value="{{ $profile->email }}" readonly>
                    </div>
                    <br>
                    <div class="form-group mb-2">
                        <label>Instagram</label><br>
                        <input type="text" name="instagram_url" class="form-control mt-2">
                        <span class="text-danger">@error('instagram_url') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group mb-2">
                        <label>Facebook</label><br>
                        <input type="text" name="facebook_url" class="form-control mt-2">
                        <span class="text-danger">@error('facebook_url') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group mb-2">
                        <label>Your Message</label><br>
                        <input type="text" name="message" class="form-control mt-2">
                        <span class="text-danger">@error('message') {{ $message }} @enderror</span>
                    </div>
                    <div class="file-field mb-2"><br>
                        <label for="product_title"><strong>Upload Profile Picture</strong></label><br>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="file" placeholder="Upload your file" name="profile_img">
                        </div>
                        <span class="text-danger">@error('profile_img') {{ $message }} @enderror</span>
                    </div>
                    @if ($profile->user_type != "marketings")
                    <div class="form-check form-check-inline">
                        <input class="form-check" name="user_type" type="checkbox" id="inlineCheckbox1" value="marketings">
                        <label class="form-check-label" for="inlineCheckbox1">Be a marketer</label>
                    </div>
                    @endif
            </div>
            <div class="card-footer">
                <input type="submit" value="UPDATE" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection