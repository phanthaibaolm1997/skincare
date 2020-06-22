@extends('layouts.cartmaster')
@section('content')
<?php $totalPrice = 0; ?>
<section id="cart_items">
	<form method="POST" action="{{ route('checkout.checkout') }}">
		<div class="step-one">
			<h4 class="headcheck">Bước 1: Thông tin</h4>
		</div>	
		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-4">
					<div class="shopper-info">
						<p style="text-align: center; color: #f3abc1; font-weight: bold">LƯU Ý</p>
						<p style="text-align: center; color: #f3abc1; font-size: 4em;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></p>
						<p style="text-align: center;"> Mọi thông tin cá dữ liệu cá nhân khách hàng điền bên dưới sẽ được sử dụng để phục vụ cho việc đặt và thanh toán đơn hàng... </p>
					</div>
				</div>
				<div class="col-sm-4 clearfix">
					<div class="bill-to">
						<p>Thông tin người nhận</p>
						<div class="form-one">

							<input type="text" class="form-control" placeholder="Tên người nhận..." name="dh_nguoinhan" value="{{ $getInfoKH->kh_ten }}">
							<p></p>
							<input type="text"  class="form-control" placeholder="Số điện thoại người nhận" name="dh_sdt" value="{{ $getInfoKH->kh_sdt }}">
							<p></p>
							<input type="text"   class="form-control" placeholder="Địa chỉ người nhận" name="dh_diachi" value="{{ $getInfoKH->kh_diachi }}">

						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="order-message">
						<p>Lời nhắn</p>
						<textarea name="dh_ghichu"  class="form-control" placeholder="Nhập lời nhắn với shopp.."></textarea>
					</div>	
				</div>					
			</div>
		</div>
		<div class="step-one">
			<h4 class="headcheck">Bước 2: Kiểm tra và Thanh toán</h4>
		</div>

		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Tên</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng</td>
					</tr>
				</thead>
				<tbody>
					@foreach($getDetailCart->chitietgiohang as $cart)
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{$cart->hanghoa->hinhanhhanghoa[0]->hinhanh->ha_url}}" alt="" width="100px"></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$cart->hanghoa->hh_ten}}</a></h4>
							<p>Web ID: {{$cart->hanghoa->hh_id}}</p>
						</td>
						<td class="cart_price">
							<p>{{number_format($cart->ctgh_dongia) }} đ</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">	
								<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->ctgh_soluong}}" autocomplete="off" disabled>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">{{number_format($cart->ctgh_dongia * $cart->ctgh_soluong ) }} đ</p>
						</td>
					</tr>
					<?php $totalPrice += ($cart->ctgh_dongia * $cart->ctgh_soluong ); ?>
					@endforeach
					<tr>
						<td colspan="3">
							<div class="step-one">
								<h4 class="headcheck">Bước 3: Phương thức thanh toán</h4>
							</div>
							<div class="payment-options">
								<div id="paypal-button-container"></div>
								<select class="form-control" name="pttt" id="selectOnChange">
									<option value="">---- Chọn phương thức ---- </option>
									@foreach($getPTTT as $pttt)
									<option value="{{ $pttt->pttt_ma }}" attr-price="{{$pttt->pttt_gia}}"> {{ $pttt->pttt_ten }}</option>
									@endforeach
								</select>
							</div>
							<div class="step-one">
								<h4 class="headcheck">Bước 4: Thanh toán</h4>
							</div>
							<div class="payment-options">
								<p class="text-center"><button class="btn btn-warning" name="checkOut" id="checkOutForm" type="submit"><i class="fa fa-credit-card text-white" aria-hidden="true"></i> Thanh Toán</button></p>
							</div>
						</td>
						<td colspan="2">
							<table class="table table-condensed total-result">
								<h4 class="headcheck">KIỂM TRA CUỐI</h4>
								<tr>
									<th>Tích Coin </th>
									<input type="hidden" name="coin" value="{{ $totalPrice *($getInfoKH->loaikhachhang->percent/100) }}">
									<td>{{number_format($totalPrice *($getInfoKH->loaikhachhang->percent/100)) }} coin</td>
								</tr>
								</tr>
								<tr class="shipping-cost">
									<th>Giá Ship</th>
									<td id="ship"> <a href="#" class="badge badge-info">Loadding....</a></td>										
								</tr>
								<tr>
									<th>Giá Hóa Đơn </th>
									<td><span id="fee">{{ number_format($totalPrice) }} đ</span></td>
								</tr>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		@csrf
	</form>
</section>
@endsection
<script src="{{ asset('assets/js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript">
	const getTransfer = async (number) => {
		const response = await fetch('http://data.fixer.io/api/latest?access_key=d927f89b61fbf3531c6e7c4a13075eee');
	  	const myJson = await response.json(); 
	  	let result = Math.round(number / myJson.rates.VND).toFixed(2);
	  	return result;
	}
</script>
<script src="https://www.paypal.com/sdk/js?client-id=ASzBlaPENUFhOx2asN1qm-q4NDn8ixYyNUTZyKYUkmL86rU3PmtwaWSkhkOTFnbc9-skWzbVI1EkApgZ&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
	paypal.Buttons({
		style: {
			shape: 'rect',
			color: 'gold',
			layout: 'horizontal',
			label: 'paypal',
			tagline: true,
			size : "small"
		},
		createOrder: function(data, actions) {
			return actions.order.create({
				purchase_units: [{
					amount: {
						value: '100',
					},

				}],
				payment: {
					transactions: [
					{
						amount: {
							total: '1.00',
							currency: 'USD'
						}
					}
					]
				},

			});
		},
		onApprove: function(data, actions) {
			return actions.order.capture().then(function(details) {
				$("#fee").html("0 đ");
				alert('submit');
			})
		}
	}).render('#paypal-button-container');
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#paypal-button-container').fadeOut();
		$('body').on('change', '#selectOnChange', function(event) {
			var element = $(this).find('option:selected'); 
			var price = element.attr("attr-price"); 
			var id = $(this).val();
			if(id == 2){
				$('#paypal-button-container').fadeIn();
				$('#ship').html('Free ship');
			}
			else{
				$('#paypal-button-container').fadeOut();
				$('#ship').html(price + 'đ');
			}
		});
	});
</script>
