<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class san_pham extends Model
{
    protected $table="san_pham";
    const UPDATED_AT = null;
    const CREATED_AT = null;
    
    public function chitiet_ddh()
    {
        return $this->hasMany('App/chitiet_ddh','ID_SP','ID_SP');
    }
    public function loai_san_pham()
    {
        return $this->belongsTo('App/loai_san_pham','ID_LSP','ID_SP');
    }
    public function nha_cung_cap()
    {
        return $this->belongsTo('App/nha_cung_cap','ID_NCC','ID_SP');
    }
    public function nha_san_xuat()
    {
        return $this->belongsTo('App/nha_san_xuat','ID_NSX','ID_SP');
    }
}
