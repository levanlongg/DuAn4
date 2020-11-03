<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loai_thanh_vien extends Model
{
    protected $table="loai_thanh_vien";
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function vai_tro()
    {
        return $this->hasMany('App/vai_tro','ID_LTV','ID_LTV');
    }
    public function thanh_vien()
    {
        return $this->hasMany('App/thanh_vien','ID_LTV','ID_LTV');
    }
}
