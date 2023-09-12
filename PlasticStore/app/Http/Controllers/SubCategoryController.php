<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexadmin()
    {
        $subcategory = SubCategory::all();
        $category = Category::all();
        return view('admin.subcategory.adminsubcategory',compact('subcategory','category'));
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

    public function admincreate(){
        $category = Category::all();
        return view('admin.subcategory.admincreatesubcat',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = SubCategory::where("name", "=", $request->name)->first();
        if ($name) {
            return back()->withInput()->with("message", "Sudah ada");
        }

        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->categories_id = $request->categories_id;
        $subcategory->save();
        return redirect()->route("admsubcategory.index")->with("message", "Insert Successfull");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    public function adminedit(SubCategory $subCategory){
        $category = Category::all();
        return view('admin.subcategory.updatesubcat',compact('subCategory','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $subCategory->name = $request->name;
        $subCategory->categories_id = $request->categories_id;
        $subCategory->save();
        return redirect()->route("admsubcategory.index")->with("message", "Update Successfull");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }

    public function deleteData(Request $request){
        $id = $request->get('id');
        $data = SubCategory::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Kategori berhasil di hapus'
        ), 200);
    }
}
