<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\san_pham;
use App\nha_cung_cap;
use App\nha_san_xuat;
use App\loai_san_pham;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class QLSPController extends Controller
{
    public function MasterAd()
    {
        return view('Page.MasterAdmin');
    }
    //danh sách sản phẩm
    public function ListPro()
    {
        $listproduct = DB::table('san_pham')
        ->select('san_pham.ID_SP','san_pham.TEN_SAN_PHAM','san_pham.HINH_ANH_1','san_pham.XUAT_XU','san_pham.GIA_NIEM_YET','san_pham.GIA_BAN','san_pham.TINH_TRANG')
        ->paginate(20);
        return view('Admin_Layout.AdminProduct.ListProduct', compact('listproduct'));
    }
    //tìm kiếm sản phẩm
    public function SearchPro(Request $req)
    {
        $search_pro = DB::table('san_pham')
        ->select('san_pham.ID_SP','san_pham.TEN_SAN_PHAM','san_pham.HINH_ANH_1','san_pham.XUAT_XU','san_pham.GIA_NIEM_YET','san_pham.GIA_BAN','san_pham.TINH_TRANG')
        ->where('TEN_SAN_PHAM', 'like', '%' . $req->key . '%')
        ->orwhere('XUAT_XU', 'like', '%' . $req->key . '%')
        ->orwhere('TINH_TRANG', 'like', '%' . $req->key . '%')
        ->orWhereBetween('GIA_BAN',[0,$req->key])
        ->paginate(20);
        return view('Admin_Layout.AdminProduct.Searchpro', compact('search_pro'));
    }
    //Thêm sản phẩm
    public function getAddProduct()
    {
        $idncc = DB::table('nha_cung_cap')
        ->select('nha_cung_cap.ID_NCC','nha_cung_cap.TEN_NHA_CUNG_CAP')->get();
        $idnsx = DB::table('nha_san_xuat')
        ->select('nha_san_xuat.ID_NSX','nha_san_xuat.TEN_NHA_SAN_XUAT')->get();
        $idlsp = DB::table('loai_san_pham')
        ->select('loai_san_pham.ID_LSP','loai_san_pham.DONG_SP')->get();
        return view('Admin_Layout.AdminProduct.AddProduct', compact('idncc', 'idnsx', 'idlsp'));
    }
    public function postAddProduct(Request $req)
    {
        $req->validate([
            'TEN_SAN_PHAM' => 'required', 'DEMO' => 'required', 'SALE' => 'required', 'XUAT_XU' => 'required', 'NOI_SAN_XUAT' => 'required', 'TINH_TRANG' => 'required',
            'GIA_NIEM_YET' => 'required', 'GIA_BAN' => 'required', 'NGAY_CAP_NHAT' => 'required', 'NAM_SAN_XUAT' => 'required', 'SO_LUONG' => 'required', 'ID_NCC' => 'required',
            'ID_NSX' => 'required', 'ID_LSP' => 'required', 'TIEU_DE_1' => 'required', 'TIEU_DE_2' => 'required', 'TIEU_DE_3' => 'required', 'THONG_SO_KY_THUAT' => 'required',
            'GIOI_THIEU_CHUNG' => 'required', 'MO_TA_CT1' => 'required', 'MO_TA_CT2' => 'required', 'MO_TA_CT3' => 'required'
        ], [
            'TEN_SAN_PHAM.required' => 'Nhập tên sản phẩm', 'DEMO.required' => 'Nhập trạng thái hiển thị', 'SALE.required' => 'Nhập phần trăm giảm giá', 'XUAT_XU.required' => 'Thêm xuất xứ của sản phẩm', 'NOI_SAN_XUAT.required' => 'Thêm nơi sản xuất của sản phẩm', 'TINH_TRANG.required' => 'Nhập tình trạng của sản phẩm',
            'GIA_NIEM_YET.required' => 'Nhập giá niêm yết', 'GIA_BAN.required' => 'Nhập giá bán', 'NGAY_CAP_NHAT.required' => 'Thêm ngày câp nhật', 'NAM_SAN_XUAT.required' => 'Nhập năm sản xuất', 'SO_LUONG.required' => 'Nhập số lượng sản phẩm', 'ID_NCC.required' => 'Chọn nhà cung cấp',
            'ID_NSX.required' => 'Chọn nhà sản xuất', 'ID_LSP.required' => 'Chọn loại sản phẩm', 'TIEU_DE_1.required' => 'Nhập tiêu đề 1', 'TIEU_DE_2.required' => 'Nhập tiêu đề 2', 'TIEU_DE_3.required' => 'Nhập tiêu đề 3', 'THONG_SO_KY_THUAT.required' => 'Nhập thông số kỹ thuật của sản phẩm',
            'GIOI_THIEU_CHUNG.required' => 'Nhập thông tin giới thiệu chung về sản phẩm', 'MO_TA_CT1.required' => 'Nhập thông tin mô tả chi tiết 1 về sản phẩm', 'MO_TA_CT2.required' => 'Nhập thông tin mô tả chi tiết 2 về sản phẩm', 'MO_TA_CT3.required' => 'Nhập thông tin mô tả chi tiết 3 về sản phẩm'
        ]);
        $datasp = new san_pham();
        $datasp->TEN_SAN_PHAM = $req->TEN_SAN_PHAM;
        $datasp->DEMO = $req->DEMO;
        $datasp->SALE = $req->SALE;
        $datasp->XUAT_XU = $req->XUAT_XU;
        $datasp->NOI_SAN_XUAT = $req->NOI_SAN_XUAT;
        $datasp->TINH_TRANG = $req->TINH_TRANG;
        $datasp->GIA_NIEM_YET = $req->GIA_NIEM_YET;
        $datasp->GIA_BAN = $req->GIA_BAN;
        $datasp->NGAY_CAP_NHAT = $req->NGAY_CAP_NHAT;
        $datasp->NAM_SAN_XUAT = $req->NAM_SAN_XUAT;
        $datasp->SO_LUONG = $req->SO_LUONG;
        $datasp->ID_NCC = $req->ID_NCC;
        $datasp->ID_NSX = $req->ID_NSX;
        $datasp->ID_LSP = $req->ID_LSP;
        $datasp->TIEU_DE_1 = $req->TIEU_DE_1;
        $datasp->TIEU_DE_2 = $req->TIEU_DE_2;
        $datasp->TIEU_DE_3 = $req->TIEU_DE_3;
        $datasp->THONG_SO_KY_THUAT = $req->THONG_SO_KY_THUAT;
        $datasp->GIOI_THIEU_CHUNG = $req->GIOI_THIEU_CHUNG;
        $datasp->MO_TA_CT1 = $req->MO_TA_CT1;
        $datasp->MO_TA_CT2 = $req->MO_TA_CT2;
        $datasp->MO_TA_CT3 = $req->MO_TA_CT3;

        $get_image1 = $req->file('HINH_ANH_1');
        if ($get_image1) {
            $get_new_image1 = $get_image1->getClientOriginalName();
            $name_image1 = current(explode('.', $get_new_image1));
            $new_image1 = $name_image1 . '.' . $get_image1->getClientOriginalExtension();
            $get_image1->move(base_path() . '/public/image_sp/', $new_image1);
            $datasp->HINH_ANH_1 = $new_image1;
            $datasp->save();
            return redirect()->back()->with('thongbao', 'Thêm sản phẩm thành công');
        }
        $datasp->HINH_ANH_1 = '0';
        $datasp->save();
        return redirect()->back()->with('thongbao', 'Thêm sản phẩm thành công');
    }
    //sủa sản phẩm
    public function getUpdateProduct($id)
    {
        $idncc = DB::table('nha_cung_cap')
        ->select('nha_cung_cap.ID_NCC','nha_cung_cap.TEN_NHA_CUNG_CAP')->get();
        $idnsx = DB::table('nha_san_xuat')
        ->select('nha_san_xuat.ID_NSX','nha_san_xuat.TEN_NHA_SAN_XUAT')->get();
        $idlsp = DB::table('loai_san_pham')
        ->select('loai_san_pham.ID_LSP','loai_san_pham.DONG_SP')->get();
        $sanpham = DB::table('san_pham')->where('ID_SP', $id)->first();
        return view('Admin_Layout.AdminProduct.UpdateProduct', compact('idncc', 'idnsx', 'idlsp', 'sanpham'));
    }
    public function postUpdateProduct(Request $req, $id)
    {
        $req->validate([
            'TEN_SAN_PHAM' => 'required', 'DEMO' => 'required', 'SALE' => 'required', 'XUAT_XU' => 'required', 'NOI_SAN_XUAT' => 'required', 'TINH_TRANG' => 'required',
            'GIA_NIEM_YET' => 'required', 'GIA_BAN' => 'required', 'NGAY_CAP_NHAT' => 'required', 'NAM_SAN_XUAT' => 'required', 'SO_LUONG' => 'required', 'ID_NCC' => 'required',
            'ID_NSX' => 'required', 'ID_LSP' => 'required', 'TIEU_DE_1' => 'required', 'TIEU_DE_2' => 'required', 'TIEU_DE_3' => 'required', 'THONG_SO_KY_THUAT' => 'required',
            'GIOI_THIEU_CHUNG' => 'required', 'MO_TA_CT1' => 'required', 'MO_TA_CT2' => 'required', 'MO_TA_CT3' => 'required'
        ], [
            'TEN_SAN_PHAM.required' => 'Nhập tên sản phẩm', 'DEMO.required' => 'Nhập trạng thái hiển thị', 'SALE.required' => 'Nhập phần trăm giảm giá', 'XUAT_XU.required' => 'Thêm xuất xứ của sản phẩm', 'NOI_SAN_XUAT.required' => 'Thêm nơi sản xuất của sản phẩm', 'TINH_TRANG.required' => 'Nhập tình trạng của sản phẩm',
            'GIA_NIEM_YET.required' => 'Nhập giá niêm yết', 'GIA_BAN.required' => 'Nhập giá bán', 'NGAY_CAP_NHAT.required' => 'Thêm ngày câp nhật', 'NAM_SAN_XUAT.required' => 'Nhập năm sản xuất', 'SO_LUONG.required' => 'Nhập số lượng sản phẩm', 'ID_NCC.required' => 'Chọn nhà cung cấp',
            'ID_NSX.required' => 'Chọn nhà sản xuất', 'ID_LSP.required' => 'Chọn loại sản phẩm', 'TIEU_DE_1.required' => 'Nhập tiêu đề 1', 'TIEU_DE_2.required' => 'Nhập tiêu đề 2', 'TIEU_DE_3.required' => 'Nhập tiêu đề 3', 'THONG_SO_KY_THUAT.required' => 'Nhập thông số kỹ thuật của sản phẩm',
            'GIOI_THIEU_CHUNG.required' => 'Nhập thông tin giới thiệu chung về sản phẩm', 'MO_TA_CT1.required' => 'Nhập thông tin mô tả chi tiết 1 về sản phẩm', 'MO_TA_CT2.required' => 'Nhập thông tin mô tả chi tiết 2 về sản phẩm', 'MO_TA_CT3.required' => 'Nhập thông tin mô tả chi tiết 3 về sản phẩm'
        ]);
        $result = DB::table('san_pham')->where('ID_SP', $id)->update([
            'TEN_SAN_PHAM' => $req->TEN_SAN_PHAM,
            'DEMO' => $req->DEMO,
            'SALE' => $req->SALE,
            'XUAT_XU' => $req->XUAT_XU,
            'NOI_SAN_XUAT' => $req->NOI_SAN_XUAT,
            'TINH_TRANG' => $req->TINH_TRANG,
            'GIA_NIEM_YET' => $req->GIA_NIEM_YET,
            'GIA_BAN' => $req->GIA_BAN,
            'NGAY_CAP_NHAT' => $req->NGAY_CAP_NHAT,
            'NAM_SAN_XUAT' => $req->NAM_SAN_XUAT,
            'SO_LUONG' => $req->SO_LUONG,
            'ID_NCC' => $req->ID_NCC,
            'ID_NSX' => $req->ID_NSX,
            'ID_LSP' => $req->ID_LSP,
            'TIEU_DE_1' => $req->TIEU_DE_1,
            'TIEU_DE_2' => $req->TIEU_DE_2,
            'TIEU_DE_3' => $req->TIEU_DE_3,
            'THONG_SO_KY_THUAT' => $req->THONG_SO_KY_THUAT,
            'GIOI_THIEU_CHUNG' => $req->GIOI_THIEU_CHUNG,
            'MO_TA_CT1' => $req->MO_TA_CT1,
            'MO_TA_CT2' => $req->MO_TA_CT2,
            'MO_TA_CT3' => $req->MO_TA_CT3,
        ]);
        if ($result) {
            return redirect()->back()->with('thongbao', 'Đã sửa sản phẩm thành công');;
        } else {
            return redirect()->back()->with('thongbao', 'Sửa sản phẩm không thành công');
        }
    }
    //xóa san pham
    public function DeleteProduct($id)
    {
        $result = DB::table('san_pham')->where('ID_SP', $id)->delete();
        if ($result) {
            return redirect()->back()->with('thongbao', 'Xóa sản phẩm thành công');;
        }
        else{
            return redirect()->back()->with('thongbao', 'Xóa sản phẩm không thành công');
        }
    }
    //xem
    public function EditProduct($id)
    {
        $editproduct = DB::table('san_pham')->where('ID_SP',$id)->get();
        return view('Admin_Layout.AdminProduct.EditProduct', compact('editproduct'));
    }
}
       