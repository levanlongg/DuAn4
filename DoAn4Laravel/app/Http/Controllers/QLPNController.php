<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\phieu_nhap;
use App\nha_cung_cap;
use Illuminate\Http\Request;

class QLPNController extends Controller
{
    //danh sach phieu nhập
    public function getListEnterCoupon()
    {
        $listEnterCoupon = DB::table('phieu_nhap')
            ->join('nha_cung_cap', 'phieu_nhap.ID_NCC', '=', 'nha_cung_cap.ID_NCC')
            ->select('phieu_nhap.ID_PN', 'phieu_nhap.NGAY_NHAP', 'phieu_nhap.DON_GIA_NHAP', 'phieu_nhap.SO_LUONG_NHAP', 'phieu_nhap.TINH_TRANG', 'nha_cung_cap.TEN_NHA_CUNG_CAP')
            ->paginate(20);
        return view('Admin_Layout.AdminEnterCoupon.ListEnterCoupon', compact('listEnterCoupon'));
    }
    //thêm phieu nhập
    public function getAddEnterCoupon()
    {
        $listEnterCoupon = DB::table('phieu_nhap')
            ->select('phieu_nhap.ID_PN', 'phieu_nhap.NGAY_NHAP', 'phieu_nhap.DON_GIA_NHAP', 'phieu_nhap.SO_LUONG_NHAP', 'phieu_nhap.TINH_TRANG')
            ->get();
        $idncc = DB::table('nha_cung_cap')
            ->select('nha_cung_cap.ID_NCC', 'nha_cung_cap.TEN_NHA_CUNG_CAP')
            ->get();
        return view('Admin_Layout.AdminEnterCoupon.AddEnterCoupon', compact('listEnterCoupon', 'idncc'));
    }
    public function postAddEnterCoupon(Request $req)
    {
        $req->validate([
            'DON_GIA_NHAP' => 'required',
            'SO_LUONG_NHAP' => 'required',
            'TINH_TRANG' => 'required',
        ], [
            'DON_GIA_NHAP.required' => 'Đơn giá nhập không được để trống.',
            'SO_LUONG_NHAP.required' => 'Số lượng nhập không được để trống.',
            'TINH_TRANG.required' => 'Tình trạng không được để trống.',
        ]);
        $data = new phieu_nhap();
        $data->ID_NCC = $req->ID_NCC;
        $data->NGAY_NHAP = date('Y-m-d');
        $data->DON_GIA_NHAP = $req->DON_GIA_NHAP;
        $data->SO_LUONG_NHAP = $req->SO_LUONG_NHAP;
        $data->TINH_TRANG = $req->TINH_TRANG;
        $data->save();
        return redirect()->back()->with('thongbao', 'Thêm phiếu nhập thành công');
    }
    //sua phieu nhap
    public function getUpdateEnterCoupon($id)
    {
        $updateEnterCoupon = DB::table('phieu_nhap')
            ->select('phieu_nhap.ID_PN', 'phieu_nhap.ID_NCC', 'phieu_nhap.NGAY_NHAP', 'phieu_nhap.DON_GIA_NHAP', 'phieu_nhap.SO_LUONG_NHAP', 'phieu_nhap.TINH_TRANG')
            ->where('ID_PN', $id)->first();
        $idncc = DB::table('nha_cung_cap')
            ->select('nha_cung_cap.ID_NCC', 'nha_cung_cap.TEN_NHA_CUNG_CAP')
            ->get();
        return view('Admin_Layout.AdminEnterCoupon.UpdateEnterCoupon', compact('updateEnterCoupon', 'idncc'));
    }
    public function postUpdateEnterCoupon(Request $req, $id)
    {
        $req->validate([
            'DON_GIA_NHAP' => 'required',
            'SO_LUONG_NHAP' => 'required',
            'TINH_TRANG' => 'required',
        ], [
            'DON_GIA_NHAP.required' => 'Đơn giá nhập không được để trống.',
            'SO_LUONG_NHAP.required' => 'Số lượng nhập không được để trống.',
            'TINH_TRANG.required' => 'Tình trạng không được để trống.',
        ]);
        $result = DB::table('phieu_nhap')->where('ID_PN', $id)->update([
            'NGAY_NHAP' => $req->NGAY_NHAP,
            'DON_GIA_NHAP' => $req->DON_GIA_NHAP,
            'SO_LUONG_NHAP' => $req->SO_LUONG_NHAP,
            'TINH_TRANG' => $req->TINH_TRANG
        ]);
        if ($result) {
            return redirect()->back()->with('thongbao', 'Đã sửa phiếu nhập thành công');;
        } else {
            return redirect()->back()->with('thongbao', 'Sửa phiếu nhập không thành công');
        }
    }
    //xoa phieu nhap
    public function getDeleteEnterCoupon($id)
    {
        $result = DB::table('phieu_nhap')->where('ID_PN', $id)->delete();
        if ($result) {
            return redirect()->back()->with('thongbao', 'Xóa phiếu nhập thành công');;
        } else {
            return redirect()->back()->with('thongbao', 'Xóa phiếu nhập không thành công');
        }
    }
    //xem phieu nhap
    public function getEditEnterCoupon($id)
    {
        $editEnterCoupon = DB::table('phieu_nhap')
            ->join('nha_cung_cap', 'phieu_nhap.ID_NCC', '=', 'nha_cung_cap.ID_NCC')
            ->select('phieu_nhap.ID_PN', 'phieu_nhap.NGAY_NHAP', 'phieu_nhap.DON_GIA_NHAP', 'phieu_nhap.SO_LUONG_NHAP', 'phieu_nhap.TINH_TRANG','nha_cung_cap.ID_NCC','nha_cung_cap.TEN_NHA_CUNG_CAP')
            ->where('ID_PN', $id)->get();
        return view('Admin_Layout.AdminEnterCoupon.EditEnterCoupon', compact('editEnterCoupon'));
    }
    //tim kiem phieu nhap
    public function getSearchEnterCoupon(Request $req)
    {
        $searchEnterCoupon = DB::table('phieu_nhap')
        ->join('nha_cung_cap', 'phieu_nhap.ID_NCC', '=', 'nha_cung_cap.ID_NCC')
        ->where('TEN_NHA_CUNG_CAP', 'like', '%' . $req->key . '%')
        ->orwhere('NGAY_NHAP', 'like', '%' . $req->key . '%')
        ->orwhere('DON_GIA_NHAP', 'like', '%' . $req->key . '%')
        ->orwhere('SO_LUONG_NHAP', 'like', '%' . $req->key . '%')
        ->orwhere('TINH_TRANG', 'like', '%' . $req->key . '%')
        ->orWhereBetween('DON_GIA_NHAP',[0,$req->key])
        ->paginate(20);
        return view('Admin_Layout.AdminEnterCoupon.SearchEnterCoupon',compact('searchEnterCoupon'));
    }
}
