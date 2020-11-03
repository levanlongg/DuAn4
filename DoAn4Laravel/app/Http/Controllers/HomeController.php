<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\loai_san_pham;
use Illuminate\Support\Facades\DB;
use App\slide_hinhanh;
use App\san_pham;
use App\nha_san_xuat;
use App\Cart;
use App\don_dat_hang;
use App\chitiet_ddh;
use App\khach_hang;
use App\thanh_vien;
use App\User;
use DateTime;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function Master() //hiển thị trang master
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        return view('Page.Master', compact('menu_dt', 'menu_dh'));
    }
    public function MasterSingle() //hiển thị trang master1
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        return view('Page.Master1', compact('menu_dt', 'menu_dh'));
    }
    public function Home() //hiển thị trang chủ
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        $data = DB::table('slide_hinhanh')
            ->select('slide_hinhanh.HINH_ANH', 'slide_hinhanh.TEN_HINH_ANH')
            ->get();
        $data_sp = DB::table('san_pham')
            ->select('san_pham.ID_SP', 'san_pham.HINH_ANH_1', 'san_pham.TEN_SAN_PHAM', 'san_pham.THONG_SO_KY_THUAT')
            ->where('DEMO', 1)->get();
        $data_spdt = DB::table('san_pham')
            ->select('san_pham.ID_SP', 'san_pham.HINH_ANH_1', 'san_pham.TEN_SAN_PHAM', 'san_pham.SALE', 'san_pham.GIA_NIEM_YET', 'san_pham.GIA_BAN', 'san_pham.THONG_SO_KY_THUAT')
            ->whereIn('ID_NSX', [1, 2, 3, 4, 5, 6, 7])->paginate(8);
        $data_spdh = DB::table('san_pham')
            ->select('san_pham.ID_SP', 'san_pham.HINH_ANH_1', 'san_pham.TEN_SAN_PHAM', 'san_pham.SALE', 'san_pham.GIA_NIEM_YET', 'san_pham.GIA_BAN', 'san_pham.THONG_SO_KY_THUAT')
            ->whereIn('ID_NSX', [8, 9, 10])->paginate(8);
        return view('Client_Layout.HomeLayout', compact('data', 'data_sp', 'data_spdt', 'data_spdh', 'menu_dt', 'menu_dh'));
    }
    public function Product() //hiển thị trang sản phẩm
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        $data_sp_smp = DB::table('san_pham')
            ->select('san_pham.ID_SP', 'san_pham.HINH_ANH_1', 'san_pham.TEN_SAN_PHAM', 'san_pham.SALE', 'san_pham.GIA_NIEM_YET', 'san_pham.GIA_BAN', 'san_pham.THONG_SO_KY_THUAT')
            ->whereIn('ID_NSX', [1, 2, 3, 4, 5, 6, 7])->paginate(16);
        //$data_sp_dh = DB::table('san_pham')->whereIn('ID_NSX',[8])->paginate(8);
        return view('Client_Layout.ProductLayout', compact('data_sp_smp', 'menu_dt', 'menu_dh'));
    }
    public function Services() //hiển thị trang dịch vụ
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        return view('Client_Layout.Services', compact('menu_dt', 'menu_dh'));
    }
    public function TopBrand()
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        return view('Client_Layout.TopBrand', compact('menu_dt', 'menu_dh'));
    }
    public function About() //hiển thị trang giới thiệu
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        return view('Client_Layout.About', compact('menu_dt', 'menu_dh'));
    }
    public function Policy() //hiển thị trang chính sách
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        return view('Client_Layout.Policy', compact('menu_dt', 'menu_dh'));
    }
    public function Contact() //hiển thị trang liên hệ
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        return view('Client_Layout.Contact', compact('menu_dt', 'menu_dh'));
    }
    public function ProductTopBrandPhone($smph_nsx) //hiển thị danh sách sản phẩm dien thoai theo thương hiệu trên menu động
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        $sp_nsx = DB::table('san_pham')
            ->select('san_pham.ID_SP', 'san_pham.HINH_ANH_1', 'san_pham.TEN_SAN_PHAM', 'san_pham.SALE', 'san_pham.GIA_NIEM_YET', 'san_pham.GIA_BAN', 'san_pham.THONG_SO_KY_THUAT')
            ->where('ID_NSX', $smph_nsx)->paginate(8);
        return view('Client_Layout.ProductTopBrandPhone', compact('menu_dt', 'menu_dh', 'sp_nsx'));
    }
    public function ProductTopBrandWatch($watch_nsx) //hiển thị danh sách sản phẩm đồng hồ theo thương hiệu trên menu động
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        $sp_dh_nsx = DB::table('san_pham')
            ->select('san_pham.ID_SP', 'san_pham.HINH_ANH_1', 'san_pham.TEN_SAN_PHAM', 'san_pham.SALE', 'san_pham.GIA_NIEM_YET', 'san_pham.GIA_BAN', 'san_pham.THONG_SO_KY_THUAT')
            ->where('ID_NCC', $watch_nsx)->paginate(8);
        return view('Client_Layout.ProductTopBrandWatch', compact('menu_dt', 'menu_dh', 'sp_dh_nsx'));
    }
    public function SingleProduct(Request $req, $ctsp) //hiển thị chi tiết sản phẩm điện thoại
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        //$quantity = $req->qty;
        $chitiet_sanpham = DB::table('san_pham')
            ->select('san_pham.ID_SP', 'san_pham.TEN_SAN_PHAM', 'san_pham.HINH_ANH_1', 'san_pham.GIA_BAN', 'san_pham.GIA_NIEM_YET', 'san_pham.SALE', 'san_pham.TINH_TRANG', 'san_pham.THONG_SO_KY_THUAT', 'san_pham.GIOI_THIEU_CHUNG', 'san_pham.TIEU_DE_1', 'san_pham.MO_TA_CT1', 'san_pham.TIEU_DE_2', 'san_pham.MO_TA_CT2', 'san_pham.TIEU_DE_3', 'san_pham.MO_TA_CT3')
            ->where('ID_SP', $ctsp)->get();
        return view('Client_Layout.SingleProduct', compact('menu_dt', 'menu_dh', 'chitiet_sanpham'));
    }
    public function SingleProductWatch($ctspdh) //hiển thị chi tiết sản phẩm đồng hồ
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        $chitiet_spdh = DB::table('san_pham')
            ->select('san_pham.ID_SP', 'san_pham.TEN_SAN_PHAM', 'san_pham.HINH_ANH_1', 'san_pham.GIA_BAN', 'san_pham.GIA_NIEM_YET', 'san_pham.SALE', 'san_pham.TINH_TRANG', 'san_pham.THONG_SO_KY_THUAT', 'san_pham.GIOI_THIEU_CHUNG', 'san_pham.TIEU_DE_1', 'san_pham.MO_TA_CT1', 'san_pham.TIEU_DE_2', 'san_pham.MO_TA_CT2', 'san_pham.TIEU_DE_3', 'san_pham.MO_TA_CT3')
            ->where('ID_SP', $ctspdh)->get();
        return view('Client_Layout.SingleProductWatch', compact('menu_dt', 'menu_dh', 'chitiet_spdh'));
    }
    public function getSearch(Request $req) //tìm kiếm trên trang chủ
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        $sp_search = DB::table('san_pham')
            ->select('san_pham.ID_SP', 'san_pham.ID_NSX', 'san_pham.HINH_ANH_1', 'san_pham.TEN_SAN_PHAM', 'san_pham.SALE', 'san_pham.GIA_NIEM_YET', 'san_pham.GIA_BAN', 'san_pham.THONG_SO_KY_THUAT')
            ->where('TEN_SAN_PHAM', 'like', '%' . $req->key . '%')
            //->orwhereBetween('GIA_BAN',[1, $req->key])
            ->get();
        return view('Client_Layout.Search', compact('sp_search', 'menu_dt', 'menu_dh'));
    }

    public function AddtoCart(Request $req, $id) //thêm sp vào giỏ hàng
    {
        $product = DB::table('san_pham')->where('ID_SP', $id)->first();
        if ($product != null) {
            $oldCart = Session('Cart') ? Session::get('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);
            $req->session()->put('Cart', $newCart);
            return redirect()->back();
        }
    }

    public function DeleteItemCart($id) //xóa sp trong giỏ hàng
    {
        $oldCart = Session::has('Cart') ? Session::get('Cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->product) > 0) {
            Session::put('Cart', $cart);
        } else {
            Session::forget('Cart');
        }
        return redirect()->back();
    }
    public function getRegister() //dang ky
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        return view('Client_Layout.Register', compact('menu_dt', 'menu_dh'));
    }
    public function postRegister(Request $req)
    {
        $req->validate([
            'TEN_TAI_KHOAN' => 'required',
            'MAT_KHAU' => 'required|min:6|max:20',
            'TEN_THANH_VIEN' => 'required',
            'DIA_CHI' => 'required',
            'EMAIL' => 'required|email|unique:thanh_vien,EMAIL'
        ], [
            'TEN_TAI_KHOAN.required' => 'Vui lòng nhập họ tên',
            'MAT_KHAU.required' => 'Vui lòng nhập mật khẩu',
            'MAT_KHAU.min' => 'Mật khẩu ít nhất 6 kí tự',
            'MAT_KHAU.max' => 'Mật khẩu không quá 20 kí tự',
            'TEN_THANH_VIEN.required' => 'Vui lòng nhập họ tên',
            'DIA_CHI.required' => 'Vui lòng nhập địa chỉ',
            'EMAIL.required' => 'Vui lòng nhập email',
            'EMAIL.email' => 'Email không đúng định dạng',
            'EMAIL.unique' => 'Email đã được sử dụng',
        ]);

        $thanhvien = new thanh_vien();
        $thanhvien->TEN_TAI_KHOAN = $req->TEN_TAI_KHOAN;
        $thanhvien->MAT_KHAU = $req->MAT_KHAU;
        $thanhvien->TEN_THANH_VIEN = $req->TEN_THANH_VIEN;
        $thanhvien->DIA_CHI = $req->DIA_CHI;
        $thanhvien->EMAIL = $req->EMAIL;
        $thanhvien->ID_LTV = "4";
        $thanhvien->save();

        $user = new user();
        $user->name = $thanhvien->TEN_THANH_VIEN;
        $user->email = $thanhvien->EMAIL;
        $user->password = Hash::make($thanhvien->MAT_KHAU);
        $user->save();

        return redirect()->back()->with('thongbao', 'Đã tạo tài khoản thành công');
    }

    public function getSignin() //đăng nhập
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        return view('Client_Layout.Signin', compact('menu_dt', 'menu_dh'));
    }
    //dang nhap
    public function postSignin(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required|min:6|max:20'
        ], [
            'email.required' => 'Vui lòng nhập tài khoản',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 6 kí tự',
            'password.max' => 'Mật khẩu không quá 20 kí tự'
        ]);

        $credential = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($credential)) {
            return redirect()->back()->with(['flag' => 'success', 'message' => 'Đăng nhập thành công']);
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công']);
        }
    }
    //dang xuat
    public function postSignout()
    {
        Auth::logout();
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        $data = DB::table('slide_hinhanh')
            ->select('slide_hinhanh.HINH_ANH', 'slide_hinhanh.TEN_HINH_ANH')
            ->get();
        $data_sp = DB::table('san_pham')
            ->select('san_pham.ID_SP', 'san_pham.HINH_ANH_1', 'san_pham.TEN_SAN_PHAM', 'san_pham.THONG_SO_KY_THUAT')
            ->where('DEMO', 1)->get();
        $data_spdt = DB::table('san_pham')
            ->select('san_pham.ID_SP', 'san_pham.HINH_ANH_1', 'san_pham.TEN_SAN_PHAM', 'san_pham.SALE', 'san_pham.GIA_NIEM_YET', 'san_pham.GIA_BAN', 'san_pham.THONG_SO_KY_THUAT')
            ->whereIn('ID_NSX', [1, 2, 3, 4, 5, 6, 7])->paginate(8);
        $data_spdh = DB::table('san_pham')
            ->select('san_pham.ID_SP', 'san_pham.HINH_ANH_1', 'san_pham.TEN_SAN_PHAM', 'san_pham.SALE', 'san_pham.GIA_NIEM_YET', 'san_pham.GIA_BAN', 'san_pham.THONG_SO_KY_THUAT')
            ->whereIn('ID_NSX', [8, 9, 10])->paginate(8);
        return view('Client_Layout.HomeLayout', compact('data', 'data_sp', 'data_spdt', 'data_spdh', 'menu_dt', 'menu_dh'));
    }
    public function getCheckout() //checkout giỏ hàng
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        $product = Session('Cart');
        //dd($product);
        return view('Client_Layout.Checkout', compact('menu_dt', 'menu_dh', 'product'));
    }
    public function postCheckout(Request $req) //đặt hàng
    {
        $req->validate([
            'TEN_KHACH_HANG' => 'required',
            'DIA_CHI' => 'required',
            'EMAIL' => 'required|email',
            'SO_DIEN_THOAI' => 'required',
        ], [
            'TEN_KHACH_HANG.required' => 'Vui lòng nhập họ tên',
            'DIA_CHI.required' => 'Vui lòng nhập địa chỉ',
            'EMAIL.required' => 'Vui lòng nhập email',
            'EMAIL.email' => 'Email không đúng định dạng',
            'SO_DIEN_THOAI.required' => 'Vui lòng nhập số điện thoại',
        ]);

        $newCart = Session::get('Cart');
        $customer = new khach_hang();
        $customer->TEN_KHACH_HANG = $req->TEN_KHACH_HANG;
        $customer->DIA_CHI = $req->DIA_CHI;
        $customer->EMAIL = $req->EMAIL;
        $customer->SO_DIEN_THOAI = $req->SO_DIEN_THOAI;
        $datacus = DB::table('thanh_vien')->where('thanh_vien.EMAIL', $req->EMAIL)->first()->ID_TV;
        $customer->ID_TV = $datacus;
        $customer->save();

        $bill = new don_dat_hang();
        $bill->ID_KH = DB::table('khach_hang')->where('EMAIL', $req->EMAIL)->first()->ID_KH;
        $bill->NGAY_DAT = date('Y-m-d');
        $bill->TONG_TIEN = $newCart->totalPrice;
        $bill->TRA_TIEN = "0";
        $bill->TINH_TRANG = "0";
        $bill->save();

        $id = don_dat_hang::orderByRaw('ID_DDH DESC')->skip(0)->take(1)->get()->toArray();
        $ID_DDH = $id[0]["ID_DDH"];
        foreach ($newCart->product as $key => $values) {
            $bill_detail = new chitiet_ddh();
            $bill_detail->ID_DDH = $ID_DDH;
            $bill_detail->ID_SP = $key;
            $bill_detail->SO_LUONG = $values['qty'];
            $bill_detail->GIA_BAN = ($values['price'] / $values['qty']);
            $bill_detail->save();
        }
        Session::forget('Cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công.');
    }
}
