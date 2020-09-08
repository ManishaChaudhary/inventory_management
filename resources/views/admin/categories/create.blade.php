@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category Form</li>
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
                                <h3 class="card-title">Add Category</h3>
                            </div>
                            {{ Form::open(['url' => route('admin.categories.store'), 'method' => 'POST','enctype'=> 'multipart/form-data']) }}
                                <div class="card-body">
                                    <div class="form-group">
                                        {{Form::label('Parent ID')}}
                                        {{Form::select('parent_id' ,['Select']+$parentCategories->toArray(), null , ['class' => 'form-control form-control-user', ])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Title')}}
                                        {{Form::text('title' , null , ['class' => 'form-control form-control-user' ,'placeholder'=>'Title' ,'required' => 'required'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Status')}}
                                        {{Form::select('status' ,[
                                                '' =>'Select Status',
                                                'Active' =>'Active',
                                                'Inactive' =>'Inactive',
                                        ], null , ['class' => 'form-control form-control-user', 'required' => 'required' ])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('description')}}
                                        {{Form::textarea('description' , null,['class' => 'form-control form-control-user'])}}
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