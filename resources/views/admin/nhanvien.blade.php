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
                <div>Nhân sự
                    <div class="page-title-subheading">Quản lý tất cả thông tin của nhân sự của đơn vị...
                    </div>
                </div>
            </div>    
        </div>
    </div> 

    <div class="main-card card" style="min-height: 600px">
        <div class="card-body">
            <p class="text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới nhân sự</button></p>
            <table class="table table-bordered" align="center">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên nhân sự</th>
                        <th>Chức vụ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allNV as $nv)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$nv->nv_hoten}}</td>
                            <td><span class="badge badge-primary">{{$nv->loainhanvien->lnv_ten}}</span></td>
                            <td>{{$nv->nv_sdt}}</td>
                            <td>{{$nv->email}}</td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" data-target="#modelChangePassword" id="changePW" onclick="changePwd({{$nv}})"><i class="fa fa-key" aria-hidden="true"></i></button>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalChangeInfo" onclick="changeInfo({{$nv}},{{ $AllLNV }})"><i class="fa fa-edit"  aria-hidden="true"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<!-- Modal ADd -->
<div class="modal fade" id="myModal" role="dialog">
    <form method="POST" action="{{ route('nhanvien.add.post') }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="card-title">Thêm nhân sự</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5 class="card-title">Loại nhân sự</h5>
                    <select class="form-control" name="lnv" required>
                        @foreach($AllLNV as $lnv)
                        <option value="{{$lnv->lnv_ma}}">{{$lnv->lnv_ten}}</option>
                        @endforeach
                    </select>
                    <br/>
                    <div class="row">
                        <div class="col-md-6">
                           <h5 class="card-title">Họ và tên</h5>
                            <input type="text" name="name" class="form-control" placeholder="Nhập Tên Lô Hàng..." required>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">Số điện thoại</h5>
                            <input type="phone" name="sdt" class="form-control" required>
                        </div>
                    </div>
                    <br/>
                    <h5 class="card-title">Địa chỉ</h5>
                    <textarea class="form-control" name="diachi" placeholder="Nhập mô tả..." rows="5" required></textarea>
                    <br/>
                    <h5 class="card-title">Thông tin tài khoản</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    @csrf
                    <br/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal Change pasword -->
<div class="modal fade" id="modelChangePassword" role="dialog">
    <form method="POST" action="{{ route('nhanvien.changepwd.post') }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="card-title">Thay đổi mật khẩu</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5 class="card-title">Người dùng</h5>
                    <input type="text" name="name" class="form-control" disabled id="nameChangePW">
                    <input type="hidden" name="id" class="form-control" id="idChangePW">
                    <br/>
                    <h5 class="card-title">Mật khẩu mới</h5>
                    <input type="text" name="password" class="form-control" placeholder="Nhập Tên Lô Hàng..." required>
                    @csrf
                    <br/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- Modal edit --}}
<div class="modal fade" id="modalChangeInfo" role="dialog">
    <form method="POST" action="{{ route('nhanvien.edit.post') }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="card-title">Thay đổi thông tin nhân sự</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5 class="card-title">Loại nhân sự</h5>
                    <select class="form-control" name="lnv" required id="selectEdit">
                    </select>
                    <br/>
                    <div class="row">
                        <div class="col-md-6">
                           <h5 class="card-title">Họ và tên</h5>
                            <input type="text" name="name" class="form-control" placeholder="Nhập Tên Lô Hàng..." required id="changeInfoTen">
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">Số điện thoại</h5>
                            <input type="phone" name="sdt" class="form-control" required id="changeInfoSDT">
                        </div>
                    </div>
                    <br/>
                    <h5 class="card-title">Địa chỉ</h5>
                    <input type="hidden" name="id" id="changeInfoId">
                    <textarea class="form-control" name="diachi" placeholder="Nhập mô tả..." rows="5" required id="changeInfoDC"></textarea>
                    @csrf
                    <br/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    function changePwd(nv){
        $('#nameChangePW').val(nv.nv_hoten);
        $('#idChangePW').val(nv.nv_ma);
    }
</script>
<script type="text/javascript">
    function changeInfo(nv,lnv){
        let htmlSelect = "";
        lnv.forEach( function(e){
           if(e.lnv_ma === nv.lnv_ma){
            htmlSelect += '<option value="'+e.lnv_ma+'" selected>'+e.lnv_ten+'</option>';
           }else{
             htmlSelect += '<option value="'+e.lnv_ma+'">'+e.lnv_ten+'</option>';
           }
        });
        $('#selectEdit').html(htmlSelect);
        $('#changeInfoDC').text(nv.nv_diachi);
        $('#changeInfoSDT').val(nv.nv_sdt);
        $('#changeInfoTen').val(nv.nv_hoten);
        $('#changeInfoId').val(nv.nv_ma);
    }
</script>