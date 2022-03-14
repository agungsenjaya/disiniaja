<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageKat extends Model
{
    protected $fillable = ['user_id','name','slug'];
}
