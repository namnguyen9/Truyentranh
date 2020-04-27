<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapters extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function manga()
    {
        return $this->belongsTo(Mangas::class);
    }
}
