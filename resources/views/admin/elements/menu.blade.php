{{-- <div class="app-sidebar__inner">
	<ul class="vertical-nav-menu">
		<li class="app-sidebar__heading">Hàng Hóa</li>
		<li>
			<a href="#">
				<i class="metismenu-icon pe-7s-diamond"></i>
				Quản lý hàng hóa
				<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
			</a>
			<ul>
				<li>
					<a href="{{ route('hanghoa.get') }}">
						<i class="metismenu-icon"></i>
						Danh sách
					</a>
				</li>
				<li>
					<a href="{{ route('hanghoa.add') }}">
						<i class="metismenu-icon"></i>
						Thêm mới
					</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#">
				<i class="metismenu-icon pe-7s-diamond"></i>
				Quản lý Loại Hàng
				<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
			</a>
			<ul>
				<li>
					<a href="{{ route('admin.cat.get') }}">
						<i class="metismenu-icon"></i>
						Quản lý
					</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#">
				<i class="metismenu-icon pe-7s-diamond"></i>
				Đặc tính sản phẩm
				<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
			</a>
			<ul>
				<li>
					<a href="{{ route('admin.dactinh.get') }}">
						<i class="metismenu-icon"></i>
						Quản lý
					</a>
				</li>
			</ul>
		</li>

		<li class="app-sidebar__heading">NCC/NSX</li>
		<li>
			<a href="#">
				<i class="metismenu-icon pe-7s-diamond"></i>
				Provide
				<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
			</a>
			<ul>
				<li>
					<a href="{{ route('admin.provide.get') }}">
						<i class="metismenu-icon"></i>
						Quản lý
					</a>
				</li>
			</ul>
		</li>
		<li class="app-sidebar__heading">Đơn hàng</li>
		<li>
			<a href="#">
				<i class="metismenu-icon pe-7s-car"></i>
			   Quản lý đơn hàng
				<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
			</a>
			<ul>
				<li>
					<a href="{{ route('admin.order.get') }}">
						<i class="metismenu-icon">
						</i>Danh sách
					</a>
				</li>
			</ul>
		</li>
		<li  >
			<a href="{{ route('admin.lohang.get') }}">
				<i class="metismenu-icon pe-7s-display2"></i>
				Lô hàng
			</a>
		</li>
		<li class="app-sidebar__heading">Nhân sự</li>
		<li>
			<a href="{{ route('admin.nhansu.get') }}">
				<i class="metismenu-icon pe-7s-display2"></i>
				Danh sách nhân sự
			</a>
		</li>
		<li class="app-sidebar__heading">Khách hàng</li>
		<li>
			<a href="{{route('admin.khachhang.get') }}">
				<i class="metismenu-icon pe-7s-mouse">
				</i>Danh sách khách
			</a>
		</li>
		<li class="app-sidebar__heading">Thống kê</li>
		<li>
			<a href="{{route('admin.thongke') }}">
				<i class="metismenu-icon pe-7s-graph2">
				</i>Thống kê doanh thu
			</a>
		</li>
		<li class="app-sidebar__heading">Tin tức</li>
		<li>
			<a href="{{route('admin.post.get') }}" target="_blank">
				<i class="metismenu-icon pe-7s-graph2">
				</i>
				Quản lý tin tức
			</a>
		</li>
	</ul>
</div> --}}
<ul class="nav">
	<li class="active ">
		<a href="{{ route('hanghoa.get') }}">
			<i class="nc-icon nc-bank"></i>
			<p>QUẢN LÝ SẢN PHẨM</p>
		</a>
	</li>
	<li>
		<a href="{{ route('admin.cat.get') }}">
			<i class="nc-icon nc-diamond"></i>
			<p>LOẠI HÀNG</p>
		</a>
	</li>
	<li>
		<a href="{{route('admin.post.get') }}">
			<i class="nc-icon nc-pin-3"></i>
			<p>QUẢN LÝ TIN TỨC</p>
		</a>
	</li>
	<li>
		<a href="{{route('admin.thongke') }}">
			<i class="nc-icon nc-bell-55"></i>
			<p>THỐNG KÊ</p>
		</a>
	</li>
	<li>
		<a href="{{route('admin.khachhang.get') }}">
			<i class="nc-icon nc-single-02"></i>
			<p>QUẢN LÝ KHÁCH HÀNG</p>
		</a>
	</li>
	<li>
		<a href="{{ route('admin.nhansu.get') }}">
			<i class="nc-icon nc-tile-56"></i>
			<p>QUẢN LÝ NHÂN SỰ</p>
		</a>
	</li>
	<li>
		<a href="{{ route('admin.order.get') }}">
			<i class="nc-icon nc-caps-small"></i>
			<p>QUẢN LÝ ĐƠN HÀNG</p>
		</a>
	</li>
	<li >
		<a href="{{ route('admin.lohang.get') }}">
			<i class="nc-icon nc-spaceship"></i>
			<p>QUẢN LÝ LÔ HÀNG</p>
		</a>
	</li>

</ul>