<div class="left-sidebar">
	<div class="brands_products"><!--brands_products-->
		<h2><i class="fa fa-bars" aria-hidden="true"></i> Danh mục</h2>
		<div class="brands-name">
			<ul class="nav nav-pills nav-stacked">
				@foreach($getCategories as $category)
					<li> <a href="{{  url('/category') }}/{{ $category->loaihang_ma }}"><i class="fa fa-caret-right" aria-hidden="true"></i> {{ $category->loaihang_ten }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
</div>