<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubProcess;
use Illuminate\Http\Request;

class SubProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $process = SubProcess::all();
        // $subprocess = SubProcess::all()->groupBy('category_id');
        return view('main.process', compact('process'));
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
     * @param  \App\Models\SubProcess  $subProcess
     * @return \Illuminate\Http\Response
     */
    public function show(SubProcess $subProcess)
    {
        // dd($subProcess);
        $product = Product::where('sub_processes_id', $subProcess->id)->get();
        return view('main.productlist', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubProcess  $subProcess
     * @return \Illuminate\Http\Response
     */
    public function edit(SubProcess $subProcess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubProcess  $subProcess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubProcess $subProcess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubProcess  $subProcess
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubProcess $subProcess)
    {
        //
    }
}
