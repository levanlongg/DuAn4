<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\thanh_vien;
use App\loai_thanh_vien;

class QLTVController extends Controller
{
    public function getListMember()
    {
        $listmember = DB::table('thanh_vien')
            ->join('loai_thanh_vien', 'thanh_vien.ID_LTV', '=', 'loai_thanh_vien.ID_LTV')
            ->select('loai_thanh_vien.TEN_LOAI_THANH_VIEN', 'thanh_vien.ID_TV', 'thanh_vien.TEN_TAI_KHOAN', 'thanh_vien.MAT_KHAU', 'thanh_vien.TEN_THANH_VIEN', 'thanh_vien.DIA_CHI', 'thanh_vien.EMAIL')
            ->paginate(10);
        return view('Admin_Layout.AdminMember.ListMember', compact('listmember'));
    }
    //xem
    public function getEditMember($id)
    {
        $editmember = DB::table('thanh_vien')
            ->join('loai_thanh_vien', 'thanh_vien.ID_LTV', '=', 'loai_thanh_vien.ID_LTV')
            ->select('loai_thanh_vien.TEN_LOAI_THANH_VIEN', 'thanh_vien.ID_TV', 'thanh_vien.TEN_TAI_KHOAN', 'thanh_vien.MAT_KHAU', 'thanh_vien.TEN_THANH_VIEN', 'thanh_vien.DIA_CHI', 'thanh_vien.EMAIL')
            ->where('ID_TV', $id)
            ->get();
        return view('Admin_Layout.AdminMember.EditMember', compact('editmember'));
    }
    //xoa
    public function getDeleteMember($id)
    {
        $result = DB::table('thanh_vien')
            ->where('ID_TV', $id)
            ->delete();
        if ($result) {
            return redirect()->back()->with('thongbao', 'Xóa thành viên thành công');;
        } else {
            return redirect()->back()->with('thongbao', 'Xóa thành viên không thành công.');
        }
    }
    //timkiem
    public function getSearchMember(Request $req)
    {
        $searchmember = DB::table('thanh_vien')
        ->join('loai_thanh_vien', 'thanh_vien.ID_LTV', '=', 'loai_thanh_vien.ID_LTV')
        ->select('loai_thanh_vien.TEN_LOAI_THANH_VIEN', 'thanh_vien.ID_TV', 'thanh_vien.TEN_TAI_KHOAN', 'thanh_vien.MAT_KHAU', 'thanh_vien.TEN_THANH_VIEN', 'thanh_vien.DIA_CHI', 'thanh_vien.EMAIL')
        ->where('TEN_THANH_VIEN', 'like', '%' . $req->key . '%')
        ->orwhere('DIA_CHI', 'like', '%' . $req->key . '%')
        ->paginate(10);
        return view('Admin_Layout.AdminMember.SearchMember', compact('searchmember'));
    }
}
