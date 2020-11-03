<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phieu_nhap extends Model
{
    protected $table ="phieu_nhap";
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function nha_cung_cap()
    {
        return $this->belongsTo('App/nha_cung_cap','ID_NCC','ID_PN');
    }
}
