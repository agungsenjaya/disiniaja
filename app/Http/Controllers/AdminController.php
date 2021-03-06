<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Package;
use App\Frame;
use App\Cetak;
use DB,Session,Str,Validator,Auth,Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.home')->with('paket', Package::all())->with('frame',Frame::all())->with('cetak', Cetak::all());
    }
}
