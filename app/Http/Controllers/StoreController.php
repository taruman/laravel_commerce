<?php

namespace TaruCommerce\Http\Controllers;

use Illuminate\Http\Request;

use TaruCommerce\Http\Requests;
use TaruCommerce\Http\Controllers\Controller;
use TaruCommerce\Category;
use TaruCommerce\Product;

class StoreController extends Controller
{

    private $categoryModel;
    private $productModel;

    public function __construct(Category $categoryModel, Product $productModel)
    {
        $this->categoryModel = $categoryModel;
        $this->productModel = $productModel;
    }

    public function index()
    {
        $fProducts = $this->productModel->featured();
        $rProducts = $this->productModel->recommended();
        $categories = $this->categoryModel->get();
        return view('store.index', compact('categories', 'fProducts', 'rProducts'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
