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
    <li class="nav-item active ">
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
    <div class="col-md-8">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Product List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover table-condensed" id="productlist">
                <thead class=" text-primary">
                    <th>#</th>
                    <th>Product Title</th>
                    <th>Product Description</th>
                    <th>Product Price</th>
                    <th>Product Image</th>
                    <th>Actions</th>
                </thead>
                <tbody>

                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Add New Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.add') }}" id="add-product-form" method="post" enctype="multipart/form-data">
                @csrf
				<br>
                <div class="form-group">
                    <label for="product_title"><strong>Product Title</strong></label><br>
                    <input type="text" class="form-control" name="product_title" placeholder="Enter Product title">
                    <span class="text-danger error-text product_title_error"></span>
                </div>
                <div class="form-group">
                    <label for="product_title"><strong>Product Description</strong></label><br>
                    <input type="text" class="form-control" name="product_description" placeholder="Enter Description">
                    <span class="text-danger error-text product_description_error"></span>
                </div>
                <div class="form-group mb-2">
                    <label for="product_title"><strong>Product Price</strong></label><br>
                    <input type="text" class="form-control" name="product_price" placeholder="Enter Price">
                    <span class="text-danger error-text product_price_error"></span>
                </div>
                <div class="file-field">
                    <label for="product_title"><strong>Upload Product Image</strong></label><br>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="file" placeholder="Upload your file" name="product_image">
                    </div>
                    <span class="text-danger">@error('product_image') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-success">ADD</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<!-- Edit Modal -->
<div class="modal fade editProduct" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
		<form action="{{ route('admin.product.update') }}" method="post" id="update-product-form">
            @csrf
        	<div class="modal-body">
                <input type="hidden" name="pid">
                <div class="form-group">
                    <label for="">Product Title</label>
                    <input type="text" class="form-control" name="product_title" placeholder="Enter product title">
                    <span class="text-danger error-text product_title_error"></span>
                </div>
      		</div>
      		<div class="modal-body">
                <div class="form-group">
                    <label for="">Product Description</label>
                    <input type="text" class="form-control" name="product_description" placeholder="Enter Description">
                    <span class="text-danger error-text product_description_error"></span>
                </div>
      		</div>
      		<div class="modal-body">
                <div class="form-group">
                    <label for="">Product Price</label>
                    <input type="text" class="form-control" name="product_price" placeholder="Enter Price">
                    <span class="text-danger error-text product_price_error"></span>
                </div>
      		</div>
        	<div class="modal-footer">
				<input type="submit" class="btn btn-block btn-success" value="UPDATE">
          		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        	</div>
		</form>
      </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @include('dashboard.admin.scripts.product-scripts')
@endsection