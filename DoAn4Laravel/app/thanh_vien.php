<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thanh_vien extends Model
{
    protected $table="thanh_vien";
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function khach_hang()
    {
        return $this->hasMany('App/khach_hang','ID_TV','ID_TV');
    }
    public function loai_thanh_vien()
    {
        return $this->belongsTo('App/loai_thanh_vien','ID_LTV','ID_TV');
    }
}
