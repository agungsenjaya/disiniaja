<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Frame;
use DB,Session,Str,Validator,Auth,Hash, Response;

class ApiController extends Controller
{
    public function stock_add(Request $request){
        $data = Stock::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'qty' => $request->qty
        ]);
        if ($data) {
            $ps = Frame::find($request->product_id);
            $ss = ($ps->qty == NULL) ? 0 : $ps->qty;
            $ps->qty = $ss + $request->qty;
            $ps->save();
            if ($ps) {
                return Response::json([
                    'code' => 200,
                    'data' => $request->all()
                ]);
            }
        }
    }
}
