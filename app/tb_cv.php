<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_cv extends Model
{
    protected $fillable = [
        'id_pekerjaan','id_perusahaan','id_user','nama_cv',
    ];
}
