<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_pekerjaan extends Model
{
    protected $fillable = [
        'id_kategori','id_perusahaan','pekerjaan','gaji_min','gaji_max','detail_pekerjaan','syarat_pekerjaan','syarat_cv','status_validasi',
    ];
}
