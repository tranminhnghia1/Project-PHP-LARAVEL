<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return view('auth.login');
});
Route::get('/','HomePageController@list')->name('homePage');
// Route::get('/', 'LoginController@logout');
Auth::routes();
 
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager'], //--'middleware' => ['web', 'auth']]--,
function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
    
});

Route::middleware('auth')->group(function(){
    Route::get('dashboard', 'DashboardController@show')->name('dashboard');
    Route::get('admin', 'DashboardController@show');
    Route::get('admin/users/list', 'AdminUserController@list')->middleware('can:List User');
    Route::get('admin/users/add', 'AdminUserController@add')->middleware('can:Add User');
    Route::post('admin/users/store', 'AdminUserController@store');
    
    Route::get('admin/users/action', 'AdminUserController@action');
    Route::get('admin/users/delete/{id}', 'AdminUserController@delete_user')->name('delete_user')->middleware('can:Delete User');
    Route::get('admin/users/edit/{id}', 'AdminUserController@edit')->name('user.edit')->middleware('can:Edit User');
    Route::post('admin/users/update/{id}', 'AdminUserController@update')->name('user.update');
    Route::get('admin/users/role', 'AdminUserController@create')->middleware('can:List Product');

    //page
    Route::get('admin/pages/list', 'AdminPageController@list')->middleware('can:List Page');//->middleware('permission::List Page'); //custom.access để thông báo lỗi ko đc truy caapoj vao trang
    Route::get('admin/pages/add', 'AdminPageController@add')->middleware('can:Add Page');
    Route::get('admin/pages/action', 'AdminPageController@action');
    Route::post('admin/pages/store', 'AdminPageController@store');
    Route::get('admin/pages/edit/{id}', 'AdminPageController@edit')->name('page.edit')->middleware('can:Edit Page');
    Route::get('admin/pages/delete/{id}', 'AdminPageController@delete_page')->name('delete_page')->middleware('can:Delete Page');
    Route::post('admin/pages/update/{id}', 'AdminPageController@update')->name('page.update');
    //post
    Route::get('admin/posts/list', 'AdminPostController@list')->middleware('can:List Post');
    Route::get('admin/posts/add', 'AdminPostController@add')->middleware('can:Add Post');
    Route::get('admin/posts/action', 'AdminPostController@action');
    Route::post('admin/posts/store', 'AdminPostController@store');
    Route::get('admin/posts/edit/{id}', 'AdminPostController@edit')->name('post.edit')->middleware('can:Edit Post');
    Route::get('admin/posts/delete/{id}', 'AdminPostController@delete_page')->name('delete_post')->middleware('can:Delete Post');
    Route::post('admin/posts/update/{id}', 'AdminPostController@update')->name('post.update');

    Route::get('admin/posts/cat/list', 'AdminPostController@listCat')->middleware('can:List Category Post');
    Route::get('admin/posts/cat/add', 'AdminPostController@list_add_Cat')->middleware('can:Add Category Post');
    Route::post('admin/posts/storeCat', 'AdminPostController@storeCat');
    Route::get('admin/posts/cat/delete/{id}', 'AdminPostController@delete_cat')->name('delete_cat_post')->middleware('can:Delete Category Post');
    Route::get('admin/posts/cat/edit/{id}', 'AdminPostController@editCat')->name('post_cat.edit')->middleware('can:Edit Category Post');
    Route::post('admin/posts/cat/update/{id}', 'AdminPostController@updateCat')->name('post_cat.update');
    
    //product
    Route::get('admin/products/list', 'AdminProductController@list')->middleware('can:List Product')->middleware('can:List Product');
    Route::get('admin/products/add', 'AdminProductController@add')->middleware('can:Add Product')->middleware('can:Add Product');
    Route::get('admin/products/action', 'AdminProductController@action');
    Route::post('admin/products/store', 'AdminProductController@store'); 
    Route::get('admin/products/edit/{id}', 'AdminProductController@edit')->name('product.edit')->middleware('can:Edit Product');
    Route::get('admin/products/delete/{id}', 'AdminProductController@delete_page')->name('delete_post')->middleware('can:Delete Product');
    Route::post('admin/products/update/{id}', 'AdminProductController@update')->name('product.update');

    Route::get('admin/products/cat/list', 'AdminProductController@listCat')->middleware('can:List Category Product');
    Route::get('admin/products/cat/add', 'AdminProductController@addCat')->middleware('can:Add Category Product');
   
    Route::post('admin/products/cat/store', 'AdminProductController@storeCat'); 
    Route::get('admin/products/cat/edit/{id}', 'AdminProductController@editCat')->name('productCat.edit')->middleware('can:Edit Category Product');
    Route::get('admin/products/cat/delete/{id}', 'AdminProductController@delete_productCat')->name('delete_productCat')->middleware('can:Delete Category Product');
    Route::post('admin/products/cat/update/{id}', 'AdminProductController@updateCat')->name('productCat.update');

    //slider
    Route::get('admin/sliders/list', 'AdminSliderController@list')->middleware('can:List Slider');
    Route::get('admin/sliders/add', 'AdminSliderController@add')->middleware('can:Add Slider');
    Route::get('admin/sliders/action', 'AdminSliderController@action');
    Route::post('admin/sliders/store', 'AdminSliderController@store');
    Route::get('admin/sliders/edit/{id}', 'AdminSliderController@edit')->name('slider.edit')->middleware('can:Edit Slider');
    Route::get('admin/sliders/delete/{id}', 'AdminSliderController@delete_page')->name('delete_slider')->middleware('can:Delete Slider');
    Route::post('admin/sliders/update/{id}', 'AdminSliderController@update')->name('slider.update');

     //banner
     Route::get('admin/banners/list', 'AdminBannerController@list')->middleware('can:List Banner');
     Route::get('admin/banners/add', 'AdminBannerController@add')->middleware('can:Add Banner');//->middleware('permission::Add Banner');
     Route::get('admin/banners/action', 'AdminBannerController@action');
     Route::post('admin/banners/store', 'AdminBannerController@store');
     Route::get('admin/banners/edit/{id}', 'AdminBannerController@edit')->name('banner.edit')->middleware('can:Edit Banner');//->middleware('permission::Edit Banner');;
     Route::get('admin/banners/delete/{id}', 'AdminBannerController@delete_banner')->name('delete_banner')->middleware('can:Delete Banner');
     Route::post('admin/banners/update/{id}', 'AdminBannerController@update')->name('banner.update');

     //menu
     Route::get('admin/menus/list', 'AdminMenuController@list')->middleware('can:List Menu');
     Route::get('admin/menus/add', 'AdminMenuController@add')->middleware('can:Add Menu');
     Route::get('admin/menus/action', 'AdminMenuController@action');
     Route::post('admin/menus/store', 'AdminMenuController@store');
     Route::get('admin/menus/edit/{id}', 'AdminMenuController@edit')->name('menu.edit')->middleware('can:Edit Menu');
     Route::get('admin/menus/delete/{id}', 'AdminMenuController@delete_menu')->name('delete_menu')->middleware('can:Delete Menu');
     Route::post('admin/menus/update/{id}', 'AdminMenuController@update')->name('menu.update');

     //order
     Route::get('admin/orders/list', 'AdminOrderController@list')->middleware('can:List Order');
     Route::get('admin/orders/edit/{id}', 'AdminOrderController@edit')->name('order.edit')->middleware('can:Edit Order');
    Route::get('admin/orders/action', 'AdminOrderController@action');
    
    Route::get('admin/orders/delete/{id}', 'AdminOrderController@delete_order')->name('delete_order')->middleware('can:Delete Order');

    //role
    Route::post('vai-tro', 'AdminRoleController@phanvaitro')->name('phanvaitro');
    Route::get('admin/role/add', 'AdminRoleController@add')->name('add.role')->middleware('can:Add Role');
    Route::get('admin/role/list', 'AdminRoleController@list')->middleware('can:List Role')->middleware('can:List Role');
    Route::post('admin/role/store', 'AdminRoleController@store');
    Route::get('admin/role/edit/{id}', 'AdminRoleController@edit')->name('edit.role')->middleware('can:Edit Role');
    Route::post('admin/role/update/{id}', 'AdminRoleController@update')->name('update.role');
    Route::get('admin/role/delete/{id}', 'AdminRoleController@delete')->name('delete.role')->middleware('can:Delete Role');
    //permission
    Route::get('admin/permission/add', 'AdminPermissionController@add')->name('add.permission')->middleware('can:Add Permission');
    Route::post('admin/permission/store', 'AdminPermissionController@store');
    Route::get('admin/permission/delete/{id}', 'AdminPermissionController@delete')->name('delete.permission')->middleware('can:Delete Permission');
    Route::get('admin/permission/list', 'AdminPermissionController@list')->middleware('can:List Permission');
    Route::get('admin/permission/edit/{id}', 'AdminPermissionController@edit')->name('edit.permission')->middleware('can:Edit Permission');
    Route::post('admin/permission/update/{id}', 'AdminPermissionController@update')->name('update.permission');


});
///product

//Route::get('danh-muc', 'ProductController@list')->name('category-product');
Route::get('san-pham/{slug_productCat?}', 'ProductController@list')->name('category-product')->where('slug_productCat', '.*');
Route::post('loc-san-pham.html', 'ProductController@filter')->name('filter_product');
Route::get('danh-sach-san-pham', 'ProductController@litsProduct')->name('product-list');
Route::post('loc-gia-san-pham.html', 'ProductController@price')->name('price_product');
Route::get('client/components/sidebar-productCat', 'ProductController@category_product')->name('category');
Route::get('client/components/sidebar-productCat', 'HomeController@list')->name('category');
Route::get('chi-tiet-san-pham/{id}', 'ProductController@detailProduct')->name('detailProduct');
//search
Route::post('tim-liem-san-pham.html', 'ProductController@search')->name('search_product');

///blog và trang 
Route::get('Danh-sach-bai-viet.html', 'BlogController@list')->name('list_blog');
Route::get('chi-tiet-bai-viet/{id}', 'BlogController@detail_blog')->name('detail_blog');
Route::get('trang-gioi-thieu.html', 'IntroduceController@list')->name('introduce');
Route::get('trang-lien-he.html', 'IntroduceController@contact')->name('contact');

//giỏ hàng
Route::get('them-gio-hang/{id}','CartController@add')->name('cart.add');
Route::get('them-gio-hang./{id}','CartController@add_cart_detail')->name('add_cart_detail');
Route::get('gio-hang.html','CartController@list')->name('cart.list');
Route::get('xoa-san-pham/{rowId}','CartController@remove')->name('cart.remove');
Route::get('client/store','CartController@store')->name('cart.store');
Route::get('xoa-tat-ca-san-pham.html','CartController@destroy')->name('cart.destroy');
Route::post('client/update','CartController@update')->name('cart.update');
Route::post('add-to-cart-ajax', 'CartController@add_cart_ajax')->name('add_cart_ajax');
Route::post('ajax-shopping-cart', 'CartController@ajax_shopping_cart')->name('ajax_shopping_cart');
Route::get('nhap-thong-tin-thanh-toan.html','CartController@checkout')->name('checkout');
Route::post('mua-hang-thanh-cong.html','CartController@thankyou')->name('thankyou');
//ajax thông tinkh
// Route::get('/get-provinces', 'CartController@getProvinces')->name('getProvinces');
Route::get('get-districts/{province_id}', 'CartController@getDistricts')->name('getDistricts');
Route::get('get-wards/{district_id}', 'CartController@getWards')->name('getWards');
Route::get('403', function () {
    return view('errors.403');
});
//Route::get('guimail.html','CartController@checkout')->name('checkout');
