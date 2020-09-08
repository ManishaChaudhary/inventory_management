<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BatchHelper;
use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductBatch;
use App\Models\ProductType;
use App\Repositories\ProductBatchRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductBatchController extends Controller
{
    public $model;
    public $product;

    public function __construct(ProductBatchRepository $model, ProductsRepository $product)
    {
        $this->model = $model;
        $this->product = $product;
    }

    public function index(BatchHelper $batchHelper)
    {
        $user = auth()->user();
        $batches = [];
        if ($user->hasRole('super-admin')) {
            $batches = ProductBatch::all();
        } else {
            foreach ($user->companies as $company) {
                $batch = ProductBatch::where('company_id', $company->id)->get();
                array_push($batches, $batch);
            }
            $batches = Arr::collapse($batches);
        }
        return view('admin.batches.index')->with([
            'batches'=> $batches,
            'batch_helper'=>$batchHelper
        ]);
    }

    public function create()
    {
        $user = auth()->user();
        $companies = $user->companies->all();
        if ($user->hasRole('super-admin')) {
            $companies = Company::all();
        }
        $types = ProductType::active()->get();
        return view('admin.batches.create')->with(['companies' => $companies, 'types' => $types]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = auth()->id();
        $batch = $this->model->store($data);
        foreach ($data['products'] as $product) {
            $product = [
                'title' => $product['title'],
                'quantity' => $product['quantity'],
                'alt_quantity' => $product['alt_quantity'],
                'batch_id' => $batch->id,
                'product_type_id' => $batch->product_type_id,
            ];
            $this->product->store($product);
        }
        return redirect()->route('admin.batches.index')->with('message', 'New Batch Created');
    }

    public function show(ProductBatch $batch)
    {
        $products = Product::where('batch_id', $batch->id)->get();
        return view('batches.view')->with(['batch' => $batch, 'products' => $products]);
    }

    public function edit(ProductBatch $batch)
    {
        $companies = Company::active()->get();
        $types = ProductType::active()->get();
        $products = Product::where('batch_id', $batch->id)->get();
        return view('admin.batches.edit')->with(['batch' => $batch, 'products' => $products, 'companies' => $companies, 'types' => $types]);
    }


    public function update(Request $request, ProductBatch $batch)
    {
        $data = $request->all();
        $data['updated_by'] = auth()->id();
        $batch = $this->model->update($batch->id, $data);
        foreach ($data['products'] as $index => $product) {
            $product = [
                'title' => $product['title'],
                'quantity' => $product['quantity'],
                'alt_quantity' => $product['alt_quantity'],
            ];
            $this->product->update($index, $product);
        }
        return redirect()->route('admin.batches.index')->with('message', 'Batch updated');
    }

    public function destroy(ProductBatch $batch)
    {
        $this->model->delete($batch->id);
        return redirect()->route('admin.batches.index')->with('message', ' Batch Deleted');
    }
}
