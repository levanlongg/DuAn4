<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitiet_ddh extends Model
{
    protected $table="chitiet_ddh";
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public function don_dat_hang()
    {
        return $this->belongsTo('App/don_dat_hang','ID_DDH','ID_CTDDH');
    }
    public function san_pham()
    {
        return $this->belongsTo('App/san_pham','ID_SP','ID_CTDDH');
    }
}
