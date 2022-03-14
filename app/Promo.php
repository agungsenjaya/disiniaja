<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = ['user_id','name','status','img','content','date','price','percent','content','img','slug','code'];
}
