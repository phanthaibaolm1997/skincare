@extends('layouts.single')
@section('content')

<section id="cart_items">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="active">Danh mục sản phẩm</li>
        </ol>
    </div> 
</section> <!--/#cart_items-->
<div class="row">
    @foreach($allProdProducer as $prodCat)
    <div class="col-sm-3">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <div style="height: 250px; overflow: hidden;">
                        <img src="{{ asset('$prodCat->hinhanhhanghoa[0]->hinhanh->ha_url') }}" alt="" />
                    </div>
                    <h5>{{ number_format($prodCat->hh_dongia)}}</h5>
                    <p class="textoneline">{{ $prodCat->hh_ten }}</p>
                    <button class="btn btn-default " onclick="
                    @if(Session::has('ss_kh_id'))
                    ajaxAddToCart('{!! url("/cart/add") !!}',{!! $prodCat->hh_ma !!}, 1, {!! $prodCat->hh_dongia !!}, {{ Session('ss_kh_id')}})
                    @else
                    showModelLogin();
                    @endif
                    ">
                    
                    <i class="fa fa-shopping-cart"></i> Thêm
                </button>
                <a href="{{ url('/product-detail') }}/{{$prodCat->hh_ma}}">
                    <button class="btn btn-default">								
                        <i class="fa fa-info"></i> Xem
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
{!! $allProdProducer->render() !!}
@endsection