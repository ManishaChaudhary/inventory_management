<?php

namespace App\Http\Controllers\Admin;

use App\ChallanIn;
use App\Company;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductBatch;
use App\Repositories\ChallanInRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ChallanInController extends Controller
{

    public $model;

    public function __construct(ChallanInRepository $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('super-admin')) {
            $challans = ChallanIn::with(['company', 'godown'])
                ->select('id', 'party', 'in_date', 'truck_no', 'company_id', 'godown_id', 'created_at')
                ->get();
        } else {
            foreach ($user->companies as $company) {
                $challan = ChallanIn::where('company_id', $company->id)
                    ->select('id', 'party', 'in_date', 'truck_no', 'company_id', 'godown_id', 'created_at')
                    ->get();
                array_push($challans, $challan);
            }
            $challans = Arr::collapse($challans);
        }
        return view('admin.challans.entrylist')->with('challans', $challans);
    }


    public function create()
    {
        $user = auth()->user();
        $companies = $user->companies()->get();
        if ($user->hasRole('super-admin')) {
            $companies = Company::all();
        }
        return view('admin.challans.entry')->with(['companies' => $companies]);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['in_details'] = $data['batch'];
        DB::beginTransaction();
        try {
            foreach ($data['batch'] as $batch) {
                foreach ($batch['products'] as $challan) {
                    $product = Product::where('id', $challan['product_id'])->first();
                    $product->increment('quantity', $challan['quantity']);
                    $product->increment('quantity', $challan['quantity']);
                    $product->save();
                }
            }
            $this->model->store($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception);
            return redirect()->back()->with('message', 'challan in unsuccessful');
        }
        return redirect()->back()->with('message', 'challan in');
    }

    public function show($id)
    {
        $challan = ChallanIn::where('id', $id)->with(['company', 'godown'])->first();
        return view('challans.entry-view')->with('challan', $challan);
    }


//    public function edit(ChallanIn $challanIn)
//    {
//        //
//    }
//
//
//    public function update(Request $request, ChallanIn $challanIn)
//    {
//        //
//    }
//
//
//    public function destroy(ChallanIn $challanIn)
//    {
//        //
//    }

    public function getBatchesByGodown($godown_id)
    {
        $batches = ProductBatch::where('godown_id', $godown_id)->get();
        return $batches;
    }


    public function getBatchProducts($id)
    {
        $products = Product::where('batch_id', $id)->get();
        return $products;
    }

    public function addBatchContainer(Request $request)
    {
        $count = $request->get('count');
        return view('forms.challan-in-batch', ['count' => $count])->render();
    }

    public function addProductsContainer(Request $request)
    {
        $counter = $request->get('counter');
        $batchCounter = $request->get('batchCount');
        return view('forms.challan-in-products', ['counter' => $counter, 'batchCount' => $batchCounter])->render();
    }
}
