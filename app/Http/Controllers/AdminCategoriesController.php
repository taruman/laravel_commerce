<?php

namespace TaruCommerce\Http\Controllers;

use Illuminate\Http\Request;

use TaruCommerce\Http\Requests\CategoryRequest;
use TaruCommerce\Http\Controllers\Controller;
use TaruCommerce\Category;

class AdminCategoriesController extends Controller
{

    protected $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $categories = $this->categoryModel->paginate(5);
        return view("categories.index", compact("categories"));
    }

    public function create()
    {
        return view("categories.create");
    }

    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        $category = $this->categoryModel->fill($input);
        $category->save();
        return redirect()->route('admin.categories');
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

    public function edit($id)
    {
        $category = $this->categoryModel->find($id);
        return view("categories.edit", compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->categoryModel->find($id)->update($request->all());
        return redirect()->route("admin.categories");
    }

    public function destroy($id)
    {
        $this->categoryModel->find($id)->delete();
        return redirect()->route('admin.categories');
    }
}
