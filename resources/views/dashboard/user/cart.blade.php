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
    <li class="nav-item active">
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
    <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Your Cart List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(session('cart'))    
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:8%">Quantity</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <form method="POST" action="{{ route('user.order.product') }}" enctype="multipart/form-data">
                    @csrf
                    <tbody>
                        @php $total = 0 @endphp
                        
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                <tr data-id="{{ $id }}">
                                    <td data-th="Product">
                                        <div class="row">
                                            <input type="hidden" name="pid[]" value="{{ $id }}">
                                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">${{ $details['price'] }}
                                        <input type="hidden" name="price[]" value="{{ $details['price'] }}">
                                    </td>
                                    <td data-th="Quantity">
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                                    </td>
                                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}
                                        <input type="hidden" name="subtotal[]" value="{{ $details['price'] * $details['quantity'] }}">
                                    </td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <label for="voucher_file" class="form-label mb-2"><span class="alert alert-danger">Please upload the payment voucher</span></label>
                                <input class="form-control mt-4" type="file" id="voucher_file" name="voucher_file">
                                <span class="text-danger">@error('voucher_file') {{ $message }} @enderror</span>
                            </td>
                            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong>
                                <input type="hidden" name="total" value="{{ $total }}"></h3>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">
                                <a href="{{ route('user.product.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                                <input class="btn btn-success" type="submit" value="Checkout" />
                            </td>
                        </tr>
                    </tfoot>
                    </form>
                    @else
                       
                        <div class="alert alert-success">
                            <h4>Your order is success.</h4>
                        </div>
                        <a href="{{ route('user.product.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                    @endif
                </table>   
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')

<script type="text/javascript">
    $(".update-cart").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('user.update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },

            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('user.remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>

@endsection