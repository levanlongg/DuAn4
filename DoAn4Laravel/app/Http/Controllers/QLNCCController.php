<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nha_cung_cap;
use Illuminate\Support\Facades\DB;


class QLNCCController extends Controller
{
    public function MasterProvider()
    {
        return view('Page.MasterAdminProvider');
    }
    //danhsach
    public function getListProvider()
    {
        $listprovider = DB::table('nha_cung_cap')->paginate(10);
        return view('Admin_Layout.AdminProvider.ListProvider',compact('listprovider'));
    }
    //tim kiem
    public function getSearchProvider(Request $req)
    {
        $searchprovider = DB::table('nha_cung_cap')->where('TEN_NHA_CUNG_CAP', 'like', '%' . $req->key . '%')
        ->orwhere('DIA_CHI', 'like', '%' . $req->key . '%')
        ->get();
        return view('Admin_Layout.AdminProvider.SearchProvider',compact('searchprovider'));
    }
    //thêm
    public function getAddProvider()
    {
        return view('Admin_Layout.AdminProvider.AddProvider');
    }
    public function postAddProvider(Request $req)
    {
        $req->validate([
            'TEN_NHA_CUNG_CAP' => 'required',
            'DIA_CHI' => 'required',
            'EMAIL' => 'required|email|unique:nha_cung_cap,EMAIL',
            'SO_DIEN_THOAI' => 'required|unique:nha_san_xuat,SO_DIEN_THOAI'
        ], [
            'TEN_NHA_CUNG_CAP.required' => 'Vui lòng nhập tên nhà cung cấp',
            'DIA_CHI.required' => 'Vui lòng nhập địa chỉ',
            'EMAIL.required' => 'Vui lòng nhập email',
            'EMAIL.email' => 'Email không đúng định dạng',
            'EMAIL.unique' => 'Email đã được sử dụng',
            'SO_DIEN_THOAI.required' => 'Vui lòng nhập số điện thoại',
            'SO_DIEN_THOAI.unique' => 'Số điện thoại đã được sử dụng',
        ]);
        $dataprovider = new nha_cung_cap();
        $dataprovider->TEN_NHA_CUNG_CAP=$req->TEN_NHA_CUNG_CAP;
        $dataprovider->DIA_CHI=$req->DIA_CHI;
        $dataprovider->EMAIL=$req->EMAIL;
        $dataprovider->SO_DIEN_THOAI=$req->SO_DIEN_THOAI;
        $dataprovider->save();
        return redirect()->back()->with('thongbao', 'Thêm nhà cung cấp thành công');
    }
    public function getUpdateProvider($id)
    {
        $updateprovider = DB::table('nha_cung_cap')->where('ID_NCC', $id)->first();
        return view('Admin_Layout.AdminProvider.UpdateProvider',compact('updateprovider'));
    }
    public function postUpdateProvider(Request $req, $id)
    {
        $req->validate([
            'TEN_NHA_CUNG_CAP' => 'required',
            'DIA_CHI' => 'required',
            'EMAIL' => 'required|email',
            'SO_DIEN_THOAI' => 'required|unique:nha_san_xuat,SO_DIEN_THOAI'
        ], [
            'TEN_NHA_CUNG_CAP.required' => 'Vui lòng nhập tên nhà cung cấp',
            'DIA_CHI.required' => 'Vui lòng nhập địa chỉ',
            'EMAIL.required' => 'Vui lòng nhập email',
            'EMAIL.email' => 'Email không đúng định dạng',
            'SO_DIEN_THOAI.required' => 'Vui lòng nhập số điện thoại',
            'SO_DIEN_THOAI.unique' => 'Số điện thoại đã được sử dụng',
        ]);
        $result = DB::table('nha_cung_cap')->where('ID_NCC', $id)->update([
            'TEN_NHA_CUNG_CAP' => $req->TEN_NHA_CUNG_CAP,
            'DIA_CHI' => $req->DIA_CHI,
            'EMAIL'=>$req->EMAIL,
            'SO_DIEN_THOAI'=>$req->SO_DIEN_THOAI
            ]);
        if ($result) {
            return redirect()->back()->with('thongbao', 'Đã sửa nhà cung cấp thành công');;
        }
        else{
            return redirect()->back()->with('thongbao', 'Sửa nhà cung cấp không thành công');
        }
    }
    //xoa 
    public function getDeleteProvider($id)
    {
        $result = DB::table('nha_cung_cap')->where('ID_NCC', $id)->delete();
        if ($result) {
            return redirect()->back()->with('thongbao', 'Xóa nhà cung cấp thành công');;
        }
        else{
            return redirect()->back()->with('thongbao', 'Xóa nhà cung cấp không thành công');
        }
    }
    //xem
    public function getEditProvider($id)
    {
        $editprovider = DB::table('nha_cung_cap')->where('ID_NCC',$id)->get();
        return view('Admin_Layout.AdminProvider.EditProvider',compact('editprovider'));
    }
}
