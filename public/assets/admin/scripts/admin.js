const formatter = new Intl.NumberFormat('vi', {
  style: 'currency',
  currency: 'VND',
  minimumFractionDigits: 0
})
function viewDetail(order){
    $(document).ready(function() {
        $('#iddh').html(order.dh_id);
        let html = '<table class="table table-borderless table-striped table-hover">';
        order.chitietdonhang.forEach(data => {
            html += '<tr>';
            html += '<td><img src="'+data.hanghoa.hinhanhhanghoa[0].hinhanh.ha_url+'" width="100px"></td>';
            html += '<td>'+data.hanghoa.hh_ten+'</td>';
            html += '<td>'+data.hanghoa.hh_giaban+' đ</td>';
            html += '<td>'+data.ctdh_soluong+' đơn vị</td>';
            html += '</tr>';
        });
        html += '</table>';
        let info = '<table class="table table-borderless">';
        info += '<tr>';
        info += '<th style="width: 250px">Người nhận: </th>';
        info += '<td>'+order.dh_nguoinhan+'</td>';
        info += '</tr>';
        info += '<tr>';
        info += '<th style="width: 250px">Địa chỉ giao hàng: </th>';
        info += '<td>'+order.dh_diachi+'</td>';
        info += '</tr>';
        info += '<tr>';
        info += '<th style="width: 250px">Số điện thoại: </th>';
        info += '<td>'+order.dh_sdt+'</td>';
        info += '</tr>';
        info += '</table>';
        $('#prod').html(html);
        $('#info').html(info);

    });

}
function CheckOut(order){
    let price = 0;
    let html = '<table class="table table-borderless table-striped table-hover">';
    order.chitietdonhang.forEach(data => {
        html += '<tr>';
        html += '<td><img src="http://127.0.0.1:8000/'+data.hanghoa.hinhanhhanghoa[0].hinhanh.ha_url+'" width="50px"></td>';
        html += '<td>'+data.hanghoa.hh_ten+'</td>';
        html += '<td>'+formatter.format(data.ctdh_dongia)+'</td>';
        html += '<td>'+data.ctdh_soluong+' đơn vị</td>';
        html += '</tr>';
        price += (data.ctdh_dongia*data.ctdh_soluong)
    });
    html += '</table>';
    let info = '<table class="table table-borderless">';
    info += '<tr>';
    info += '<th style="width: 250px">Người nhận: </th>';
    info += '<td>'+order.dh_nguoinhan+'</td>';
    info += '</tr>';
    info += '<tr>';
    info += '<th style="width: 250px">Địa chỉ giao hàng: </th>';
    info += '<td>'+order.dh_diachi+'</td>';
    info += '</tr>';
    info += '<tr>';
    info += '<th style="width: 250px">Số điện thoại: </th>';
    info += '<td>'+order.dh_sdt+'</td>';
    info += '</tr>';
    info += '</table>';
    let total = '<p class="text-right"><strong>Tổng tiền:</strong> '+formatter.format(price)+'</p>';
    $('#prod1').html(html);
    $('#info1').html(info);
    $('#total1').html(total);
    $('#dh_id').val(order.dh_ma);
    $("#checkdh").fadeIn(300);
}
function fadeOut(){
    $("#checkdh").fadeOut(300);
}
$(document).ready(function() {
    $("#checkdh").fadeOut(0);
});

$(function() {
    // Multiple images preview in browser
    
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img >')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }

    };
    $('div.gallery').html("");
    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});