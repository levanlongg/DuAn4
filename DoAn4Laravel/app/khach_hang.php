<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khach_hang extends Model
{
    protected $table="khach_hang";
    const UPDATED_AT = null;
    const CREATED_AT = null;
    //public $timestamp =false;
    public function don_dat_hang()
    {
        return $this->hasMany('App/don_dat_hang','ID_KH','ID_KH');
    }
    public function thanh_vien()
    {
        return $this->belongsTo('App/thanh_vien','ID_TV','ID_KH');
    }
}
