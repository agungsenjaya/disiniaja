<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','package_id','code','frame_id','promo_id','price_frame','total','time','name','phone','frame_qty','cetak_qty'];
}
