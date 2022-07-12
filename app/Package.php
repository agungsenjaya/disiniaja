<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','deleted_at','price','user_id','package_kat_id','data','slug'];
}
