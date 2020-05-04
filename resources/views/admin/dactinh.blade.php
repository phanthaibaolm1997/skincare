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
                <div>Đặc tính
                    <div class="page-title-subheading">Trái đất cứ lặng lẽ quay.. quay quay quay vô tận mãi mãi...
                    </div>
                </div>
            </div>    
        </div>
    </div> 
    <div class="row">
        <div class="col-md-8">
            <div class="main-card card">
                <div class="card-body" style="min-height: 90vh">
                    <h5 class="card-title">Đặc tính sản phẩm</h5>
                    <table class="table table-hover table-borderless table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><span class="card-title">Tên đặc tính</span></th>
                                <th><span class="card-title">Thao tác</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allDacTinh as $dt)
                            <tr>
                                <td><span  style="background-color: #3f6ad8; color: #fff; padding: 10px 17px; border-radius: 5px;">{{ $loop->iteration}}</span></td>
                                <td style="font-weight: bold">{{ $dt->dt_ten}}</td>
                                <td> 
                                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $loop->iteration}}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                   <a href="{{ route('admin.dactinh.delete',$dt->dt_ma) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><button type="button" tabindex="1" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>

               </div>

           </div>
       </div>
       <div class="col-md-4">
        <div class="main-card card md-3">
            <div class="card-body">
                <h5 class="card-title">Thêm mới đặc tính</h5>
                <form method="POST" action="{{ route('admin.dactinh.add')}}">
                    <input type="text" name="name_c" class="form-control" placeholder="Name..." required="true">
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
@foreach($allDacTinh as $dt)
    <div class="modal fade" id="myModal{{ $loop->iteration}}">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tùy chỉnh đặc tính : {{ $dt->dt_ten }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.dactinh.edit')}}">
                    <label for="">Mã Đặc Tính</label>
                    <input type="text" class="form-control" disabled="true" placeholder="Name" value="{{ $dt->dt_ma }}" required="true">
                    <label for="">Tên Đặc Tính</label>
                    <input type="text" class="form-control" name="name_e" placeholder="Name" value="{{ $dt->dt_ten }}" required="true">
                    <input type="hidden" value="{{ $dt->dt_ma }}" name="id_e">
                    @csrf
                    <hr>
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script type="text/javascript">
    $("document").ready(function(){
        setTimeout(function(){
         $("div.alert").fadeOut(300);
     }, 3000 ); 

    });
</script>s