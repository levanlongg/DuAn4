<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vai_tro extends Model
{
    protected $table="vai_tro";
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function loai_thanh_vien()
    {
        return $this->belongsTo('App/loai_thanh_vien','ID_LTV','ID_VT');
    }
}
