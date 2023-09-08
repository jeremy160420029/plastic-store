<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('main.productlist', compact('product'));
    }

    public function dashboard(){
        $transaction = DB::select(DB::raw('SELECT u.fname, u.lname, u.username, COUNT(t.id) AS total_pembelian FROM users u JOIN transactions t ON u.id = t.users_id GROUP BY u.id,u.username,u.fname,u.lname ORDER BY total_pembelian DESC'));
        // dd($transaction);
        $transactionnow = DB::select(DB::raw('SELECT DISTINCT u.fname,u.lname, p.name, p.price, HOUR(t.created_at) as jam, MINUTE(t.created_at) as menit, DATE(t.created_at) as tanggal FROM transactions t INNER JOIN product_transaction pt ON t.id = pt.transaction_id INNER JOIN products p ON pt.product_id = p.id INNER JOIN users u ON t.users_id = u.id ORDER BY t.created_at DESC'));

        return view('admin.adminhome',compact('transaction','transactionnow'));
    }

    public function indexCat($id){
        $product = Product::where("sub_categories_id", $id)->get();
        return view('main.productlist', compact('product'));
    }

    public function indexadmin()
    {
        // $product = Product::with('category','type')->get();
        $product = DB::select(DB::raw('SELECT p.id, p.categories_id, c.name AS category, b.name AS brand, p.name, p.description, p.price, sc.name as subcat, sp.name as subpro, p.image, p.manufacturer, p.updated_at, p.created_at FROM products p INNER JOIN categories c ON p.categories_id = c.id INNER JOIN brands b ON p.brands_id = b.id INNER JOIN sub_categories sc ON p.sub_categories_id = sc.id INNER JOIN sub_processes sp ON p.sub_processes_id = sp.id WHERE p.deleted_at IS NULL'));
        $category = Category::all();
        return view('admin.product.adminproduct', compact('product', 'category'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('main.product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
