<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TypeHelper;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\ProductType;
use App\Repositories\ProductTypeRepository;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{

    public $model;

    public function __construct(ProductTypeRepository $model)
    {
        $this->model = $model;
    }

    public function index(TypeHelper $typeHelper)
    {
        $productTypes = ProductType::all();
        return view('admin.types.index')->with(['types'=>$productTypes,'type_helper'=>$typeHelper]);
    }


    public function create()
    {
        $categories = Category::active()->get();
        return view('admin.types.create')->with('categories', $categories);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = auth()->id();
        $this->model->store($data);
        return redirect()->route('admin.types.index')->with('message', 'Product Type has been added');
    }


    public function show(ProductType $type)
    {
        return view('types.view')->with('type', $type);
    }


    public function edit(ProductType $type)
    {
        $categories = Category::active()->get();
        return view('admin.types.edit')->with(['type'=> $type , 'categories' => $categories]);
    }


    public function update(Request $request, ProductType $type)
    {
        $data = $request->all();
        $data['updated_by'] = auth()->id();
        $this->model->update($type->id, $data);
        return redirect()->route('admin.types.index')->with('message', 'Product Type has been updated');
    }


    public function destroy(ProductType $type)
    {
        $this->model->delete($type->id);
        return redirect()->back()->with('message', 'Product Type has been deleted');
    }
}
