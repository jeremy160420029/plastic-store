<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        return view('main.brand', compact('brand'));
    }

    public function indexadmin()
    {
        $brand = Brand::all();
        return view('admin.brand.adminbrand',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = Brand::where("name", "=", $request->name)->first();
        if ($name) {
            return back()->withInput()->with("message", "Sudah ada");
        }

        $category = new Brand();
        $category->name = $request->name;

        $file = $request->file('img');
        if ($file) {
            $imgFolder = 'assets/img/brands/';
        $imgFile=$file->getClientOriginalName();
        $file->move($imgFolder,$imgFile);
        $category->image = $imgFile;
        }

        $category->save();
        return redirect()->route("admbrand.index")->with("message", "Insert Successfull");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        $product = Product::where('brands_id', $brand->id)->get();
        return view('main.productlist', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    public function updateBrand($id)
    {
        $brand = Brand::where("id", "=", $id)->first();
        return view('admin.brand.updateadminbrand', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand = Brand::where("id", "=", $brand->id)->first();
        $brand->name = $request->name;

        $file = $request->file('img');

        if ($file) {
            $file = $request->file('img');
            $imgFolder = 'assets/img/brands/';
            $imgFile=$file->getClientOriginalName();
            $file->move($imgFolder,$imgFile);
            $brand->image = $imgFile;
        }

        $brand->save();
        return redirect()->route("admbrand.index")->with("message", "Update Successfull");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }

    public function deleteData(Request $request)
    {
        $id = $request->get('id');
        $data = Brand::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Kategori berhasil di hapus'
        ), 200);
    }
}
