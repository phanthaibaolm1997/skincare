@extends('admin.admin')
@section('content')

<div class="container-fluid">
    <div class="row" >
        <div class="col-md-8">
            <div class="main-card card">
                <div class="card-body" style="background-color: #59afec;">
                    <div class="d-flex">
                        <h5 style="flex: 1; line-height: 45px; color: #fff;">DANH SÁCH LOẠI SẢN PHẨM</h5>
                    </div>
                </div>
            </div>
            <div class="main-card card">
                <div class="card-body" style="min-height: 60vh">
                    <table class="table table-hover table-borderless table-striped" id="myTable">
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
                                <th>#{{ $cat->ma_lh}}</th>
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
        </div>
        <div class="col-md-4">
            <div class="main-card card">
                <div class="card-body" style="background-color: #59afec;">
                    <div class="d-flex">
                        <h5 style="flex: 1; line-height: 45px; color: #fff;">THÊM MỚI</h5>
                    </div>
                </div>
            </div>
            <div class="main-card card">
                <div class="card-body">
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
@endsection

@section('script')
<script  type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
</script>
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
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="main-card card">
            <div class="card-body" style="background-color: #59afec;">
                <div class="d-flex">
                    <h5 style="flex: 1; line-height: 45px; color: #fff;">UPDATE: #{{ $cat->ma_lh }}</h5>
                </div>
            </div>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.cat.edit')}}">
                <label for="">Tên Loại Hàng</label>
                <input type="text" class="form-control" name="name_e" placeholder="Name" value="{{ $cat->ten_lh }}">
                <br/>
                <label>Mô tả loại hàng</label>
                <textarea class="form-control" name="des_e" placeholder="Description" cols="8">{{ $cat->mota_lh }}</textarea>
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
<script type="text/javascript">
    $("document").ready(function(){
        setTimeout(function(){
           $("div.alert").fadeOut(300);
       }, 3000 ); 

    });
</script>