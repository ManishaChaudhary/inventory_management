@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category Edit Form</li>
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
                                <h3 class="card-title">Edit Category</h3>
                            </div>
                            {{ Form::open(['url' => route('admin.categories.update',$category->id), 'method' => 'Put','enctype'=> 'multipart/form-data']) }}
                                <div class="card-body">
                                    <div class="form-group">
                                        {{Form::label('Parent ID')}}
                                        {{Form::select('parent_id' ,['Select']+$parentCategories->toArray(), $category->parent_id , ['class' => 'form-control form-control-user', ])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Title')}}
                                        {{Form::text('title' , $category->title , ['class' => 'form-control form-control-user' ,'placeholder'=>'Title' ,'required' => 'required'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Status')}}
                                        {{Form::select('status' ,[
                                                '' =>'Select Status',
                                                'Active' =>'Active',
                                                'Inactive' =>'Inactive',
                                        ], $category->status , ['class' => 'form-control form-control-user', 'required' => 'required' ])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('description')}}
                                        {{Form::textarea('description' , $category->description,['class' => 'form-control form-control-user'])}}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" id="submit"
                                            class="btn btn-primary btn-sm pull-right">
                                        <i class="fa fa-save"></i> Save
                                    </button>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection