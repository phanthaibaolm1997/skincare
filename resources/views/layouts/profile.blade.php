@extends('layouts.cartmaster')
@section('content')
<div class="container-fluid">
    <div class="container-head">
    </div>
    @if(Session::get('ss_kh_id') !== null)
    <div class="container-body">
        <div class="profile-picture"> 
            <img src="{{ asset('assets/images/avatar.gif')}}">
        </div>
        <div class="name">
            <h4 style="margin-left: 40px">{{ $allInfo->kh_hovaten }}</h4>
        </div>
        <div class="location">
            <p>{{ $allInfo->kh_diachi }}</p>
        </div>
        <div class="stats">
            <div class="followers">
                <p>Số đơn hàng đã đăt</p>
                <h1>79K</h1>
            </div>
            <div class="following">
                <p>Following</p>
                <h1>169</h1>
            </div>
            <div class="topics">
                <p>topics</p>
                <h1>182</h1>
            </div>   
        </div>
    </div>
    @else
    <div>
        <h3 style="margin-top: 20vh" class="text-center">Vui lòng đăng nhập</h3>
        <p class="text-center"><a href="{{ route('login-kh') }}">Đăng nhập</a></p>
    </div>
    @endif


</div>
@endsection

