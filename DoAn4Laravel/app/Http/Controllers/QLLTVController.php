<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\loai_thanh_vien;

class QLLTVController extends Controller
{
    public function getListMembershipType()
    {
        $listmembershiptype = DB::table('loai_thanh_vien')->get();
        return view('Admin_Layout.AdminMembershipType.ListMembershipType', compact('listmembershiptype'));
    }
    //thêm
    public function getAddMembershipType()
    {
        return view('Admin_Layout.AdminMembershipType.AddMembershipType');
    }
    public function postAddMembershipType(Request $req)
    {
        $req->validate([
            'TEN_LOAI_THANH_VIEN' => 'required',
            'UU_DAI' => 'required',
        ], [
            'TEN_LOAI_THANH_VIEN.required'=>'Tên loại thành viên không được để trống',
            'UU_DAI.required'=>'Ưu đãi không được để trống'
        ]);
        $data = new loai_thanh_vien();
        $data->TEN_LOAI_THANH_VIEN=$req->TEN_LOAI_THANH_VIEN;
        $data->UU_DAI=$req->UU_DAI;
        $data->save();
        return redirect()->back()->with('thongbao', 'Đã thêm thành công');
    }
    //sua
    public function getUpdateMembershipType($id)
    {
        $loaitv = DB::table('loai_thanh_vien')->where('ID_LTV', $id)->first();
        return view('Admin_Layout.AdminMembershipType.UpdateMembershipType', compact('loaitv'));
    }
    public function postUpdateMembershipType(Request $req, $id)
    {
        $req->validate([
            'TEN_LOAI_THANH_VIEN' => 'required',
            'UU_DAI' => 'required',
        ], [
            'TEN_LOAI_THANH_VIEN.required'=>'Tên loại thành viên không được để trống',
            'UU_DAI.required'=>'Ưu đãi không được để trống'
        ]);
        $result = DB::table('loai_thanh_vien')->where('ID_LTV', $id)->update([
            'TEN_LOAI_THANH_VIEN' => $req->TEN_LOAI_THANH_VIEN,
            'UU_DAI' => $req->UU_DAI,
            ]);
        if ($result) {
            return redirect()->back()->with('thongbao', 'Đã sửa thành công');
        }
        else{
            return redirect()->back()->with('thongbao', 'Sửa không thành công');
        }
    }
    //xoa
    public function getDeleteMembershipType($id)
    {
        $result = DB::table('loai_thanh_vien')->where('ID_LTV', $id)->delete();
        if ($result) {
            return redirect()->back()->with('thongbao', 'Xóa thành công');;
        }
        else{
            return redirect()->back()->with('thongbao', 'Xóa không thành công');
        }
    }
    //tim kiem
    public function getSearchMembershipType(Request $req)
    {
        $search = DB::table('loai_thanh_vien')
        ->where('TEN_LOAI_THANH_VIEN', 'like', '%' . $req->key . '%')
        ->get();
        return view('Admin_Layout.AdminMembershipType.SearchMembershipType', compact('search'));
    }
}
