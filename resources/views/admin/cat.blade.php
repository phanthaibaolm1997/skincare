@extends('admin.admin')
@section('content')

<div class="container-fluid">
    <br>
    <div class="main-card card">
    <div class="row" >
        <div class="col-md-8">
            <div style="width: 80%; margin: auto; margin-top: 10px">
                @if (Session::has('success'))
                   {{--  <div class="alert alert-success">                   
                        <p>{!! Session::get('success') !!}</p>
                    </div> --}}
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger">                   
                        <p>{!! Session::get('error') !!}</p>
                    </div>
                    @endif
                </div>
                <div class="card-body" style="min-height: 80vh">
                    <h5 class="card-title">Loại sản phẩm</h5>
                    <table class="table table-hover table-borderless table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><span class="card-title">Tên loại hàng</span></th>
                                <th><span class="card-title">Mô tả loại hàng</span></th>
                                <th><span class="card-title">Thao tác tùy chỉnh</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allLoaiHang as $cat)
                            <tr>
                                <td><span  style="background-color: #3f6ad8; color: #fff; padding: 10px 17px; border-radius: 5px;">{{ $loop->iteration}}</span></td>
                                <td style="font-weight: bold">{{ $cat->ten_lh}}</td>
                                <td>{{ $cat->mota_lh }}</td>
                                <td> 
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $loop->iteration}}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                    <a href="{{ route('admin.cat.delete',$cat->ma_lh) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><button type="button" tabindex="1" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>

            </div>
            <div class="col-md-4">
                <div class="">
                    <div class="card-body">
                        <h5 class="card-title">Thêm mới</h5>
                        <form method="POST" action="{{ route('admin.cat.add')}}">
                            <input type="text" name="name_c" class="form-control" placeholder="Name...">
                            <br/>
                            <textarea class="form-control" rows="8" name="des_c" placeholder="Description..."></textarea>
                            <br/>
                            @csrf
                            <p class="text-right"><button class="btn btn-primary"> Thêm</button></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
    @if (Session::has('success'))
    <div style="position: fixed; top: 50px; z-index: 20 !important; right: 20px; width: 300px;">
        <div class="alert alert-success">                   
            [Thông báo] {!! Session::get('success') !!}
        </div>
    </div>
    @endif
    @if (Session::has('error'))
    <div style="position: fixed; top: 50px; z-index: 20 !important; right: 20px; width: 300px;">
        <div class="alert alert-danger">                   
            [Thông báo] : {!! Session::get('error') !!}
        </div>
    </div>

    @endif
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    @foreach($allLoaiHang as $cat)
    <div class="modal fade" id="myModal{{ $loop->iteration}}">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $cat->ten_lh }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.cat.edit')}}">
                    <label for="">ID Loại hàng</label>
                    <input type="text" class="form-control" disabled="true" placeholder="Name" value="{{ $cat->ma_lh }}">
                    <label for="">Tên Loại Hàng</label>
                    <input type="text" class="form-control" name="name_e" placeholder="Name" value="{{ $cat->ten_lh }}">
                    <label>Mô tả loại hàng</label>
                    <textarea type="text" class="form-control" name="des_e" placeholder="Description" rows="5">{{ $cat->mota_lh }}</textarea>
                    <input type="hidden" value="{{ $cat->ma_lh }}" name="id_e">
                    @csrf
                    <hr>
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
{{-- <script>
    function editCat(cat){
        let html = '<form method="POST" action="{{ route('admin.cat.edit')}}">';
        html += '<input type="text" class="form-control" name="name_e" placeholder="Name" value="'+cat.loaihang_ten+'"><br/>';
        html += '<textarea type="text" class="form-control" name="des_e" placeholder="Description" rows="5">'+cat.loaihang_mota+'</textarea><br/>';
        html += '<input type="hidden" value="'+cat.loaihang_ma+'" name="id_e">';
        html += '<p class="text-right"><button class="btn btn-primary" type="submit"> Sửa</button></p>';
        html += '@csrf </form>';
        $('#editCat').html(html);
    }
</script> --}}
<script type="text/javascript">
    $("document").ready(function(){
        setTimeout(function(){
         $("div.alert").fadeOut(300);
     }, 3000 ); 

    });
</script>