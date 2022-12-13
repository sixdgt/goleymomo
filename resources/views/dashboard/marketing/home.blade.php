@extends('dashboard.admin.layouts.main')

@section('title')
GOLEY MOMO | Marketing Dashboard
@endsection

@section('sidebar')
<ul class="nav">
    <li class="nav-item active">
    <a class="nav-link" href="{{ route('marketing.home') }}">
        <i class="material-icons">dashboard</i>
        <p>Dashboard</p>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link" href="{{ route('marketing.partners') }}">
        <i class="material-icons">library_books</i>
        <p>Sales Partner</p>
    </a>
    </li>
</ul>
@endsection

@section('content')

@endsection