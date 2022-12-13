@extends('dashboard.admin.layouts.main')

@section('title')
GOLEY MOMO | Admin Dashboard
@endsection

@section('styles')
<style>
    .not-allowed{
    cursor: not-allowed! important;
    
}
</style>
@endsection
@section('sidebar')
<ul class="nav">
    <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.home') }}">
        <i class="material-icons">dashboard</i>
        <p>Dashboard</p>
    </a>
    </li>
    <li class="nav-item active">
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
            <h4 class="card-title text-center">Marketing & Sales Partner</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover table-condensed" id="sectorlist">
                <thead class=" text-primary">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach ($partners as $partner)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $partner->name }}</td>
                    <td>{{ $partner->email }}</td>
                    <td>{{ $partner->created_at->format('d-m-Y') }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary passingID" data-id="{{ $partner->id }}" id="partnerSetting" data-toggle="modal" data-target="#partnerSet"><i class="fa fa-cogs"></i></button>
                        @if($partner->is_verified != "yes")
                        <form action="{{ route('admin.user.verify') }}" method="post">
                            @csrf
                            <input type="hidden" name="uid" value="{{ $partner->id }}">
                            <input type="submit" class="btn btn-sm btn-primary" value="VERIFY">
                        </form>
                        @else
                        <button class="btn btn-sm btn-success disabled not-allowed">VERIFIED</button>
                        @endif
                    </td>
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
            <h4 class="card-title text-center">Add New Partner</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.add') }}" id="order-form" method="post">
                @csrf
                <br>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control">
                    <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-success">Add</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade partnerSetting" id="partnerSet" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Partner Settings</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="material-icons">clear</i>
				</button>
			</div>
			<form action="{{ route('admin.user.password') }}" id="user-setting-form" method="post">
				@csrf
				<div class="modal-body">
				    <input type="hidden" name="uid" id="uid" value="">
					<div class="row form-group">
						<div class="col-md-4"><Label><strong>New Password :</strong></Label></div>
						<div class="col-md-6"><input type="password" class="form-control" name="password" placeholder="New password">
						<span class="text-danger error-text password_error"></span></div>
					</div>
					<div class="row form-group">
						<div class="col-md-4"><Label><strong>Confirm Password :</strong></Label></div>
						<div class="col-md-6"><input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
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
@section('footer-scripts')
<script>
    $( document ).ready(function() {
        $(document).on("click", ".passingID", function () {
            var ids = $(this).attr('data-id');
            $(".modal-body #uid").val( ids );
        });

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // $('#user-setting-form').on('submit', function(e){
        //     e.preventDefault();

        //     var form = this;
        //     $.ajax({
        //         url:$(form).attr('action'),
        //         method:$(form).attr('method'),
        //         data: new FormData(form),
        //         processData:false,
        //         dataType:'json',
        //         contentType:'application/json',
        //         "_token":"{{ csrf_token() }}",
        //         beforeSend: function(){
        //             $(form).find('span.error-text').text('');
        //         },
        //         success: function(data){
        //             console.log(data);
        //             if(data.code == 0){
        //                 $.each(data.error, function(prefix, val){
        //                     $(form).find('span.'+prefix+'_error').text(val[0]);
        //                 });
        //             }else{
        //                 $('#user-setting-form').modal('hide');
        //                 // toastr.success(data.msg);
        //             }
        //         },
        //     })
        // });
    });
    
</script>
@endsection