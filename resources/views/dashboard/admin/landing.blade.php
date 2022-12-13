@extends('dashboard.admin.layouts.main')

@section('title')
UNICOM | Product
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
    <li class="nav-item ">
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
    <li class="nav-item ">
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
    <li class="nav-item active">
    <a class="nav-link" href="{{ route('admin.landing.index') }}">
        <i class="material-icons">library_books</i>
        <p>Landing Page</p>
    </a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
<div class="col-md-7">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Landing Page Details</h4>
        </div>
        <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Vision</th>
              <th scope="col">Mission</th>
              <th scope="col">Director's Message</th>
            </tr>
          </thead>
          @if(isset($landings))
          @php $counter = 1 @endphp
          <tbody>
            <tr>
              <th scope="row">{{ $counter }}</th>
              <td>{{ $landings->vision }}</td>
              <td>{{ $landings->mission }}</td>
              <td>{{ $landings->director_message }}</td>
            </tr>
          </tbody>
          @endif
        </table>
        </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Landing Page Details</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.landing.add') }}" id="add-product-form" method="post" enctype="multipart/form-data">
                @csrf
				<br>
                <div class="form-group">
                    <label for="product_title"><strong>Vision</strong></label><br>
                    <input type="text" class="form-control" name="vision" placeholder="Enter Vision" value="@if ($landings->vision) {{ $landings->vision }} @endif">
                    <span class="text-danger error-text product_title_error"></span>
                </div>
                <div class="form-group">
                    <label for="product_title"><strong>Mission</strong></label><br>
                    <input type="text" class="form-control" name="mission" placeholder="Enter Mission" value="@if ($landings->mission) {{ $landings->mission }} @endif">
                    <span class="text-danger error-text product_description_error"></span>
                </div>
                <div class="form-group">
                    <label for="product_title"><strong>Message From Director</strong></label><br>
                    <input type="text" class="form-control" name="director_message" placeholder="Enter Director Message" value="@if ($landings->director_message) {{ $landings->director_message }} @endif">
                    <span class="text-danger error-text product_price_error"></span>
                </div>
                <div class="file-field mb-2">
                    <label for="director_image"><strong>Director Picture</strong></label><br>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="file" placeholder="Upload your file" name="director_image">
                    </div>
                    <span class="text-danger">@error('director_image') {{ $message }} @enderror</span>
                </div>
                <br>
                <div class="form-group mt-2">
                    <label for="product_title"><strong>Facebook Page Link</strong></label><br>
                    <input type="text" class="form-control" name="facebook_link" placeholder="Enter Facebook Page Link" value="@if ($landings->facebook_link) {{ $landings->facebook_link }} @endif">
                    <span class="text-danger error-text product_price_error"></span>
                </div>
                <div class="form-group">
                    <label for="product_title"><strong>Instagram Link</strong></label><br>
                    <input type="text" class="form-control" name="instagram_link" placeholder="Enter Instagram Link" value="@if ($landings->instagram_link) {{ $landings->instagram_link }} @endif">
                    <span class="text-danger error-text product_price_error"></span>
                </div>
                <div class="form-group">
                    <label for="product_title"><strong>Youtube Channel Link</strong></label><br>
                    <input type="text" class="form-control" name="youtube_link" placeholder="Enter Youtube Channel Link" value="@if ($landings->youtube_link) {{ $landings->youtube_link }} @endif">
                    <span class="text-danger error-text product_price_error"></span>
                </div>
                <div class="file-field">
                    <label for="product_title"><strong>Background Image</strong></label><br>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="file" placeholder="Upload your file" name="background_image">
                    </div>
                    <span class="text-danger">@error('background_image') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-success" value="ADD">
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
