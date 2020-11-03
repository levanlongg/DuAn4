<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\thanh_vien;

session_start();

class AdminController extends Controller
{
    // public function AuthLogin()
    // {
    //     $admin_id = Session::get('admin_id');
    //     if ($admin_id) {
    //         return Redirect::to('dashboard');
    //     } else {
    //         return Redirect::to('admin')->send();
    //     }
    // }
    public function index()
    {
        $menu_dt = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NSX')
            ->whereIn('ID_DM', [1, 2, 3, 4, 5, 6, 7])->get();
        $menu_dh = DB::table('danh_muc')
            ->select('danh_muc.TEN_DANH_MUC', 'danh_muc.ID_NCC')
            ->whereIn('ID_DM', [8, 9, 10])->get();
        return view('Client_Layout.AdminLogin', compact('menu_dt', 'menu_dh'));
    }
    // public function show_admin()
    // {
    //     $this->AuthLogin();
    //     return view('Client_Layout.AdminLogin');
    // }
    public function dashboard(Request $req)
    {
        $email = $req->EMAIL;
        $pass = $req->MAT_KHAU;
        $result = DB::table('thanh_vien')->where('EMAIL', $email)->where('MAT_KHAU', $pass)->where('ID_LTV', 1)->first();
        $result1 = DB::table('thanh_vien')->where('EMAIL', $email)->where('MAT_KHAU', $pass)->where('ID_LTV', 2)->first();
        $result2 = DB::table('thanh_vien')->where('EMAIL', $email)->where('MAT_KHAU', $pass)->where('ID_LTV', 3)->first();
        if ($result) {
            Session::put('EMAIL', $result->EMAIL);
            Session::put('MAT_KHAU', $result->MAT_KHAU);
            return redirect('/ListMember');
        } elseif ($result1) {
            Session::put('EMAIL', $result1->EMAIL);
            Session::put('MAT_KHAU', $result1->MAT_KHAU);
            return redirect('/ListProduct');
        } elseif ($result2) {
            Session::put('EMAIL', $result2->EMAIL);
            Session::put('MAT_KHAU', $result2->MAT_KHAU);
            return redirect('/ListCustomer');
        } else {
            return redirect()->back()->with('thongbao', 'Mật khẩu hoặc tài khoản không hợp lệ làm ơn nhập lại!');
        }
    }
}
