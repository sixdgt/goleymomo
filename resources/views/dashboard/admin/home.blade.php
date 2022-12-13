@extends('dashboard.admin.layouts.main')

@section('title')
GOLEY MOMO | Admin Dashboard
@endsection

@section('sidebar')
<ul class="nav">
    <li class="nav-item active">
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
    <li class="nav-item ">
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
<div class="container-fluid">
    <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
            <i class="material-icons">content_copy</i>
            </div>
            <p class="card-category">Reports</p>
            <h3 class="card-title">User Logs
            </h3>
        </div>
        <div class="card-footer">
            <div class="stats">
            <i class="material-icons text-danger">warning</i>
            <a href="javascript:;">check here</a>
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
            <i class="fa fa-file"></i>
            </div>
            <p class="card-category">KYC Application</p>
            <h3 class="card-title">+5</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
            <i class="material-icons">date_range</i> Last 24 Hours
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
            <i class="material-icons">face</i>
            </div>
            <p class="card-category">Marketers</p>
            <h3 class="card-title">15</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
            <i class="material-icons">local_offer</i> Year 2021-2022
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
            <i class="fa fa-user"></i>
            </div>
            <p class="card-category">Partners</p>
            <h3 class="card-title">+245</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
            <i class="material-icons">update</i> Just Updated
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-chart">
            <div class="card-header card-header-success">
                <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Daily User Visits</h4>
                <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today status.</p>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
            <div class="card-header card-header-warning">
                <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Partner Registration</h4>
                <p class="card-category">Last Month Statistics</p>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection