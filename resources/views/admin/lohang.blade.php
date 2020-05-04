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
                <div>Lô Hàng
                    <div class="page-title-subheading">Trái đất cứ lặng lẽ quay.. quay quay quay vô tận mãi mãi...
                    </div>
                </div>
            </div>    
        </div>
    </div> 

    <div class="main-card card">
        <div class="card-body">
            <p class="text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Thêm mới lô hàng</button></p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên lô hàng</th>
                        <th>Người quản lý</th>
                        <th>Ngày nhập</th>
                        <th>Trị giá lô</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allLoHang as $lohang)
                    <tr height="100">
                        <th style="background: #3f6ad8; color: #fff" class="text-center">{{$loop->iteration}}</th>
                        <th>{{$lohang->lh_ten}}</th>
                        <th>{{$lohang->nhanvien->nv_hoten}}</th>
                        <th>{{$lohang->lh_ngaynhap}}</th>
                        <th>{{number_format($lohang->lh_trigia)}} đ</th>
                    </tr>
                    <tr>
                        <td colspan="5">
                            @foreach($lohang->chitietlohang as $ctlh)
                            <div style="display: flex">
                                <div style="flex-basis: 50px; margin-left: 40px">
                                    <span  style="background-color: #3f6ad8; color: #fff; padding: 10px 17px; border-radius: 50%; line-height: 64px">{{ $loop->iteration}}</span>
                                </div>
                                <div style="flex-basis: 120px">
                                    <img src="{{asset($ctlh->hanghoa->hinhanhhanghoa[0]->hinhanh->ha_url)}}" style="object-fit: cover;
                                    width: 64px;
                                    height: 64px;
                                    margin: 10px;" />
                                </div>
                                <div style="flex: 1">
                                    <h6 style="line-height: 64px">{{$ctlh->hanghoa->hh_ten}}</h6>
                                </div>
                                <div style="flex: 1">
                                    <h6 style="line-height: 64px">{{$ctlh->ctlh_soluong}} Đơn vị</h6>
                                </div>
                                <div style="flex: 1">
                                    <h6 style="line-height: 64px">{{number_format($ctlh->hanghoa->hh_dongia)}} đ</h6>

                                </div>
                            </div>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <form method="POST" action="{{ route('lohang.add.post') }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="card-title">Thêm một Lô Hàng mới</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5 class="card-title">Tên Lô Hàng</h5>
                    <input type="text" name="name" class="form-control" placeholder="Nhập Tên Lô Hàng..." required>
                    <br/>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Ngày nhập</h5>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">Trị giá</h5>
                            <input type="number" name="price" class="form-control" placeholder="Nhập giá trị.." required>
                        </div>
                    </div>
                    <br/>
                    <h5 class="card-title">Mô tả</h5>
                    <textarea class="form-control" name="des" placeholder="Nhập mô tả..." rows="5" required></textarea>
                    <br/>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Nhà cung cấp</h5>
                            <select class="form-control" name="ncc" required>
                                @foreach($allNCC as $ncc)
                                <option value="{{$ncc->ncc_ma}}">{{$ncc->ncc_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">Nhà sản xuất</h5>
                            <select class="form-control" name="nsx" required>
                                @foreach($allNSX as $nsx)
                                <option value="{{$nsx->nsx_ma}}">{{$nsx->nsx_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                    </div>
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