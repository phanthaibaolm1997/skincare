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
                <div>Tin tức - tin tức
                    
                </div>
            </div>    
        </div>
    </div> 
    <div class="row">
         <div class="col-md-12">
            <p class="text-right"><a href="{{ route('get.add.post') }}"><button class="btn btn-primary">Thêm tin mới</button></a></p>
         </div>
        <div class="col-md-12">
            <div class="main-card card">
                <div class="card-body">
                    <h5 class="card-title">Tin tức</h5>
                    <table class="table table-hover table-borderless table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><span class="card-title">Hình ảnh</span></th>
                                <th><span class="card-title">Tiêu đề</span></th>
                                <th><span class="card-title">Ngày đăng</span></th>
                                <th><span class="card-title">Người đăng</span></th>
                                <th><span class="card-title">Thao tác</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allPosts as $post)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td><img src="{{asset($post->tin_avatar) }}" alt=""  width="96px" /></td>
                                <td>{{ $post->tin_ten}}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->nhanvien->nv_hoten }}</td>
                                <td> 
                                    <a href="{{ route('get.edit.post', $post->tin_ma) }}"><button type="button" tabindex="0" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                    <a href="{{ route('delete.post', $post->tin_ma) }}"><button type="button" tabindex="0" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $allPosts->render() !!} --}}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection