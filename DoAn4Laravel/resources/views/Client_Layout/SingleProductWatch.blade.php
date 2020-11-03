@extends('Page.Master1')
@section('Content')
<div class="container-fluid">
    @foreach($chitiet_spdh as $ct_sp_dh)
    <div class="row" style="font-family: 'Times New Roman', Times, serif">
        <div class="col-sm-12">
            <h3 style="margin-top:2%;" !important>Đồng hồ {{$ct_sp_dh->TEN_SAN_PHAM}}</h3>
            <hr>
        </div>
    </div>
    <div class="row" style="margin-top: 2%; font-family: 'Times New Roman', Times, serif">
        <div class="col-sm-5">
            <img src="../image_sp/{{$ct_sp_dh->HINH_ANH_1}}" alt="{{$ct_sp_dh->TEN_SAN_PHAM}}" />
        </div>
        <div class="col-sm-4">
            <h4 style="color:crimson">Giá bán: {{number_format($ct_sp_dh->GIA_BAN)}}đồng</h4>
            <h5 style="color:crimson">Giá niêm yết: <strike style="color:crimson">{{number_format($ct_sp_dh->GIA_NIEM_YET)}} đồng</strike></h5>
            <h5 style="color:crimson">Giảm giá: {{$ct_sp_dh->SALE}}%</h5>
            <h5 style="color:crimson">Tình trạng: {{$ct_sp_dh->TINH_TRANG}}</h5>
            <h5 style="color:crimson">Bạn đang xem đồng hồ:</h5>
            <h5 style="color:crimson; font-weight:bold">{{$ct_sp_dh->TEN_SAN_PHAM}}</h5>
            <hr>
            <label for="Soluong">Số lượng:</label>
            <div class="row">
                <!-- <input type="number" value="1" min="1" class="form-control" style="width:25%; margin-left:4%; outline:none" !important> -->
                <input type="button" class="btn btn-primary" href="{{url('Add_Cart',$ct_sp_dh->ID_SP)}}" value="Thêm vào giỏ" style="width:60%; margin-left:4%" !important>
            </div>
        </div>
        <div class="col-sm-3" style="font-weight:bold; text-align:justify" !important>
            <h4>Thông số kỹ thuật</h5>
                <hr>
                <p>{{$ct_sp_dh->THONG_SO_KY_THUAT}}</p>
                <hr>
        </div>
    </div>
    <div class="row" style="margin-top: 1%; text-align:justify">
        <div class="col-sm-12">
            <h3 style="color: crimson">Giới thiệu về đồng hồ </h3>
            <hr>
            <p style="font-weight:bold; text-align:justify" !important>{{$ct_sp_dh->GIOI_THIEU_CHUNG}}</p>
            <p style="font-weight:bold" !important>1. {{$ct_sp_dh->TIEU_DE_1}}</p>
            <p>{{$ct_sp_dh->MO_TA_CT1}}</p>
            <p style="font-weight:bold" !important>2. {{$ct_sp_dh->TIEU_DE_2}}</p>
            <p>{{$ct_sp_dh->MO_TA_CT2}}</p>
            <p style="font-weight:bold" !important>3. {{$ct_sp_dh->TIEU_DE_3}}</p>
            <p>{{$ct_sp_dh->MO_TA_CT3}}</p>
        </div>
    </div>
    @endforeach
</div>
</div>
<br /><br />
@endsection