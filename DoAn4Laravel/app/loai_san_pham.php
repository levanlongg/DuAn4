<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loai_san_pham extends Model
{
    protected $table="loai_san_pham";
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function san_pham()
    {
        return $this->hasMany('App/san_pham','ID_LSP','ID_LSP');
    }
    public function danh_muc()
    {
        return $this->hasMany('App/danh_muc','ID_LSP','ID_LSP');
    }
}
