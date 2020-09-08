@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Batches</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Batches Form</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Batches</h3>
                            </div>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        {{Form::label('Title')}}
                                        {{Form::text('title' , $batch->title ?? old('title') , ['class' => 'form-control form-control-user' ,'placeholder'=>'Title' ,'required' => 'required'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Company')}}
                                        <select name="company_id" id="company_id" class="form-control"
                                                required="required"
                                                style="background-color:#fff;">
                                            <option value="0">Select</option>
                                            @foreach($companies as $company)
                                                <option
                                                        value="{{$company->id}}"{{(isset($batch) && $batch->company_id == $company->id)? 'selected' : '' }}>{{$company->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Godown')}}
                                        <select name="godown_id" id="godown_id" class="form-control"
                                                required="required"
                                                style="background-color:#fff;">
                                            <option value="0">Select</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Product Type')}}
                                        <select name="product_type_id" id="product_type_id" class="form-control"
                                                required="required"
                                                style="background-color:#fff;">
                                            <option value="0">Select</option>
                                            @foreach($types as $type)
                                                <option
                                                        value="{{$type->id}}"{{(isset($batch) && $batch->product_type_id == $type->id)? 'selected' : '' }}>{{$type->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Status')}}
                                        {{Form::select('status' ,[
                                                '' =>'Select Status',
                                                'Active' =>'Active',
                                                'Inactive' =>'Inactive',
                                        ], $batch->status ?? old('status') , ['class' => 'form-control form-control-user', 'required' => 'required' ])}}
                                    </div>
                                    <div class="form-group">
                                        <h4>Products</h4>
                                        <p id="count"></p>
                                        <div class="well well-lg col-md-12">
                                            <div class="row mr-t-20 add-products-container">
                                                @if(isset($batch) && isset($products))
                                                    @foreach($products as $product_count => $product)
                                                        @include('admin.forms.product-container', ['product' => $product , 'count' => $product_count + 1])
                                                    @endforeach
                                                @else
                                                    @include('admin.forms.product-container')
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" id="submit"
                                            class="btn btn-primary btn-sm pull-right">
                                        <i class="fa fa-save"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection