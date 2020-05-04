@extends('admin.admin')
@section('content')

<div class="container-fluid">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-voicemail icon-gradient bg-arielle-smile">
					</i>
				</div>
				<div>
					Tin tức  - thêm mới
				</div>
			</div>    
		</div>
	</div> 
	<form method="POST" action="{{ route('post.add.post') }}" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="main-card card">
					<div class="card-body"style="min-height: 75vh">
						<h5 class="card-title">Tiêu đề bài viết</h5>
						<input type="text" name="tieude" placeholder="Nhập tiêu đề bài viết...." class="form-control" required>
						<br/>
						<h5 class="card-title">Nội dung bài viết</h5>
						<textarea id="editor" name="noidung" required placeholder="Nhập nội dung bài viết....."></textarea>
						<script>
							CKEDITOR.replace( 'editor',{height: 600} );
						</script>
						<br>
						<span class="card-title">Ảnh đại diện</span>
						<br/>
						<div style="width: 50%">
							<input type="file" name="file" class="file-input" required>
						</div>	
						@csrf
						<br/>
						<p class="text-left">
							<button class="btn btn-primary" type="submit">Thêm tin tức</button>
						</p>					  
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
