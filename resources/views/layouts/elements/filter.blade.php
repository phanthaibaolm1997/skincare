<div class="filter-block" style="box-shadow: 0px 3px 7px #f3abc1;padding: 10px;border-radius: 5px;margin-bottom: 15px;">
	<div class="brands_products"><!--brands_products-->
		<h2><i class="fa fa-bars" aria-hidden="true"></i> Filter</h2>
		<div class="brands-name">
            <div class="row">
                <div class="col-md-4">
                    <label style="color: #f3abc1; margin-top: 5px">Tìm kiếm</label>
                    <input type="text" placeholder="Tìm kiếm...." class="form-control" id="keyfilter">
                    <label style="color: #f3abc1; margin-top: 5px">Lọc giá</label>
                    <div class="well text-center">
                        <input type="text" class="span2"  value="" data-slider-min="{!! $minPrice !!}" data-slider-max="{!! $maxPrice !!}" data-slider-step="10000" data-slider-value="[{!!$minPrice!!},{!!$maxPrice!!}]" id="sl2" ><br />
                        <b class="pull-left">{{ number_format($minPrice) }} đ</b> <b class="pull-right">{{ number_format($maxPrice) }} đ</b>
                    </div>
                </div>
                <div class="col-md-8">
                    <label style="color: #f3abc1; margin-top: 5px">Loại sản phẩm</label>
                    <select class="js-example-basic-multiple" id="typefilter" name="type[]" multiple="multiple" style="width: 100%">
                    @foreach($getCategories as $cat)
                        <option value="{{ $cat->loaihang_id}}">{{ $cat->loaihang_ten }}</option>
                    @endforeach
                    </select>
                    <div class="row">
                        <div class="col-md-6">
                            <label style="color: #f3abc1; margin-top: 5px">Nhà Sản xuất</label>
                            <select class="js-example-basic-multiple" id="nsxfilter" name="nsx[]" multiple="multiple" style="width: 100%">
                            @foreach($getAllNSX as $nsx)
                                
                                <option value="{{ $nsx->nsx_id}}">{{ $nsx->nsx_ten }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label style="color: #f3abc1; margin-top: 5px">Nhà Cung Cấp</label>
                            <select class="js-example-basic-multiple" id="nccfilter" name="ncc[]" multiple="multiple" style="width: 100%">
                            @foreach($getAllNCC as $ncc)
                                <option value="{{ $ncc->ncc_id}}">{{ $ncc->ncc_ten }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <p class="text-center">
                        <button class="btn btn-primary" onclick="ajaxFilterProd()">Tìm Kiếm</button>
                    </p>
                </div>
            </div>
		</div>
	</div>
</div>