<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\don_dat_hang;
use App\chitiet_ddh;
use App\khach_hang;
use App\san_pham;
use Illuminate\Http\Request;

class QLDDHController extends Controller
{
    //don dat hang
    public function getListOder()
    {
        $listoder = DB::table('don_dat_hang')
            ->join('khach_hang', 'don_dat_hang.ID_KH', '=', 'khach_hang.ID_KH')
            ->select('don_dat_hang.ID_DDH', 'don_dat_hang.NGAY_DAT', 'don_dat_hang.TONG_TIEN', 'don_dat_hang.TRA_TIEN', 'don_dat_hang.TINH_TRANG', 'khach_hang.TEN_KHACH_HANG')
            ->orderBy('ID_DDH', 'desc')->get();
        return view('Admin_Layout.AdminOder.ListOder', compact('listoder'));
    }
    public function getEditOder($id) //xem dơn dat hang
    {
        $editoder = DB::table('don_dat_hang')
            ->join('khach_hang', 'don_dat_hang.ID_KH', '=', 'khach_hang.ID_KH')
            ->join('chitiet_ddh', 'don_dat_hang.ID_DDH', '=', 'chitiet_ddh.ID_DDH')
            ->join('san_pham', 'chitiet_ddh.ID_SP', '=', 'san_pham.ID_SP')
            ->select('don_dat_hang.ID_DDH', 'khach_hang.TEN_KHACH_HANG', 'khach_hang.DIA_CHI', 'khach_hang.EMAIL', 'khach_hang.SO_DIEN_THOAI', 'don_dat_hang.NGAY_DAT', 'don_dat_hang.TONG_TIEN', 'don_dat_hang.TRA_TIEN', 'don_dat_hang.TINH_TRANG', 'san_pham.TEN_SAN_PHAM', 'san_pham.HINH_ANH_1', 'chitiet_ddh.SO_LUONG', 'chitiet_ddh.GIA_BAN')
            ->where('don_dat_hang.ID_DDH', $id)
            ->first();
        $editoder1 = DB::table('don_dat_hang')
            ->join('chitiet_ddh', 'don_dat_hang.ID_DDH', '=', 'chitiet_ddh.ID_DDH')
            ->join('san_pham', 'chitiet_ddh.ID_SP', '=', 'san_pham.ID_SP')
            ->select('don_dat_hang.ID_DDH', 'san_pham.TEN_SAN_PHAM', 'san_pham.HINH_ANH_1', 'chitiet_ddh.SO_LUONG', 'chitiet_ddh.GIA_BAN')
            ->where('don_dat_hang.ID_DDH', $id)
            ->get();
        return view('Admin_Layout.AdminOder.EditOder', compact('editoder', 'editoder1'));
    }
    //sua thong tin don hang
    public function getUpdateOder($id)
    {
        $editoder = DB::table('don_dat_hang')
            ->join('khach_hang', 'don_dat_hang.ID_KH', '=', 'khach_hang.ID_KH')
            ->join('chitiet_ddh', 'don_dat_hang.ID_DDH', '=', 'chitiet_ddh.ID_DDH')
            ->join('san_pham', 'chitiet_ddh.ID_SP', '=', 'san_pham.ID_SP')
            ->select('don_dat_hang.ID_DDH', 'khach_hang.TEN_KHACH_HANG', 'khach_hang.DIA_CHI', 'khach_hang.EMAIL', 'khach_hang.SO_DIEN_THOAI', 'don_dat_hang.NGAY_DAT', 'don_dat_hang.TONG_TIEN', 'don_dat_hang.TRA_TIEN', 'don_dat_hang.TINH_TRANG', 'san_pham.TEN_SAN_PHAM', 'san_pham.HINH_ANH_1', 'chitiet_ddh.SO_LUONG', 'chitiet_ddh.GIA_BAN')
            ->where('don_dat_hang.ID_DDH', $id)
            ->first();
        $editoder1 = DB::table('don_dat_hang')
            ->join('chitiet_ddh', 'don_dat_hang.ID_DDH', '=', 'chitiet_ddh.ID_DDH')
            ->join('san_pham', 'chitiet_ddh.ID_SP', '=', 'san_pham.ID_SP')
            ->select('don_dat_hang.ID_DDH', 'san_pham.TEN_SAN_PHAM', 'san_pham.HINH_ANH_1', 'chitiet_ddh.SO_LUONG', 'chitiet_ddh.GIA_BAN')
            ->where('don_dat_hang.ID_DDH', $id)
            ->get();
        return view('Admin_Layout.AdminOder.UpdateOder', compact('editoder', 'editoder1'));
    }
    public function postUpdateOder(Request $req, $id)
    {
        $req->validate([
            'TRA_TIEN' => 'required',
            'TINH_TRANG' => 'required',
        ], [
            'TRA_TIEN.required' => 'Thông tin trả tiền không được để trống.',
            'TINH_TRANG.required' => 'Tình trạng không được để trống.',
        ]);
        $result = DB::table('don_dat_hang')->where('ID_DDH', $id)->update([
            'TRA_TIEN' => $req->TRA_TIEN,
            'TINH_TRANG' => $req->TINH_TRANG,
        ]);
        if ($result) {
            return redirect()->back()->with('thongbao', 'Đã sửa thành công');;
        } else {
            return redirect()->back()->with('thongbao', 'Sửa không thành công');
        }
    }
    //xóa
    public function getDeleteOder($id)
    {
        $result = DB::table('chitiet_ddh')
            ->where('chitiet_ddh.ID_DDH', $id)
            ->delete();
        $result = DB::table('don_dat_hang')
            ->where('don_dat_hang.ID_DDH', $id)
            ->delete();
        if ($result) {
            return redirect()->back()->with('thongbao', 'Xóa đơn hàng thành công');;
        } else {
            return redirect()->back()->with('thongbao', 'Xóa đơn hàng không thành công');
        }
    }
    //timkiem
    public function getSearchOder(Request $req)
    {
        $searchoder = DB::table('don_dat_hang')
            ->join('khach_hang', 'don_dat_hang.ID_KH', '=', 'khach_hang.ID_KH')
            ->where('TEN_KHACH_HANG', 'like', '%' . $req->key . '%')
            ->orwhere('NGAY_DAT', 'like', '%' . $req->key . '%')
            ->orderBy('ID_DDH', 'desc')->get();
        return view('Admin_Layout.AdminOder.SearchOder', compact('searchoder'));
    }
    //quản lý chi tiet don dat hang
    public function getListOderDetail()
    {
        $listoderdetail = DB::table('chitiet_ddh')
            ->join('san_pham', 'chitiet_ddh.ID_SP', '=', 'san_pham.ID_SP')
            ->join('don_dat_hang', 'chitiet_ddh.ID_DDH', '=', 'don_dat_hang.ID_DDH')
            ->join('khach_hang', 'don_dat_hang.ID_KH', '=', 'khach_hang.ID_KH')
            ->select('chitiet_ddh.ID_CTDDH', 'chitiet_ddh.SO_LUONG', 'chitiet_ddh.GIA_BAN', 'san_pham.TEN_SAN_PHAM', 'san_pham.HINH_ANH_1', 'khach_hang.TEN_KHACH_HANG', 'don_dat_hang.NGAY_DAT')
            ->orderBy('ID_CTDDH', 'desc')->paginate(20);
        return view('Admin_Layout.AdminOderDetail.ListOderDetail', compact('listoderdetail'));
    }
}
