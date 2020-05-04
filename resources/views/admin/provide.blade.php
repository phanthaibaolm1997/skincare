@extends('admin.admin')
@section('content')

<div class="container-fluid">
<br />
<div class="row">
    <div class="col-md-4">
        <div class="main-card card md-3">
            <div class="card-body">
                <h5 class="card-title">Thêm mới</h5>
                <form method="POST" action="{{ route('admin.nsx.add')}}">
                    <input type="text" name="name" class="form-control" placeholder="Name...">
                    <br/>
                    @csrf
                    <p class="text-right"><button class="btn btn-primary"> Thêm</button></p>
                </form>
            </div>
        </div>
        <div class="main-card card" style="margin-top: 10px">
            <div class="card-body">
                <h5 class="card-title">Tùy chỉnh</h5>
                <div id="editNSX">
                    <br/>
                    <br/>
                    <br/>
                    <p class="text-center">Edit here</p>
                    <br/>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="main-card card">
            <div style="width: 80%; margin: auto; margin-top: 10px">
                @if (Session::has('success'))
                <div class="alert alert-success">                   
                    <p>{!! Session::get('success') !!}</p>
                </div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger">                   
                    <p>{!! Session::get('error') !!}</p>
                </div>
                @endif
            </div>
            <div class="card-body">
                <h5 class="card-title">Nhà sản xuất</h5>
                <table class="table table-hover table-borderless table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><span class="card-title">Tên Nhà sản xuất</span></th>
                            <th><span class="card-title">Chỉnh sửa</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allNSX as $nsx)
                        <tr>
                            <td><span  style="background-color: #3f6ad8; color: #fff; padding: 10px 17px; border-radius: 5px;">{{ $loop->iteration}}</span></td>
                            <td style="font-weight: bold">{{ $nsx->nsx_ten}}</td>
                            <td> <div class="dropdown d-inline-block">
                                <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-dark">Tùy chỉnh</button>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                                    <button type="button" tabindex="0" class="dropdown-item" onClick="editNSX({{$nsx}})">Sửa</button>
                                    <a href="{{ route('admin.nsx.delete',$nsx->nsx_ma) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><button type="button" tabindex="1" class="dropdown-item">Xóa</button></a>
                                </div>
                            </div></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>
<hr/>
<div class="row">
     <div class="col-md-4">
        <div class="main-card card md-3">
            <div class="card-body">
                <h5 class="card-title">Thêm mới</h5>
                <form method="POST" action="{{ route('admin.ncc.add')}}">
                    <input type="text" name="name" class="form-control" placeholder="Name...">
                    <br/>
                    @csrf
                    <p class="text-right"><button class="btn btn-primary"> Thêm</button></p>
                </form>
            </div>
        </div>
        <div class="main-card card" style="margin-top: 10px">
            <div class="card-body">
                <h5 class="card-title">Tùy chỉnh</h5>
                <div id="editNCC">
                    <br/>
                    <br/>
                    <br/>
                    <p class="text-center">Edit here</p>
                    <br/>
                    <br/>
                    <br/>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="main-card card">

            <div style="width: 80%; margin: auto; margin-top: 10px">
                @if (Session::has('success'))
                <div class="alert alert-success">                   
                    <p>{!! Session::get('success') !!}</p>
                </div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger">                   
                    <p>{!! Session::get('error') !!}</p>
                </div>
                @endif
            </div>
            <div class="card-body">
                <h5 class="card-title">Nhà cung cấp</h5>
                <table class="table table-hover table-borderless table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><span class="card-title">Tên nhà cung cấp</span></th>
                            <th><span class="card-title">Chỉnh sửa</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allNCC as $ncc)
                        <tr>
                            <td><span  style="background-color: #3f6ad8; color: #fff; padding: 10px 17px; border-radius: 5px;">{{ $loop->iteration}}</span></td>
                            <td style="font-weight: bold">{{ $ncc->ncc_ten}}</td>

                            <td> <div class="dropdown d-inline-block">
                                <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-dark">Tùy chỉnh</button>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                                    <button type="button" tabindex="0" class="dropdown-item" onClick="editNCC({{$ncc}})">Sửa</button>
                                    <a href="{{ route('admin.ncc.delete',$ncc->ncc_ma) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><button type="button" tabindex="1" class="dropdown-item">Xóa</button></a>
                                </div>
                            </div></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
   
</div>
</div>
@endsection
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script>
    function editNSX(nsx){
        const qg_ma = nsx.qg_ma; 
        let html = '<form method="POST" action="{{ route('admin.nsx.edit')}}">';
        html += '<input type="text" class="form-control" name="name" placeholder="Name" value="'+nsx.nsx_ten+'"><br/>';
        html += '<input type="hidden" value="'+nsx.nsx_ma+'" name="id">';
        html += '<p class="text-right"><button class="btn btn-primary" type="submit"> Sửa</button></p>';
        html += '@csrf </form>';
        $('#editNSX').html(html);
    }
    function editNCC(ncc){
        const qg_ma = ncc.qg_ma; 
        let html = '<form method="POST" action="{{ route('admin.ncc.edit')}}">';
        html += '<input type="text" class="form-control" name="name" placeholder="Name" value="'+ncc.ncc_ten+'"><br/>';
        html += '<input type="hidden" value="'+ncc.ncc_ma+'" name="id">';
        html += '<p class="text-right"><button class="btn btn-primary" type="submit"> Sửa</button></p>';
        html += '@csrf </form>';
        $('#editNCC').html(html);
    }
    
</script>
<script type="text/javascript">
    $("document").ready(function(){
        setTimeout(function(){
         $("div.alert").remove();
     }, 5000 ); 

    });
</script>