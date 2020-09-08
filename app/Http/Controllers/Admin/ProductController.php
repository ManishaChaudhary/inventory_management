<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BatchHelper;
use App\Helpers\TypeHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $model;

    public function __construct(ProductsRepository $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',['products' => $products]);
    }


    public function create(BatchHelper $batchHelper,TypeHelper $typeHelper)
    {
        return view('admin.products.create',[
            'batch_helper' => $batchHelper,
            'type_helper' => $typeHelper
        ]);
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        $this->model->delete($product->id);
        return redirect()->back()->with('message', 'Product deleted');
    }

    public function addProduct(Request $request)
    {
        $count = $request->get('count');
        return view('forms.product-container', ['count' => $count])->render();
    }

}
