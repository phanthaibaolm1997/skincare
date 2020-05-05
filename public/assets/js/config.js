//////////////////////////
// Slider
// if ($.fn.slider) {
//     $('#sl2').slider();
// }
$(document).ready(function() {
    $("#slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        // fade: true,
        autoplay: true,
        dots: true,
        autoplaySpeed: 2000
    });

    $("#randProd").slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2000
    });
    $("#recomProd").slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2000
    });
    $("#slider-image").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: ".slider-image-nav"
    });
    $("#slider-image-nav").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: ".slider-image",
        dots: true,
        centerMode: true,
        focusOnSelect: true
    });

    $('input[type="range"]').rangeslider({
        polyfill: true,

        // Default CSS classes
        rangeClass: "rangeslider",
        disabledClass: "rangeslider--disabled",
        horizontalClass: "rangeslider--horizontal",
        verticalClass: "rangeslider--vertical",
        fillClass: "rangeslider__fill",
        handleClass: "rangeslider__handle",

        // Callback function
        onInit: function() {},

        // Callback function
        onSlide: function(position, value) {},

        // Callback function
        onSlideEnd: function(position, value) {}
    });
});
//////////////////////////
// Ajax
function ajaxAddToCart(url, idProd, quality, price, userId) {
    $.ajax({
        type: "GET",
        url: url,
        data: {
            idProd: idProd,
            quality: quality,
            price: price,
            userId: userId
        },
        success: function(data) {
           confirm("Đã thêm vào giỏ!");
        }
    });
}

function ajaxDeleteCart(url, hh_ma, kh_id, quality) {
    $.ajax({
        type: "GET",
        url: url,
        data: { hh_ma: hh_ma, kh_id: kh_id, quality: quality },
        success: function(data) {
            confirm("Xóa thành công!");
        }
    });
}
function showModelLogin() {
    $("#getCode").html(
        "<p class='text-danger'>Bạn chưa đăng nhập, để tiếp tục thao tác !</p>"
        );
    $("#getCodeModal").modal("show");
}
$(document).ready(function() {
    $(".js-example-basic-multiple").select2();
});

function ajaxFilterProd() {
    let ncc = $("#nccfilter").val();
    let nsx = $("#nsxfilter").val();
    let key = $("#keyfilter").val();
    let price = $("#sl2").data("sliderValue");
    console.log(price)
    let type = $("#typefilter").val();
    $.ajax({
        type: "GET",
        url: "/filter",
        data: { ncc: ncc, nsx: nsx, key: key, price: price, type: type },
        success: function(response) {
            let obj = response.data;
            let append =
            '<div class="col-md-12"><div class="alert alert-success" role="alert"> Tìm kiếm được ' +
            obj.length +
            " sản phẩm</div></div>";
            obj.forEach(
                element =>
                (append +=
                    '<div class="col-sm-3">' +
                    '<div class="product-image-wrapper">' +
                    '<div class="single-products">' +
                    '<div class="productinfo text-center">' +
                    '<div style="height: 250px; overflow: hidden;">' +
                    '<img src="http://127.0.0.1:8000/' +
                    element.hinhanhhanghoa[0].hinhanh.ha_url +
                    '" alt="" />' +
                    "</div>" +
                    "<h5>" +
                    element.hh_ten +
                    "</h5>" +
                    '<p class="textoneline">' +
                    element.hh_ten +
                    "</p>" +
                    '<a href="/product-detail/' +
                    element.hh_ma +
                    '">' +
                    '<button class="btn btn-default">' +
                    '<i class="fa fa-info"></i> Xem chi tiết' +
                    "</button>" +
                    "</a>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "</div>")
                );
            $("#ajaxFilter").html(append);
        }
    });
}
const formatter = new Intl.NumberFormat('vi', {
  style: 'currency',
  currency: 'VND',
  minimumFractionDigits: 0
})
function showHistoryOrder(order){
    let price = 0;
    let html = '<table class="table table-borderless table-striped table-hover">';
    order.chitietdonhang.forEach(data => {
        html += '<tr>';
        html += '<td><img src="'+data.hanghoa.hinhanhhanghoa[0].hinhanh.ha_url+'" width="50px"></td>';
        html += '<td>'+data.hanghoa.hh_ten+'</td>';
        html += '<td>'+formatter.format(data.ctdh_dongia)+'</td>';
        html += '<td>'+data.ctdh_soluong+' đơn vị</td>';
        html += '</tr>';
        price += (data.ctdh_dongia*data.ctdh_soluong)
    });
    html += '</table>';
    let info = '<table class="table-borderless">';
    info += '<tr>';
    info += '<th style="width: 150px">Người nhận: </th>';
    info += '<td>'+order.dh_nguoinhan+'</td>';
    info += '</tr>';
    info += '<tr>';
    info += '<th style="width: 150px">Địa chỉ giao hàng: </th>';
    info += '<td>'+order.dh_diachi+'</td>';
    info += '</tr>';
    info += '<tr>';
    info += '<th style="width: 150px">Số điện thoại: </th>';
    info += '<td>'+order.dh_sdt+'</td>';
    info += '</tr>';
    info += '</table><br/>';
    let total = '<p class="text-right"><strong>Tổng tiền:</strong> '+formatter.format(price)+'</p>';
    $('#prod1').html(html);
    $('#info1').html(info);
    $('#total1').html(total);
    $('#dh_id').val(order.dh_id);
    $("#checkdh").fadeIn(300);
}