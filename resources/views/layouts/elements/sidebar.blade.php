<div class="left-sidebar">
	<!--/brands_products-->
	<h2>Nhà Sản Xuất</h2>
	<div class="panel-group category-products" id="accordian"><!--category-productsr-->	
		{{-- @foreach($getNSXOfNation as $nsxNation)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#brands{{ $loop->iteration }}">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							{{$nsxNation->qg_ten}}
						</a>
					</h4>
				</div>
				<div id="brands{{ $loop->iteration }}" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							@foreach($nsxNation->nhasanxuat as $nsx)
								<li><a href="{{ url($nsx->nsx_ma) }}">{{$nsx->nsx_ten}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		@endforeach --}}
	</div>	

	<h2>Nhà Cung Cấp</h2>
	<div class="panel-group category-products" id="accordian"><!--category-productsr-->	
		{{-- @foreach($getNCCOfNation as $nccNation)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#brandsx{{ $loop->iteration }}">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							{{$nccNation->qg_ten}}
						</a>
					</h4>
				</div>
				<div id="brandsx{{ $loop->iteration }}" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							@foreach($nccNation->nhacungcap as $ncc)
								<li><a href="{{ url($ncc->ncc_ma) }}">{{$ncc->ncc_ten}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		@endforeach --}}
	</div>	

	<div class="shipping text-center"><!--shipping-->
		<img src="{{asset('assets/images/home/shipping.jpg') }}" alt="" />
	</div>
	<!--/shipping-->					
</div>