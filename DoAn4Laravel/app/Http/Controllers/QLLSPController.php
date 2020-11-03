<?php

namespace App\Http\Controllers;

use App\loai_san_pham;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QLLSPController extends Controller
{
    public function MasterAdprotype()
    {
        return view('Page.MasterAdminProTy');
    }
    public function ListProType()
    {
        $listproducttype = DB::table('loai_san_pham')
        ->select('loai_san_pham.ID_LSP','loai_san_pham.TEN_LSP','loai_san_pham.DONG_SP','loai_san_pham.PHAN_KHUC')
        ->paginate(20);
        return view('Admin_Layout.AdminProductType.ListProductType', compact('listproducttype'));
    }

    public function SearchProType(Request $req)
    {
        $search_pro_type = DB::table('loai_san_pham')
        ->select('loai_san_pham.ID_LSP','loai_san_pham.TEN_LSP','loai_san_pham.DONG_SP','loai_san_pham.PHAN_KHUC')
        ->where('TEN_LSP', 'like', '%' . $req->key . '%')
        ->orwhere('DONG_SP', 'like', '%' . $req->key . '%')
        ->orwhere('PHAN_KHUC', 'like', '%' . $req->key . '%')
        ->get();
        return view('Admin_Layout.AdminProductType.SearchProType', compact('search_pro_type'));
    }
    public function getAddProductType()
    {
        return view('Admin_Layout.AdminProductType.AddProductType');
    }
    public function postAddProductType(Request $req)
    {
        $req->validate([
            'TEN_LSP' => 'required',
            'DONG_SP' => 'required',
            'PHAN_KHUC' => 'required',
        ], [
            'TEN_LSP.required' => 'Vui lòng nhập tên loại sản phẩm',
            'DONG_SP.required' => 'Vui lòng nhập tên dòng sản phẩm',
            'PHAN_KHUC.required' => 'Vui lòng nhập phân khúc sản phẩm',
        ]);
        $addlsp = new loai_san_pham();
        $addlsp->TEN_LSP = $req->TEN_LSP;
        $addlsp->DONG_SP = $req->DONG_SP;
        $addlsp->PHAN_KHUC = $req->PHAN_KHUC;
        $addlsp->save();
        return redirect()->back()->with('thongbao', 'Đã thêm loại sản phẩm thành công');
    }
    public function EditProductType($id)
    {
        $editproducttype = DB::table('loai_san_pham')->where('ID_LSP',$id)->get();
        return view('Admin_Layout.AdminProductType.EditProductType', compact('editproducttype'));
    }
    public function getUpdateProductType($id)
    {
        $loaisp = DB::table('loai_san_pham')->where('ID_LSP', $id)->first();
        return view('Admin_Layout.AdminProductType.UpdateProductType', compact('loaisp'));
    }
    public function postUpdateProductType(Request $req, $id)
    {
        $req->validate([
            'TEN_LSP' => 'required',
            'DONG_SP' => 'required',
            'PHAN_KHUC' => 'required',
        ], [
            'TEN_LSP.required' => 'Tên loại sản phẩm không được để trống',
            'DONG_SP.required' => 'Vui lòng nhập tên dòng sản phẩm',
            'PHAN_KHUC.required' => 'Vui lòng nhập phân khúc sản phẩm',
        ]);
        $result = DB::table('loai_san_pham')->where('ID_LSP', $id)->update([
            'TEN_LSP' => $req->TEN_LSP,
            'DONG_SP' => $req->DONG_SP,
            'PHAN_KHUC'=>$req->PHAN_KHUC
            ]);
        if ($result) {
            return redirect()->back()->with('thongbao', 'Đã sửa loại sản phẩm thành công');;
        }
        else{
            return redirect()->back()->with('thongbao', 'Sửa loại sản phẩm không thành công');
        }
    }
    public function DeleteProductType($id)
    {
        $result = DB::table('loai_san_pham')->where('ID_LSP', $id)->delete();
        if ($result) {
            return redirect()->back()->with('thongbao', 'Xóa loại sản phẩm thành công');;
        }
        else{
            return redirect()->back()->with('thongbao', 'Xóa loại sản phẩm không thành công');
        }
    }
}
