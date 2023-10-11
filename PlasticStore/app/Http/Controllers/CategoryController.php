<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all()->groupBy('categories_id');
        // $subprocess = SubProcess::all()->groupBy('category_id');
        return view('main.category', compact('categories', 'subcategories'));
    }

    public function indexadmin()
    {
        $category = Category::all();
        return view('admin.category.admincategory', compact('category'));
    }

    // public function indexCust(){
    //     $category = Category::all();
    //     return view('main.category',compact('category'));
    // }

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
        $name = Category::where("name", "=", $request->name)->first();
        if ($name) {
            return back()->withInput()->with("message", "Sudah ada");
        }

        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route("admcategory.index")->with("message", "Insert Successfull");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, SubCategory $subCategory)
    {
        // dd($category, $subCategory);
        $product = Product::where("categories_id", $category->id)->where("sub_categories_id", $subCategory->id)->get();
        return view('main.productlist', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category = Category::where("id", "=", $category->id)->first();
        return view('admin.category.admcatform', ['categories' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::where("id", "=", $category->id)->first();
        $category->name = $request->name;
        $category->save();
        return redirect()->route("admcategory.index")->with("message", "Update Successfull");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function deleteData(Request $request)
    {
        $id = $request->get('id');
        $dataCat = Category::find($id);
        $dataSubCat = SubCategory::where("categories_id", "=", $id);
        $dataProd = Product::where("categories_id", "=", $id);
        $dataSubCat->delete();
        $dataProd->delete();
        $dataCat->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Kategori berhasil di hapus'
        ), 200);
    }

    public function updateCat($id)
    {
        $category = Category::where("id", "=", $id)->first();
        return view('admin.category.updateadmcat', ['categories' => $category]);
    }
}
