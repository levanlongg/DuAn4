<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nha_cung_cap extends Model
{
    protected $table ="nha_cung_cap";
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function san_pham()
    {
        return $this->hasMany('App/san_pham','ID_NCC','ID_NCC');
    }
    public function phieu_nhap()
    {
        return $this->hasMany('App/phieu_nhap','ID_NCC','ID_NCC');
    }
}
