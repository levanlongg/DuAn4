<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\khach_hang;
use App\thanh_vien;

class QLKHController extends Controller
{
    public function getListCustomer()
    {
        $listcustomer=DB::table('khach_hang')
        ->join('thanh_vien','khach_hang.ID_TV','=','thanh_vien.ID_TV')
        ->select('khach_hang.ID_KH','khach_hang.TEN_KHACH_HANG','khach_hang.DIA_CHI','khach_hang.EMAIL','khach_hang.SO_DIEN_THOAI','thanh_vien.TEN_TAI_KHOAN')
        ->paginate(20);
        return view('Admin_Layout.AdminCustomer.ListCustomer', compact('listcustomer'));
    }
    //xem
    public function getEditCustomer($id)
    {
        $editcustomer=DB::table('khach_hang')
        ->join('thanh_vien','khach_hang.ID_TV','=','thanh_vien.ID_TV')
        ->select('khach_hang.ID_KH','khach_hang.TEN_KHACH_HANG','khach_hang.DIA_CHI','khach_hang.EMAIL','khach_hang.SO_DIEN_THOAI','thanh_vien.TEN_TAI_KHOAN')
        ->where('khach_hang.ID_KH',$id)
        ->get();
        return view('Admin_Layout.AdminCustomer.EditCustomer', compact('editcustomer'));
    }
    //xóa
    public function getDeleteCustomer($id)
    {
        $result = DB::table('khach_hang')
            ->where('khach_hang.ID_KH', $id)
            ->delete();
        if ($result) {
            return redirect()->back()->with('thongbao', 'Xóa thành công khách hàng');;
        } else {
            return redirect()->back()->with('thongbao', 'Xóa khách hàng không thành công');
        }
    }
    //timkiem
    public function getSearchCustomer(Request $req)
    {
        $searchcustomer = DB::table('khach_hang')
        ->join('thanh_vien','khach_hang.ID_TV','=','thanh_vien.ID_TV')
        ->select('khach_hang.ID_KH','khach_hang.TEN_KHACH_HANG','khach_hang.DIA_CHI','khach_hang.EMAIL','khach_hang.SO_DIEN_THOAI','thanh_vien.TEN_TAI_KHOAN')
        ->where('TEN_KHACH_HANG', 'like', '%' . $req->key . '%')
        ->orderBy('ID_KH', 'desc')->paginate(20);
        return view('Admin_Layout.AdminCustomer.SearchCustomer', compact('searchcustomer'));
    }
}
