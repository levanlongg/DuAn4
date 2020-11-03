<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\nha_san_xuat;

class QLNSXController extends Controller
{
    public function MasterAdProducer()
    {
        return view('Page.MasterAdminProducer');
    }
    //danh sach
    public function getListProducer()
    {
        $listproducer=DB::table('nha_san_xuat')->paginate(10);
        return view('Admin_Layout.AdminProducer.ListProducer',compact('listproducer'));
    }
    //tim kiem
    public function getSearchProducer(Request $req)
    {
        $searchproducer = DB::table('nha_san_xuat')->where('TEN_NHA_SAN_XUAT', 'like', '%' . $req->key . '%')
        ->orwhere('DIA_CHI', 'like', '%' . $req->key . '%')
        ->get();
        return view('Admin_Layout.AdminProducer.SearchProducer',compact('searchproducer'));
    }
    //them
    public function getAddProducer()
    {
        return view('Admin_Layout.AdminProducer.AddProducer');
    }
    public function postAddProducer(Request $req)
    {
        $req->validate([
            'TEN_NHA_SAN_XUAT' => 'required',
            'DIA_CHI' => 'required',
            'EMAIL' => 'required|email|unique:nha_san_xuat,EMAIL',
            'SO_DIEN_THOAI' => 'required|unique:nha_san_xuat,SO_DIEN_THOAI'
        ], [
            'TEN_NHA_SAN_XUAT.required' => 'Vui lòng nhập tên nhà sản xuất',
            'DIA_CHI.required' => 'Vui lòng nhập địa chỉ',
            'EMAIL.required' => 'Vui lòng nhập email',
            'EMAIL.email' => 'Email không đúng định dạng',
            'EMAIL.unique' => 'Email đã được sử dụng',
            'SO_DIEN_THOAI.required' => 'Vui lòng nhập số điện thoại',
            'SO_DIEN_THOAI.unique' => 'Số điện thoại đã được sử dụng',
        ]);
        $dataproducer = new nha_san_xuat();
        $dataproducer->TEN_NHA_SAN_XUAT=$req->TEN_NHA_SAN_XUAT;
        $dataproducer->DIA_CHI=$req->DIA_CHI;
        $dataproducer->EMAIL=$req->EMAIL;
        $dataproducer->SO_DIEN_THOAI=$req->SO_DIEN_THOAI;
        $get_image1 = $req->file('LOGO');
        if ($get_image1) {
            $get_new_image1 = $get_image1->getClientOriginalName();
            $name_image1 = current(explode('.', $get_new_image1));
            $new_image1 = $name_image1 . '.' . $get_image1->getClientOriginalExtension();
            $get_image1->move(base_path() . '/public/image_sp/', $new_image1);
            $dataproducer->LOGO = $new_image1;
            $dataproducer->save();
            return redirect()->back()->with('thongbao', 'Thêm nhà sản xuất thành công');
        }
        $dataproducer->LOGO = '0';
        $dataproducer->save();
        return redirect()->back()->with('thongbao', 'Thêm nhà sản xuất thành công');
    }
    //sua
    public function getUpdateProducer($id)
    {
        $producer = DB::table('nha_san_xuat')->where('ID_NSX', $id)->first();
        return view('Admin_Layout.AdminProducer.UpdateProducer',compact('producer'));
    }
    public function postUpdateProducer(Request $req, $id)
    {
        $req->validate([
            'TEN_NHA_SAN_XUAT' => 'required',
            'DIA_CHI' => 'required',
            'EMAIL' => 'required|email|unique:nha_san_xuat,EMAIL',
            'SO_DIEN_THOAI' => 'required|unique:nha_san_xuat,SO_DIEN_THOAI'
        ], [
            'TEN_NHA_SAN_XUAT.required' => 'Vui lòng nhập tên nhà sản xuất',
            'DIA_CHI.required' => 'Vui lòng nhập địa chỉ',
            'EMAIL.required' => 'Vui lòng nhập email',
            'EMAIL.email' => 'Email không đúng định dạng',
            'EMAIL.unique' => 'Email đã được sử dụng',
            'SO_DIEN_THOAI.required' => 'Vui lòng nhập số điện thoại',
            'SO_DIEN_THOAI.unique' => 'Số điện thoại đã được sử dụng',
        ]);
        $result = DB::table('nha_san_xuat')->where('ID_NSX', $id)->update([
            'TEN_NHA_SAN_XUAT' => $req->TEN_NHA_SAN_XUAT,
            'DIA_CHI' => $req->DIA_CHI,
            'EMAIL'=>$req->EMAIL,
            'SO_DIEN_THOAI'=>$req->SO_DIEN_THOAI
            ]);
        if ($result) {
            return redirect()->back()->with('thongbao', 'Đã sửa nhà sản xuất thành công');;
        }
        else{
            return redirect()->back()->with('thongbao', 'Sửa nhà sản xuất không thành công');
        }
    }
    //xoa 
    public function getDeleteProducer($id)
    {
        $result = DB::table('nha_san_xuat')->where('ID_NSX', $id)->delete();
        if ($result) {
            return redirect()->back()->with('thongbao', 'Xóa nhà sản xuất thành công');;
        }
        else{
            return redirect()->back()->with('thongbao', 'Xóa nhà sản xuất không thành công');
        }
    }
    //xem
    public function getEditProducer($id)
    {
        $editproducer = DB::table('nha_san_xuat')->where('ID_NSX',$id)->get();
        return view('Admin_Layout.AdminProducer.EditProducer',compact('editproducer'));
    }
}
