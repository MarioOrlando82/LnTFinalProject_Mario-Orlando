<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function create(){
        $categories = Category::all();
        return view('createBarang', compact('categories'));
    }

    public function store(Request $request){

        $extension = $request->file('Image')->getClientOriginalExtension();
        $filename = $request->Nama.'_'.$request->Harga.'.'.$extension;
        $request->file('Image')->storeAs('/public/Barang/', $filename);
        Barang::create([
            'Nama' => $request-> Nama,
            'Harga' => $request-> Harga,
            'Jumlah' => $request -> Jumlah,
            'Image' => $filename,
            'category_id' => $request-> category
        ]);
        //Nama dari model => nama dari form
        return redirect('/');
    }

    public function index(){
        $barangs = Barang::all();
        $user=auth()->user();
        $count = cart::where('name', $user->name ?? '')->count();
        return view('welcome', compact('barangs'));
    }

    public function show($id){
        $barang = Barang::findOrFail($id);

        return view('showBarang', compact('barang'));
    }

    public function edit($id){
        $barang = Barang::findOrFail($id);
        return view('editBarang', compact('barang'));
    }

    public function update(Request $request, $id){
        $extension = $request->file('Image')->getClientOriginalExtension();
        $filename = $request->Nama.'_'.$request->Harga.'.'.$extension;
        $request->file('Image')->storeAs('/public/Barang/', $filename);
        Barang::findOrFail($id)->update([
            'Nama' => $request-> Nama,
            'Harga' => $request-> Harga,
            'Jumlah' => $request -> Jumlah,
            'Image' => $filename
        ]);

        return redirect('/');
    }

    public function delete($id){
        Barang::destroy($id);

        return redirect('/');
    }

    public function addcart(Request $request, $id){
        if(Auth::id()){
            $user=auth()->user();
            $barang = barang::find($id);
            $cart=new cart;
            $cart->name = $user->name;
            $cart->product_title = $barang->Nama;
            $cart->quantity = $request->quantity;
            $cart->price = $barang->Harga;
            $cart->save();
            return redirect()->back()->with('message', 'Barang Berhasil Ditambahkan');
        }else{
            return redirect('login');
        }
    }

    public function showcart(){
        $user=auth()->user();
        $cart = cart::where('name', $user->name)->get();
        $count = cart::where('name', $user->name ?? '')->count();
        return view('showcart', compact('count', 'cart'));
    }

}
