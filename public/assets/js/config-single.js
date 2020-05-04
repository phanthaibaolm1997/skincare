$(document).ready(function() {
	$('#slider-image').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '#slider-image-nav'
	});
	$('#slider-image-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '#slider-image',
		dots: true,
		centerMode: true,
		focusOnSelect: true
	});

});
function addCard(url, idProd, quality, price, userId) {
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
            $("#getCode").html("Thêm Sản Phẩm Thành Công!!");
            $("#getCodeModal").modal("show");
        }
    });
}
function checkLogin(){
	alert('Bạn vui lòng đăng nhập!');
}
