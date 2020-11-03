<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\slide_hinhanh;

class QLSLAController extends Controller
{
    public function getListSlide()
    {
        $listslide=DB::table('slide_hinhanh')->paginate(10);
        return view('Admin_Layout.AdminSlide.ListSlide', compact('listslide'));
    }
    //thêm
    public function getAddSlide()
    {
        return view('Admin_Layout.AdminSlide.AddSlide');
    }
    public function postAddSlide(Request $req)
    {
        $req->validate([
            'HINH_ANH' => 'required',
            'TEN_HINH_ANH' => 'required',
        ], [
            'HINH_ANH.required' => 'Bạn chưa chọn hính ảnh',
            'TEN_HINH_ANH.required' => 'Vui lòng nhập tên hình ảnh',
        ]);
        $dataslide = new slide_hinhanh();
        $dataslide->TEN_HINH_ANH=$req->TEN_HINH_ANH;
        $get_image1 = $req->file('HINH_ANH');
        if ($get_image1) {
            $get_new_image1 = $get_image1->getClientOriginalName();
            $name_image1 = current(explode('.', $get_new_image1));
            $new_image1 = $name_image1 . '.' . $get_image1->getClientOriginalExtension();
            $get_image1->move(base_path() . '/public/image_sp/slide/', $new_image1);
            $dataslide->HINH_ANH = $new_image1;
            $dataslide->save();
            return redirect()->back()->with('thongbao', 'Thêm hình ảnh thành công');
        }
        $dataslide->HINH_ANH = '0';
        $dataslide->save();
        return redirect()->back()->with('thongbao', 'Thêm hình ảnh thành công');
    }
    //xoa
    public function getDeleteSlide($id)
    {
        $result = DB::table('slide_hinhanh')
            ->where('ID_HINHANH', $id)
            ->delete();
        if ($result) {
            return redirect()->back()->with('thongbao', 'Xóa hình ảnh thành công');;
        } else {
            return redirect()->back()->with('thongbao', 'Xóa hình ảnh không thành công');
        }
    }
}
