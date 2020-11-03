<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nha_san_xuat extends Model
{
    protected $table = "nha_san_xuat";
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function san_pham()
    {
        return $this->hasMany('App/san_pham','ID_NSX','ID_NSX');
    }
    public function danh_muc()
    {
        return $this->hasMany('App/danh_muc','ID_NSX','ID_NSX');
    }
}
