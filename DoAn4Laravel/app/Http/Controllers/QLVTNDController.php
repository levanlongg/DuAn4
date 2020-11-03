<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\vai_tro;
use App\loai_thanh_vien;

class QLVTNDController extends Controller
{
    public function getListRole()
    {
        $listrole = DB::table('vai_tro')
            ->join('loai_thanh_vien', 'vai_tro.ID_LTV', '=', 'loai_thanh_vien.ID_LTV')
            ->select('vai_tro.ID_VT', 'vai_tro.TEN_LOAI_THANH_VIEN', 'vai_tro.VAI_TRO', 'loai_thanh_vien.UU_DAI')
            ->get();
        return view('Admin_Layout.AdminRole.ListRole', compact('listrole'));
    }
    public function getAddRole()//them
    {
        $idltv = DB::table('loai_thanh_vien')->select('loai_thanh_vien.ID_LTV', 'loai_thanh_vien.UU_DAI')->get();
        return view('Admin_Layout.AdminRole.AddRole', compact('idltv'));
    }
    public function postAddRole(Request $req)
    {
        $req->validate([], []);
        $datavt = new vai_tro();
        $datavt->ID_VT = $req->ID_VT;
        $datavt->TEN_LOAI_THANH_VIEN = $req->TEN_LOAI_THANH_VIEN;
        $datavt->VAI_TRO = $req->VAI_TRO;
        $datavt->ID_LTV = $req->ID_LTV;
        $datavt->save();
        return redirect()->back()->with('thongbao', 'Thêm thành công');
    }
    //xóa
    public function getDeleteRole($id)
    {
        $result = DB::table('vai_tro')
            ->where('ID_VT', $id)
            ->delete();
        if ($result) {
            return redirect()->back()->with('thongbao', 'Xóa thành công vai trò');;
        } else {
            return redirect()->back()->with('thongbao', 'Xóa không thành công vai trò.');
        }
    }
}
