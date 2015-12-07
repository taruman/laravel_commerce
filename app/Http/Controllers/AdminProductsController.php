<?php

namespace TaruCommerce\Http\Controllers;

use Illuminate\Http\Request;

use TaruCommerce\Http\Requests\ProductRequest;
use TaruCommerce\Http\Requests\ProductImageRequest;
use TaruCommerce\Http\Requests;
use TaruCommerce\Http\Controllers\Controller;
use TaruCommerce\Product;
use TaruCommerce\ProductImage;
use TaruCommerce\Category;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Storage;

class AdminProductsController extends Controller
{

    protected $productModel;
    private $filesystem;
    private $storage;

    public function __construct(Product $productModel, Storage $storage, Filesystem $filesystem)
    {
        $this->productModel = $productModel;
        $this->storage = $storage;
        $this->filesystem = $filesystem;
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

    public function images($id)
    {
        $product = $this->productModel->find($id);
        return view('products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);
        return view('products.create_image', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, $id)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $product = $this->productModel->find($id);
        $image = $product->images()->create(['extension' => $extension]);
        $this->storage->disk('public_local')->put($image->id.'.'.$extension, $this->filesystem->get($file));
        return redirect()->route('admin.products.images', ['id' => $id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);
        $this->storage->disk('public_local')->delete($image->id.'.'.$image->extension);
        $product = $image->product;
        $image->delete();
        return redirect()->route('admin.products.images', ['id' => $product->id]);
    }
}
