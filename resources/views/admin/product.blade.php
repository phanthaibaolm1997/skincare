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
                <div>Sản phẩm & Hàng hóa
                    <div class="page-title-subheading">Trái đất cứ lặng lẽ quay.. quay quay quay vô tận mãi mãi...
                    </div>
                </div>
            </div>    
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="main-card card">
                <div class="card-body">
                    <h5 class="card-title">Sản Phẩm</h5>
                    <table class="table table-hover table-borderless table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><span class="card-title">Hình ảnh</span></th>
                                <th><span class="card-title">Tên sản phẩm</span></th>
                                <th><span class="card-title">Giá bán</span></th>
                                <th><span class="card-title">Còn Lại</span></th>
                                <th><span class="card-title">Tùy chỉnh</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allProd as $prod)
                            <tr>
                                <td><span  style="background-color: #3f6ad8; color: #fff; padding: 10px 17px; border-radius: 5px;">{{ $loop->iteration}}</span></td>
                                <td><img src="{{asset($prod->hinhanhhanghoa[0]->hinhanh->ha_url) }}" alt="" / width="96px"></td>
                                <td style="font-weight: bold">{{ $prod->hh_ten}}</td>
                                <td>{{ number_format($prod->hh_dongia) }} đ</td>
                                <td><strong>{{ $prod->hh_conlai}}</strong> products</td>
                                <td> 
                                    <a href="{{ route('prod.edit',$prod->hh_ma) }}"><button type="button" tabindex="0" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                    <button type="button" tabindex="0" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal{{ $loop->iteration}}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $allProd->render() !!}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
<script src="{{ asset('assets/js/jquery.js') }}"></script>
@foreach($allProd as $prod)
<!-- The Modal -->
<div class="modal fade" id="myModal{{ $loop->iteration}}">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{ $prod->hh_ten }}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <h5> <i class="fa fa-picture-o" aria-hidden="true"></i> Ảnh sản phẩm</h5>
                    @foreach($prod->hinhanhhanghoa as $ha)
                        <img src="{{asset($ha->hinhanh->ha_url) }}" alt="" width="100px" />
                    @endforeach
                </div>
                <div class="col-md-8">
                    <h4 class="mt-3"> <i class="fa fa-product-hunt" aria-hidden="true"></i> Tên sản phẩm:  <strong>{{ $prod->hh_ten }}</strong></h4>
                    <h4 class="mt-3"> <i class="fa fa-usd" aria-hidden="true"></i> Giá bán sản phẩm:  <strong>{{ number_format($prod->hh_dongia) }} VND</strong></h4>
                    <h4 class="mt-3"> <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Số lượng còn lại: <strong>{{ $prod->hh_conlai }}</strong></h4>
                    
                </div>
            </div>
            <h3><i class="fa fa-info-circle" aria-hidden="true"></i> Mô tả sản phẩm</h3>
            <div>
                {!! $prod->hh_mota !!}
            </div>
          
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

  </div>
</div>
</div>
@endforeach