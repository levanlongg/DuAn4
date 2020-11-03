<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danh_muc extends Model
{
    protected $table="danh_muc";
    const UPDATED_AT = null;
    const CREATED_AT = null;
    
    public function loai_san_pham()
    {
        return $this->belongsTo('App/loai_san_pham','ID_LSP','ID_DM');
    }
    public function nha_san_xuat()
    {
        return $this->belongsTo('App/nha_san_xuat','ID_NSX','ID_DM');
    }
}
