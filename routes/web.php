<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@getIndex')->name('home');
Route::get('product-detail/{id}', 'PageController@getDetailProd')->name('detail-prod');
Route::get('/category/{id}', 'PageController@ProdCat');
Route::get('/producer/{id}', 'PageController@ProdProducer');
Route::post('/danhgia', 'PageController@postDanhGia')->name('post.danhgia');

Route::get('/tin-tuc/{id}', 'PageController@getDetailPost')->name('get.post');

Route::group(['prefix'=>'cart'],function(){
    Route::get('/', 'CartController@getCart')->name('cart');
    Route::get('/add', 'CartController@addToCart')->name('add-to-cart');
    Route::get('/delete', 'CartController@deleteCart')->name('delcart');
});
Route::group(['prefix'=>'login'],function(){
    Route::get('/khachhang', 'LoginController@getLoginKH')->name('login-kh');
    Route::post('/khachhang', 'LoginController@LoginKH')->name('post.login.khachhang');
});
Route::group(['prefix'=>'checkout'],function(){
    Route::get('/', 'CartController@checkout')->name('checkout');
    Route::post('/', 'CartController@checkPayment')->name('checkout.checkout');
});
Route::group(['prefix'=>'filter'],function(){
    Route::get('/', 'PageController@filterProd');
});
Route::group(['prefix'=>'register'],function(){
    Route::get('/khachhang', 'LoginController@getRegisterKH');
    Route::post('/khachhang', 'LoginController@register')->name('register.post');
});
Route::group(['prefix'=>'history'],function(){
    Route::get('/', 'PageController@getHistory')->name('history');
    Route::post('/khachhang', 'LoginController@register')->name('register.post');
});
Route::group(['prefix'=>'profile'],function(){
    Route::get('/', 'PageController@getProfile');
    // Route::post('/khachhang', 'LoginController@register')->name('register.post');
});
Route::get('logout', 'LoginController@logout')->name('logout-khachhang');

Route::group(['prefix'=>'admin'],function(){
    Route::get('/', 'ThongKeController@index')->name('admin');
    Route::get('logout/', 'LoginController@logout')->name('logout');
    Route::group(['prefix'=>'login'],function(){
        Route::get('/', 'LoginController@getLoginAdmin');
        Route::post('/', 'LoginController@LoginAdmin')->name('post.login.admin');
    });
    Route::group(['prefix'=>'product'],function(){
        Route::get('/', 'AdminController@adminProd')->name('hanghoa.get');
        Route::get('/add', 'AdminController@adminProdAdd')->name('hanghoa.add');
        Route::post('/add', 'HangHoaController@createProd')->name('prod.add.post');
        Route::get('/edit/{id}', 'AdminController@adminProdEdit')->name('prod.edit');
        Route::post('/edit', 'HangHoaController@updateProd')->name('prod.eidt.post');
    });
    Route::group(['prefix'=>'hinhanh'],function(){
        Route::get('/delete/{id}', 'HinhAnhController@delHA')->name('hinhanh.del');
    });
    Route::group(['prefix'=>'cat'],function(){
        Route::get('/', 'AdminController@adminCat')->name('admin.cat.get');
        Route::post('/edit', 'AdminController@adminCatEdit')->name('admin.cat.edit');
        Route::post('/add', 'AdminController@adminCatAdd')->name('admin.cat.add');
        Route::get('/delete/{id}', 'AdminController@adminCatDel')->name('admin.cat.delete');
    });
    Route::group(['prefix'=>'provide'],function(){
        Route::get('/', 'AdminController@adminProv')->name('admin.provide.get');
        Route::group(['prefix'=>'nsx'],function(){
            Route::post('/add', 'AdminController@adminNSXAdd')->name('admin.nsx.add');
            Route::post('/edit', 'AdminController@adminNSXEdit')->name('admin.nsx.edit');
            Route::get('/delete/{id}', 'AdminController@adminNSXDel')->name('admin.nsx.delete');
        });
        Route::group(['prefix'=>'ncc'],function(){
            Route::post('/ncc/add', 'AdminController@adminNCCAdd')->name('admin.ncc.add');
            Route::post('/ncc/edit', 'AdminController@adminNCCEdit')->name('admin.ncc.edit');
            Route::get('/ncc/delete/{id}', 'AdminController@adminCCDel')->name('admin.ncc.delete');
        });
    });
    Route::group(['prefix'=>'order'],function(){
        Route::get('/', 'AdminController@adminOrder')->name('admin.order.get');
        Route::post('/checkout', 'AdminController@admincheckOut')->name('order.checkout');
    });
    Route::group(['prefix'=>'dactinh'],function(){
        Route::get('/', 'AdminController@adminDacTinh')->name('admin.dactinh.get');
        Route::get('/delete/{id}', 'AdminController@adminDacTinhDel')->name('admin.dactinh.delete');
        Route::post('/add', 'AdminController@adminDacTinhAdd')->name('admin.dactinh.add');
        Route::post('/edit', 'AdminController@adminDacTinhEdit')->name('admin.dactinh.edit');
    });
    Route::group(['prefix'=>'lohang'],function(){
        Route::get('/', 'LoHangController@getLoHang')->name('admin.lohang.get');
        Route::post('/add', 'LoHangController@createLoHang')->name('lohang.add.post');
    });
    Route::group(['prefix'=>'nhansu'],function(){
        Route::get('/', 'NhanVienController@getAllNV')->name('admin.nhansu.get');
        Route::post('/add', 'NhanVienController@createNhanVien')->name('nhanvien.add.post');
        Route::post('/changepwd', 'NhanVienController@changePwd')->name('nhanvien.changepwd.post');
        Route::post('/edit', 'NhanVienController@editNhanVien')->name('nhanvien.edit.post');
    });
    Route::group(['prefix'=>'khachhang'],function(){
        Route::get('/', 'KhachHangController@getAllKH')->name('admin.khachhang.get');
        Route::get('/info/{id}', 'KhachHangController@adminKHDetail')->name('admin.infoKH.get');
        Route::post('/add', 'KhachHangController@createKhachHang')->name('khachhang.add.post');
        Route::post('/changepwd', 'KhachHangController@changePwdKH')->name('khachhang.changepwd.post');
        Route::post('/edit', 'KhachHangController@editKhachHang')->name('khachhang.edit.post');
    });
    Route::group(['prefix'=>'tintuc'],function(){
        Route::get('/', 'AdminController@getAllPost')->name('admin.post.get');
        Route::get('/add', 'AdminController@getPost')->name('get.add.post');
        Route::post('/add', 'AdminController@createPost')->name('post.add.post');
        Route::get('/edit/{id}', 'AdminController@editPost')->name('get.edit.post');
        Route::post('/edit', 'AdminController@adminPostEdit')->name('post.edit.post');
        Route::get('/delete/{id}', 'AdminController@adminPostDel')->name('delete.post');
    });
    Route::group(['prefix'=>'thongke'],function(){
        Route::get('/', 'ThongKeController@index')->name('admin.thongke');
    });
});


Route::get('payment', 'PaymentController@payment')->name('payment');
Route::get('cancel', 'PaymentController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PaymentController@success')->name('payment.success');