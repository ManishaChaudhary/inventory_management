@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Users Permission</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Users Permission</li>
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
                                <h3 class="card-title">Edit Users Permission</h3>
                            </div>
                            {{ Form::open(['url' => route('admin.users.update',$user->id), 'method' => 'Put','enctype'=> 'multipart/form-data']) }}
                                <div class="card-body">
                                    <div class="form-group">
                                        {{Form::label('Name')}}
                                        {{Form::text('name' , $user->name ?? old('name') , ['class' => 'form-control form-control-user' ,'placeholder'=>'Name' ,'required' => 'required'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Email')}}
                                        {{Form::text('email' , $user->email ?? old('email') , ['class' => 'form-control form-control-user','placeholder'=>'Email' , 'required' => 'required'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Phone')}}
                                        {{Form::text('phone' , $user->phone ?? old('phone') , ['class' => 'form-control form-control-user' ,'placeholder'=>'Phone', 'required' => 'required'])}}
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
                                        ], $user->status ?? old('status') , ['class' => 'form-control form-control-user', 'required' => 'required' ])}}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" id="submit"
                                            class="btn btn-primary btn-sm pull-right">
                                        <i class="fa fa-save"></i> Update
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