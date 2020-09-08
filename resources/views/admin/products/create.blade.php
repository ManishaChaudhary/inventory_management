@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product Form</li>
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
                                <h3 class="card-title">Add Products</h3>
                            </div>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        {{Form::label('title')}}
                                        {{Form::text('title' , null , ['class' => 'form-control form-control-user' ,'placeholder'=>'Title' ,'required' => 'required'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Batch ID')}}
                                        {{Form::select('batch_id' ,$batch_helper->getBatchForDropdown(), null , ['class' => 'form-control form-control-user'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('ProductType')}}
                                        {{Form::select('product_type_id',$type_helper->getTypeForDropdown() , null, ['class' => 'form-control form-control-user' ])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Quantity')}}
                                        {{Form::text('quantity' , null , ['class' => 'form-control form-control-user' ])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Alt Quantity')}}
                                        {{Form::text('alt_quantity' , null , ['class' => 'form-control form-control-user' ])}}
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