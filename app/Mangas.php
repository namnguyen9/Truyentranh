<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mangas extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function chapters()
    {
        return $this->hasMany(Chapters::class,'manga_id','id');
    }

}
