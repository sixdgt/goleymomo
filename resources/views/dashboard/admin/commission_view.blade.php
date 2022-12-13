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
<style>
  #save-commission {
    display: none;
  }

  #marketing-cr-form {
    display:none;
  }
  #form {
      display:none;
  }

  #save {
      display:none;
  }

  #tr-edit {
      display:none;
  }
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
            @csrf
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
            @if($users->commission_rate != NULl)
            <div class="row"> 
              <div class="col-md-8">
                <span id="marketing-cr-form">
                  <form action="{{ route('admin.commission.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="uid" value="{{ $users->id }}">
                    <input type="text" name="commission_rate" class="form-control" placeholder="Enter commission rate">
                    <button class="btn btn-primary btn-sm" type="submit" id="save-commission">Save</button>
                  </form>
                </span>
                <span id="marketing-cr-view">
                  Commission Rate: <span>{{$users->commission_rate }}</span>
                </span>
              </div>
              <div class="col-md-4">
                <a id="edit-commission" class="btn btn-primary btn-sm" style="text-decoration-line: underline; cursor: pointer; color:blue;">Edit</a>
              </div>
            @else
            <form action="{{ route('admin.commission.add') }}" method="post">
              @csrf
              <input type="hidden" name="uid" value="{{ $users->id }}">
              <input type="text" name="commission_rate" class="form-control" placeholder="Enter commission rate">
              <button class="btn btn-primary btn-sm" type="submit">Save</button>
            </form>
            @endif
            </div> 
            <hr>
            
            @if(isset($commissions))
            <h3>Partners' Commission Details</h3>
            <a id="edit" class="btn btn-primary btn-sm" style="text-decoration-line: underline; cursor: pointer; color:blue;">Edit</a>
            <div id="content">
              <table class="table">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Commissions Rate</th>
                  </tr>
                </thead>
                <tbody>
                @php $counter = 1 @endphp
                @foreach($commissions as $up)
                  <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $up['name'] }}</td>
                    <td>
                      @if($up['commission_rate'] != NULL)
                        {{ $up['commission_rate'] }}
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
            <div id="form">
              <form action="{{ route('admin.commission.user') }}" method="post">
              @csrf
              <table class="table">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Commissions Rate</th>
                  </tr>
                </thead>
                <tbody>
                  @php $counter = 1 @endphp
                  @foreach($commissions as $up)
                    <tr>
                      <td>{{ $counter }}</td>
                      <td>{{ $up['name'] }}</td>
                      <td>
                        <input type="hidden" name="uid" value="{{ $users->id }}">
                        <input type="hidden" name="uids[]" value="{{ $up['id'] }}">
                        <input type="text" name="rates[]" class="form-control" placeholder="Enter commission rate" value="{{ $up['commission_rate'] }}">  
                      </td>
                    </tr>
                    @php $counter++ @endphp
                  @endforeach
                </tbody>
              </table>
              <input class="btn btn-primary btn-sm" id="save" type="submit" value="SAVE">
              </form>
            </div>
            
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer-scripts')
<script>
$(document).ready(function(){
  $('#edit-commission').click(function(){
    $('#marketing-cr-view').hide();
    $('#marketing-cr-form').show();
    $('#edit-commission').hide();
    $('#save-commission').show();
  });

  $('#save-commission').click(function(){
    $('#marketing-cr-view').show();
    $('#marketing-cr-form').hide();
    $('#edit-commission').show();
    $('#save-commission').hide();
  });


  $('#edit').click(function(){
      $('#content').hide();
      $('#form').show();
      $('#save').show();
      $('#edit').hide();
  });
  $('#save').click(function(){
      $('#content').show();
      $('#form').hide();
      $('#edit').show();
      $('#save').hide();
  });
});
</script>
@endsection