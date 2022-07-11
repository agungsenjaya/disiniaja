<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Order;
use App\Promo;
use App\Cetak;
use App\Package;
use App\PackageKat;
use App\Frame;
use DB,Session,Str,Validator,Auth,Hash;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('owner.home');
    }

    public function order()
    {
        return view('owner.order')->with('order',Order::all());
    }
    
    public function order_view()
    {
        return view('owner.order_view');
    }
    
    public function promo()
    {
        return view('owner.promo')->with('promo',Promo::all());
    }
    
    public function promo_view()
    {
        return view('owner.promo_view');
    }
    
    public function promo_create()
    {
        return view('owner.promo_create');
    }
    
    public function promo_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'unique:packages',
            'status' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        $data = Promo::create([
            'user_id' => Auth::user()->id,
            'name' => strtolower($request->name),
            'code' => strtoupper(Str::random(6)),
            'status' => $request->status,
            'date' => ($request->date) ? $request->date : NULL,
            'percent' => ($request->percent) ? $request->percent : NULL,
            'price' => ($request->price) ? $request->price : NULL,
            'slug' => Str::slug($request->name),
        ]);
        if ($data) {
            Session::flash('success','Data berhasil input, terima kasih.');
            return redirect()->back();
        }
    }

    public function frame()
    {
        return view('owner.frame')->with('frame',Frame::all());
    }
    
    public function frame_create()
    {
        return view('owner.frame_create');
    }
    
    public function frame_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'unique:frames',
            'price' => 'required',
            'price_m' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        $data = Frame::create([
            'user_id' => Auth::user()->id,
            'name' => strtolower($request->name),
            'price' => ($request->price) ? $request->price : NULL,
            'price_m' => ($request->price_m) ? $request->price_m : NULL,
        ]);
        if ($data) {
            Session::flash('success','Data berhasil input, terima kasih.');
            return redirect()->route('owner.frame');
        }
    }

    public function frame_edit($id)
    {
        $data = Frame::find($id);
        return view('owner.frame_edit',compact('data'));
    }

    public function frame_update(Request $request, $id)
    {
        $data = Frame::find($id);
        $valid = Validator::make($request->all(), [
            'qty' => 'required',
            'price' => 'required',
            'price_m' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        $data->qty = $request->qty;
        $data->price = $request->price;
        $data->price_m = $request->price_m;
        $data->save();
        if ($data) {
            Session::flash('success','Data berhasil input, terima kasih.');
            return redirect()->route('owner.frame');
        }
    }

    public function cetak()
    {
        return view('owner.cetak')->with('cetak',Cetak::all());
    }
    
    public function cetak_create()
    {
        return view('owner.cetak_create');
    }
    
    public function cetak_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'unique:frames',
            'price' => 'required',
            'price_m' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        $data = Cetak::create([
            'user_id' => Auth::user()->id,
            'name' => strtolower($request->name),
            'price' => ($request->price) ? $request->price : NULL,
            'price_m' => ($request->price_m) ? $request->price_m : NULL,
        ]);
        if ($data) {
            Session::flash('success','Data berhasil input, terima kasih.');
            return redirect()->route('owner.cetak');
        }
    }
    
    public function paket()
    {
        return view('owner.package')->with('paket',Package::all());
    }
    
    public function paket_create()
    {
        return view('owner.package_create')->with('kategori',PackageKat::all())->with('frame',Frame::all())->with('cetak',Cetak::all());
    }
    
    public function paket_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'unique:packages',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        $data = Package::create([
            'user_id' => Auth::user()->id,
            'name' => strtolower($request->name),
            'price' => $request->price,
            'order_kat_id' => $request->order_kat_id,
            'frame_id' => ($request->frame_id) ? $request->frame_id : NULL,
            'frame_qty' => ($request->frame_qty) ? $request->frame_qty : NULL,
            'cetak_id' => ($request->cetak_id) ? $request->cetak_id : NULL,
            'cetak_qty' => ($request->cetak_qty) ? $request->cetak_qty : NULL,
        ]);
        if ($data) {
            Session::flash('success','Data berhasil input, terima kasih.');
            return redirect()->route('owner.paket');
        }
    }

    public function kategori()
    {
        return view('owner.kategori')->with('kategori',PackageKat::all());
    }
    
    public function kategori_create()
    {
        return view('owner.kategori_create');
    }
    
    public function kategori_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'unique:package_kats',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        $data = PackageKat::create([
            'user_id' => Auth::user()->id,
            'name' => strtolower($request->name),
            'slug' => Str::slug(strtolower($request->name)),
        ]);
        if ($data) {
            Session::flash('success','Kategori berhasil ditambahkan, terima kasih.');
            return redirect()->route('owner.kategori');
        }
    }
    
    public function kategori_update(Request $request, $id)
    {
        $data = PackageKat::find($id);
        $valid = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        $data->name = $request->name;
        $data->slug = Str::slug(strtolower($request->name));
        $data->save();
        if ($data) {
            Session::flash('success','Kategori berhasil ditambahkan, terima kasih.');
            return redirect()->route('owner.kategori');
        }
    }

    public function kategori_edit($id)
    {
        $data = PackageKat::find($id);
        return view('owner.kategori_edit',compact('data'));
    }

}
