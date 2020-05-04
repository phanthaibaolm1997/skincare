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
                <div>Khách hàng
                    <div class="page-title-subheading">Trái đất cứ lặng lẽ quay.. quay quay quay vô tận mãi mãi...
                    </div>
                </div>
            </div>    
        </div>
    </div> 

    <div class="main-card card" style="min-height: 600px">
        <div class="card-body">
            <table class="table table-bordered" align="center">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>Loại khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allKH as $kh)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$kh->kh_ten}}</td>
                            <td><span class="badge badge-primary">{{$kh->loaikhachhang->lkh_ten}}</span></td>
                            <td>{{$kh->kh_sdt}}</td>
                            <td>{{$kh->email}}</td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" data-target="#modelChangePassword" id="changePW" onclick="changePwd({{$kh}})"><i class="fa fa-key" aria-hidden="true"></i></button>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalChangeInfo" onclick="changeInfo({{$kh}},{{ $AllLKH }})"><i class="fa fa-edit"  aria-hidden="true"></i></button>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalViewDetail" onclick="detailView({{$kh}})"><i class="fa fa-eye"  aria-hidden="true"></i></button>
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

<!-- Modal Change pasword -->
<div class="modal fade" id="modelChangePassword" role="dialog">
    <form method="POST" action="{{ route('khachhang.changepwd.post') }}">
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
    <form method="POST" action="{{ route('khachhang.edit.post') }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="card-title">Thay đổi thông tin khách hàng</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5 class="card-title">Loại khách hàng</h5>
                    <select class="form-control" name="lkh" required id="selectEdit">
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
                      <h5 class="card-title">Ngày sinh</h5>
                      <input type="date" name="ngaysinh" class="form-control" required id="changeInfoBirthDay">
                    
                    <br/>
                    <h5 class="card-title">Địa chỉ</h5>
                    <input type="hidden" name="id" id="changeInfoId">
                    <textarea class="form-control" name="diachi" placeholder="Nhập mô tả..." rows="5" required id="changeInfoDC"></textarea>
                    @csrf
                    <br/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- Modal edit --}}
<div class="modal fade" id="modalViewDetail" role="dialog" >
    <div class="modal-dialog modal-lg" style="max-width: 100%; height: 100vh; margin: 0px">
        <div class="modal-content" style="height: 100vh;">
            <button type="button" class="close" data-dismiss="modal" style="position: fixed; top: 5px; right: 10px;z-index: 11111111111; ">&times;</button>
            <div class="modal-body">
               <div class="row">
                   <div class="col-md-3">
                       <div style="width: 100%; height: 300px;  position: relative;">
                            <img src="https://zmp3-photo-fbcrawler.zadn.vn/avatars/0/c/d/a/0cdaeed936e1bb3b6ff53ffba6aea21c.jpg" style=" width: 100%; height: 300px; filter: blur(4px); object-fit: cover;">
                           <img src="https://zmp3-photo-fbcrawler.zadn.vn/avatars/0/c/d/a/0cdaeed936e1bb3b6ff53ffba6aea21c.jpg" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); width: 200px; height: 200px; border: 2px #fff solid; border-radius: 50%">
                       </div>
                       <br>
                       <h5 class="card-title text-center" id="yourname">Your name</h5>
                       <br>
                       <h5 class="card-title">Thông tin cá nhân</h5>
                       <br>
                       <table class="table table-borderless table-striped">
                           <tr height="60px">
                               <th>Họ tên</th>
                               <td id="yourname1"></td>
                           </tr>
                           <tr height="60px">
                               <th>Số phone</th>
                               <td id="yourphone"></td>
                           </tr>
                           <tr height="60px">
                               <th>Địa chỉ</th>
                               <td id="youraddress"></td>
                           </tr>
                           <tr height="60px">
                               <th>Email</th>
                               <td id="youremail"></td>
                           </tr>
                           <tr height="60px">
                               <th>Loại khách hàng</th>
                               <td id="yourtype"></td>
                           </tr>
                       </table>
                   </div>
                   <div class="col-md-9">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-voicemail icon-gradient bg-arielle-smile">
                                        </i>
                                    </div>
                                    <div>Chi tiết hàng hóa
                                        <div class="page-title-subheading">Trái đất cứ lặng lẽ quay.. quay quay quay vô tận mãi mãi...
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div> 
                        <div class="card mb-3 widget-content bg-midnight-bloom">
                          <div class="widget-content-wrapper text-white">
                              <div class="widget-content-left">
                                  <div class="widget-heading">Tổng tiền</div>
                                  <div class="widget-subheading">Tổng số tiền đã thanh toán</div>
                              </div>
                              <div class="widget-content-right">
                                  <div class="widget-numbers text-white"><span id="totalPrice"></span></div>
                              </div>
                          </div>
                        </div>
                        <table class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng giá trị</th>
                                    <th>Số sản phẩm</th>
                                </tr>
                            </thead>
                            <tbody id="tableView"></tbody>
                        </table> 
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function changePwd(kh){
        $('#nameChangePW').val(kh.kh_ten);
        $('#idChangePW').val(kh.kh_ma);
    }
</script>
<script type="text/javascript">
    function changeInfo(kh,lkh){
        let htmlSelect = "";
        lkh.forEach( function(e){
           if(e.lkh_ma === kh.lkh_ma){
            htmlSelect += '<option value="'+e.lkh_ma+'" selected>'+e.lkh_ten+'</option>';
           }else{
             htmlSelect += '<option value="'+e.lkh_ma+'">'+e.lkh_ten+'</option>';
           }
        });
        $('#selectEdit').html(htmlSelect);
        $('#changeInfoDC').text(kh.kh_diachi);
        $('#changeInfoSDT').val(kh.kh_sdt);
        $('#changeInfoTen').val(kh.kh_ten);
        $('#changeInfoId').val(kh.kh_ma);
        $('#changeInfoBirthDay').val(kh.kh_ngaysinh);
    }
</script>
<script type="text/javascript">
    function detailView(kh){
        let htmlTable = "";
        let totalPrice = 0;
        $('#yourname').html(kh.kh_ten);
        $('#yourname1').html(kh.kh_ten);
        $('#yourphone').html(kh.kh_sdt);
        $('#youraddress').html(kh.kh_diachi);
        $('#youremail').html(kh.email);
        $('#yourtype').html(kh.loaikhachhang.lkh_ten);
        kh.donhang.forEach( function(e){
          let price = 0;
          e.chitietdonhang.forEach( function(e){
            price += e.ctdh_soluong * e.ctdh_dongia
          });
           htmlTable += '<tr>';
           htmlTable += '<td>1</td>';
           htmlTable += '<td>'+e.dh_ngaylap+'</td>';
           htmlTable += '<td>'+price+' VNĐ</td>';
           htmlTable += '<td>'+e.chitietdonhang[0].ctdh_soluong+' sản phẩm</td>';
           htmlTable += '</tr>';
           totalPrice += price;
        });
        console.log(htmlTable);
        $('#tableView').html(htmlTable);
        $('#totalPrice').html(totalPrice);
        
    }
</script>