<?php

namespace App\Http\Controllers\Admin;

use App\ChallanOut;
use App\Company;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductBatch;
use App\Repositories\ChallanOutRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ChallanOutController extends Controller
{
    public $model;

    public function __construct(ChallanOutRepository $model)
    {
        $this->model = $model;
    }

    public function index()
    {

    }


    public function create()
    {
        $user = auth()->user();
        $companies = $user->companies()->get();
        if ($user->hasRole('super-admin')) {
            $companies = Company::all();
        }
        return view('challans.out')->with(['companies' => $companies]);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['out_details'] = $data['products'];
        DB::beginTransaction();
        try {
            foreach ($data['products'] as $challan) {
                $product = Product::where('id', $challan['product_id'])->first();
                $product->decrement('quantity', $challan['quantity']);
                $product->decrement('quantity', $challan['quantity']);
                $product->save();
            }
            $this->model->store($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception);
            return redirect()->back()->with('message', 'could not perform the query');
        }
        return redirect()->back()->with('message', 'Challan out saved');

    }

    public function productsByCompany($companyId)
    {
        $allProducts = [];
        $batches = ProductBatch::where('company_id', $companyId)->get();
        foreach ($batches as $batch) {
            $products = collect(Product::where('batch_id', $batch->id)->select('id', 'title')->get());
            array_push($allProducts, $products);
        }
        $allProducts = Arr::flatten($allProducts);
        return $allProducts;
    }

    public function addProductsContainer(Request $request)
    {
        $counter = $request->get('counter');
        return view('forms.challan-out-products', ['counter' => $counter])->render();
    }

}
