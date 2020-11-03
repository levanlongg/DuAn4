<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class don_dat_hang extends Model
{
    protected $table="don_dat_hang";
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function chitiet_ddh()
    {
        return $this->hasMany('App/chitiet_ddh','ID_DDH','ID_DDH');
    }

    public function khach_hang()
    {
        return $this->belongsTo('App/khach_hang','ID_KH','ID_DDH');
    }
}
