@extends('layouts.cartmaster')
@section('content')
	<?php $totalPrice = 0; ?>
	<?php $discount = 100000; ?>
	<section id="cart_items">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{ url('/') }}">Trang chủ</a> </li>
			<li class="active ml-3">  Giỏ hàng</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<h3 class="mb-4">Kiểm tra giỏ hàng</h3>
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Tên</td>
						<td class="price">Giá</td>
						<td class="quantity">Số Lượng</td>
						<td class="total">Tổng</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@if( count($getDetailCart->chitietgiohang) > 0)
					@foreach($getDetailCart->chitietgiohang as $cart)
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{$cart->hanghoa->hinhanhhanghoa[0]->hinhanh->ha_url}}" alt="" width="100px"></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$cart->hanghoa->hh_ten}}</a></h4>
							<p>Product ID: {{$cart->hanghoa->hh_ma}}</p>
						</td>
						<td class="cart_price">
							<p>{{number_format($cart->ctgh_dongia) }} đ</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" href=""> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->ctgh_soluong}}" autocomplete="off" size="2">
								<a class="cart_quantity_down" href=""> - </a>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">{{number_format($cart->ctgh_dongia * $cart->ctgh_soluong ) }} đ</p>
						</td>
						<td class="cart_delete">
							<button class="btn btn-danger" onclick="ajaxDeleteCart(`{!! url('/cart/delete') !!}`,{!!$cart->hanghoa->hh_ma!!},`{{ Session('ss_kh_id')}}`,`{!!$cart->ctgh_soluong!!}`)"><i class="fa fa-times"></i></button>
						</td>
					</tr>
					<?php $totalPrice += ($cart->ctgh_dongia * $cart->ctgh_soluong ) ?>
					@endforeach
					@else
					<tr>
						<td colspan="5" style="height: 300px; text-align: center;font-size: 2em;color: #f3abc1">
							Không có sản phẩm nào trong giỏ 
							<p><a href="{{ url('/') }}" ><button class="btn btn-default update">Tiếp tục mua</button></a></p>
						</td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="heading">
			<h3>Bước tiếp theo!</h3>
			<p>Chọn nếu bạn có mã giảm giá hoặc điểm thưởng bạn muốn sử dụng hoặc muốn ước tính chi phí giao hàng của mình.</p>
		</div>
		<div class="row">
{{-- 			<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							<label>Discount code</label>
							<input type="text" class="form-control" placeholder="Nhập mã giảm giá..">
						</li>
					</ul>
					<a class="btn btn-default update" href="">Kiểm tra</a>
					<a class="btn btn-default check_out" href="">Áp dụng</a>
				</div>
			</div> --}}
			<div class="col-sm-6 ml-5">
				<div class="total_area">
					<ul>
						<li><strong>Tổng sản phẩm </strong><span>{{count($getDetailCart->chitietgiohang) }}</span> sản phẩm</li>
						<li><strong>Tổng số tiền</strong> <span> {{ number_format($totalPrice) }} đ</span></li>
						<li><strong>Số tiền thanh toán</strong> <span>{{ number_format($totalPrice) }} đ</span></li>
					</ul>
					<div class="mt-5">
						<button class="btn btn-default update" onClick="window.location.reload();">Cập nhật</button>
						<a href="{{ url('/checkout') }}"><button class="btn btn-dark check_out" >Thanh toán</button></a>
					</div>
						
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection