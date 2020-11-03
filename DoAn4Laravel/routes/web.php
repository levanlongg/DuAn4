<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
//giao diện
Route::get('Master','HomeController@Master');
Route::get('Master1','HomeController@MasterSingle');
Route::get('Home','HomeController@Home');
Route::get('Product','HomeController@Product');
Route::get('TopBrand','HomeController@TopBrand');
Route::get('About','HomeController@About');
Route::get('Services','HomeController@Services');
Route::get('Policy','HomeController@Policy');
Route::get('Contact','HomeController@Contact');
//danh sách sản phẩm theo thương hiệu trên menu động
Route::get('Phone/{smph_nsx}','HomeController@ProductTopBrandPhone');//điện thoại
Route::get('Watch/{watch_nsx}','HomeController@ProductTopBrandWatch');//động hồ
//chi tiết sản phẩm
Route::get('Sg_product/{ctsp}', 'HomeController@SingleProduct');//điện thoại
Route::get('Sg_product_watch/{ctspdh}', 'HomeController@SingleProductWatch');//đồng hồ
//tìm kiếm
Route::get('Search','HomeController@getSearch');
//giỏ hàng
Route::get('Add_Cart/{id}', 'HomeController@AddtoCart');//thêm sp vào giỏ
Route::get('Del_Cart/{id}', 'HomeController@DeleteItemCart');//xóa sản phẩm trong giỏ
Route::get('Destroy', 'HomeController@Destroycart');//xóa sản phẩm trong giỏ
Route::get('Cart','HomeController@getCheckout');//chi tiết đơn hàng
Route::post('Cart','HomeController@postCheckout')->name('dathang');
Route::get('thongbao','HomeController@getCheckout');//thông báo
//dang nhap
Route::get('Signin','HomeController@getSignin');
Route::post('Signin','HomeController@postSignin')->name('Dangnhap');
//dang xuat
Route::get('Signout','HomeController@postSignout')->name('Dangxuat');
//đăng ký
Route::get('Register','HomeController@getRegister');
Route::post('Register','HomeController@postRegister')->name('Dangky');;
Route::get('thongbao','HomeController@getRegister');//thông báo
// Admin sp
Route::get('Adminsp','QLSPController@MasterAd');
Route::get('ListProduct','QLSPController@ListPro');
Route::get('Searchsp','QLSPController@SearchPro');//timkiem
Route::get('AddPro','QLSPController@getAddProduct');//them
Route::post('AddPro','QLSPController@postAddProduct')->name('Themsp');
Route::get('UpdatePro/{id}','QLSPController@getUpdateProduct');//sua
Route::post('UpdatePro/{id}','QLSPController@postUpdateProduct');
Route::get('DelPro/{id}','QLSPController@DeleteProduct');//xoa
Route::get('EditPro/{id}','QLSPController@EditProduct');//xem
//admin lsp
Route::get('Adminlsp','QLLSPController@MasterAdprotype');
Route::get('ListProductType','QLLSPController@ListProType');
Route::get('Searchlsp','QLLSPController@SearchProType');//timkiem
Route::get('AddProType','QLLSPController@getAddProductType');//thêm
Route::post('AddProType','QLLSPController@postAddProductType')->name('Themlsp');
Route::get('UpdateProType/{id}','QLLSPController@getUpdateProductType');//sua
Route::post('UpdateProType/{id}','QLLSPController@postUpdateProductType');
Route::get('EditProType/{id}','QLLSPController@EditProductType');//xem
Route::get('DelProType/{id}','QLLSPController@DeleteProductType');//xoa
//admin nsx
Route::get('Adminnsx','QLNSXController@MasterAdProducer');
Route::get('ListProducer','QLNSXController@getListProducer');
Route::get('SearchProducer','QLNSXController@getSearchProducer');//timkiem
Route::get('AddProducer','QLNSXController@getAddProducer');//them
Route::post('AddProducer','QLNSXController@postAddProducer')->name('Themnsx');
Route::get('UpdateProducer/{id}','QLNSXController@getUpdateProducer');//sua
Route::post('UpdateProducer/{id}','QLNSXController@postUpdateProducer');
Route::get('EditProducer/{id}','QLNSXController@getEditProducer');//xem
Route::get('DeleteProducer/{id}','QLNSXController@getDeleteProducer');//xoa
//admin nha cung cap
Route::get('AdminProvider','QLNCCController@MasterProvider');
Route::get('ListProvider','QLNCCController@getListProvider');
Route::get('SearchProvider','QLNCCController@getSearchProvider');//timkiem
Route::get('AddProvider','QLNCCController@getAddProvider');//them
Route::post('AddProvider','QLNCCController@postAddProvider')->name('Themncc');
Route::get('UpdateProvider/{id}','QLNCCController@getUpdateProvider');//sua
Route::post('UpdateProvider/{id}','QLNCCController@postUpdateProvider');
Route::get('EditProvider/{id}','QLNCCController@getEditProvider');//xem
Route::get('DeleteProvider/{id}','QLNCCController@getDeleteProvider');//xoa
//danh muc
Route::get('ListCatalogue','QLDMController@getListCatalogue');
Route::get('AddCatalogue','QLDMController@getAddCatalogue');
Route::post('AddCatalogue','QLDMController@postAddCatalogue')->name('Themdm');
Route::get('DeleteCatalogue/{id}','QLDMController@getDeleteCatalogue');
//phieu nhap
Route::get('ListEnterCoupon','QLPNController@getListEnterCoupon');//danh sach
Route::get('AddEnterCoupon','QLPNController@getAddEnterCoupon');//them
Route::post('AddEnterCoupon','QLPNController@postAddEnterCoupon')->name('Thempn');
Route::get('UpdateEnterCoupon/{id}','QLPNController@getUpdateEnterCoupon');//sua
Route::post('UpdateEnterCoupon/{id}','QLPNController@postUpdateEnterCoupon');
Route::get('DeleteEnterCoupon/{id}','QLPNController@getDeleteEnterCoupon');//xoa
Route::get('EditEnterCoupon/{id}','QLPNController@getEditEnterCoupon');//xem
Route::get('SearchEnterCoupon','QLPNController@getSearchEnterCoupon');//tim kiem
//admin don hang
Route::get('ListOder','QLDDHController@getListOder');
Route::get('EditOder/{id}','QLDDHController@getEditOder');//xem
Route::get('UpdateOder/{id}','QLDDHController@getUpdateOder');//sua
Route::post('UpdateOder/{id}','QLDDHController@postUpdateOder');
Route::get('DeleteOder/{id}','QLDDHController@getDeleteOder');//xoa
Route::get('SearchOder','QLDDHController@getSearchOder');//TimKiem
//khach hang
Route::get('ListCustomer','QLKHController@getListCustomer');
Route::get('SearchCustomer','QLKHController@getSearchCustomer');//tim kiem
Route::get('EditCustomer/{id}','QLKHController@getEditCustomer');//xem
Route::get('DeleteCustomer/{id}','QLKHController@getDeleteCustomer');//xoa
//chi tiet don hang
Route::get('ListOderDetail','QLDDHController@getListOderDetail');
//slide ảnh trang chủ
Route::get('ListSlide','QLSLAController@getListSlide');
Route::get('AddSlide','QLSLAController@getAddSlide');//thêm
Route::post('AddSlide','QLSLAController@postAddSlide')->name('Themha');
Route::get('DeleteSlide/{id}','QLSLAController@getDeleteSlide');//xóa
//vai tro
Route::get('ListRole','QLVTNDController@getListRole');
Route::get('AddRole','QLVTNDController@getAddRole');//them
Route::post('AddRole','QLVTNDController@postAddRole')->name('Themvtnd');
Route::get('DeleteRole/{id}','QLVTNDController@getDeleteRole');//xóa
//thanh vien
Route::get('ListMember','QLTVController@getListMember');
Route::get('EditMember/{id}','QLTVController@getEditMember');//xem
Route::get('DeleteMember/{id}','QLTVController@getDeleteMember');//xóa
Route::get('SearchMember','QLTVController@getSearchMember');//tim kiem
//loai thanh vien
Route::get('ListMembershipType','QLLTVController@getListMembershipType');
Route::get('AddMembershipType','QLLTVController@getAddMembershipType');
Route::post('AddMembershipType','QLLTVController@postAddMembershipType')->name('Themltv');
Route::get('UpdateMembershipType/{id}','QLLTVController@getUpdateMembershipType');//sua
Route::post('UpdateMembershipType/{id}','QLLTVController@postUpdateMembershipType');
Route::get('DeleteMembershipType/{id}','QLLTVController@getDeleteMembershipType');//xoa
Route::get('SearchMembershipType','QLLTVController@getSearchMembershipType');
//dang nhap admin
Route::get('AdminLogin','AdminController@index');
Route::post('AdminLogin','AdminController@dashboard')->name('Dangnhap1');