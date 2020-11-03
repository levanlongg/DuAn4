<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\danh_muc;
use App\nha_san_xuat;
use App\nha_cung_cap;

class QLDMController extends Controller
{
    //danh sach
    public function getListCatalogue()
    {
        $listcatalogue = DB::table('danh_muc')
            ->join('nha_san_xuat', 'danh_muc.ID_NSX', '=', 'nha_san_xuat.ID_NSX')
            ->join('nha_cung_cap', 'danh_muc.ID_NCC', '=', 'nha_cung_cap.ID_NCC')
            ->select('danh_muc.ID_DM', 'danh_muc.TEN_DANH_MUC', 'nha_san_xuat.TEN_NHA_SAN_XUAT', 'nha_cung_cap.TEN_NHA_CUNG_CAP')
            ->paginate(10);
        return view('Admin_Layout.AdminCatalogue.ListCatalogue', compact('listcatalogue'));
    }
    //them danh mục
    public function getAddCatalogue()
    {
        $idncc = DB::table('nha_cung_cap')
            ->select('nha_cung_cap.ID_NCC', 'nha_cung_cap.TEN_NHA_CUNG_CAP')->get();
        $idnsx = DB::table('nha_san_xuat')
            ->select('nha_san_xuat.ID_NSX', 'nha_san_xuat.TEN_NHA_SAN_XUAT')->get();
        return view('Admin_Layout.AdminCatalogue.AddCatalogue', compact('idncc', 'idnsx'));
    }
    public function postAddCatalogue(Request $req)
    {
        $req->validate([
            'ID_DM'=>'required|unique:danh_muc,ID_DM',
            'TEN_DANH_MUC'=>'required|unique:danh_muc,TEN_DANH_MUC',
        ],[
            'ID_DM.required'=>'Id danh mục không được để trống.',
            'ID_DM.unique'=>'Id danh mục đã được sử dụng',
            'TEN_DANH_MUC.required'=>'Tên danh mục không được để trống.',
            'TEN_DANH_MUC.unique'=>'Tên danh mục đã được sử dụng',
        ]);
        $data = new danh_muc();
        $data->ID_DM = $req->ID_DM;
        $data->TEN_DANH_MUC = $req->TEN_DANH_MUC;
        $data->ID_NSX = $req->ID_NSX;
        $data->ID_NCC = $req->ID_NCC;
        $data->save();
        return redirect()->back()->with('thongbao', 'Đã thêm danh mục thành công');
    }
    //xoa danh muc
    public function getDeleteCatalogue($id)
    {
        $result = DB::table('danh_muc')->where('ID_DM', $id)->delete();
        if ($result) {
            return redirect()->back()->with('thongbao', 'Xóa danh mục thành công');;
        }
        else{
            return redirect()->back()->with('thongbao', 'Xóa danh mục không thành công');
        }
    }
}
