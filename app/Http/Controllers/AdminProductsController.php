<?php

namespace TaruCommerce\Http\Controllers;

use Illuminate\Http\Request;

use TaruCommerce\Http\Requests\ProductRequest;
use TaruCommerce\Http\Requests;
use TaruCommerce\Http\Controllers\Controller;
use TaruCommerce\Product;
use TaruCommerce\Category;

class AdminProductsController extends Controller
{

    protected $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index()
    {
        $products = $this->productModel->paginate(5);
        return view("products.index", compact("products"));
    }

    public function create(Category $categoryModel)
    {
        $categories = $categoryModel->lists('name', 'id');
        return view("products.create", compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $input = $request->all();
        $product = $this->productModel->fill($input);
        $product->save();
        return redirect()->route('admin.products');
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

    public function edit($id, Category $categoryModel)
    {
        $categories = $categoryModel->lists('name', 'id');
        $product = $this->productModel->find($id);
        return view("products.edit", compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $this->productModel->find($id)->update($request->all());
        return redirect()->route("admin.products");
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        return redirect()->route('admin.products');
    }
}
