@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Users</li>
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
                                <h3 class="card-title">Add Users</h3>
                            </div>
                            {{ Form::open(['url' => route('admin.users.store'), 'method' => 'Post','enctype'=> 'multipart/form-data']) }}
                                <div class="card-body">
                                    <div class="form-group">
                                        {{Form::label('Name')}}
                                        {{Form::text('name' ,null , ['class' => 'form-control form-control-user' ,'placeholder'=>'Name' ,'required' => 'required'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Email')}}
                                        {{Form::email('email' , null , ['class' => 'form-control form-control-user','placeholder'=>'Email' , 'required' => 'required'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Phone')}}
                                        {{Form::text('phone' ,null , ['class' => 'form-control form-control-user' ,'placeholder'=>'Phone', 'required' => 'required'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Companies')}}
                                        <div class="row">
                                            @foreach($companies as $company)
                                                {{ Form::checkbox('companies[]', $company->id, isset($userCompanies) && in_array($company->id,$userCompanies)? true : false)}}{{$company->title}}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Role')}}
                                        {{Form::label('Companies')}}
                                        <div class="row">
                                            @foreach($roles as $role)
                                                {{ Form::checkbox('roles[]', $role->id, isset($userRoles) && in_array($role->id,$userRoles)? true : false)}}{{$role->name}}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Status')}}
                                        {{Form::select('status' ,[
                                                '' =>'Select Status',
                                                'Active' =>'Active',
                                                'Inactive' =>'Inactive',
                                        ], null, ['class' => 'form-control form-control-user', 'required' => 'required' ])}}
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