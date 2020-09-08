@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ProdutType List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">ProdutType</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                               <span class="float-right"><a href="{{route('admin.types.create')}}"
                                                            class="btn btn-primary btn-theme">Add ProductType</a></span>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <th>Alternate Quantity</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($types as $index => $type)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$index +1}}</td>
                                            <td class="sorting_1">{{$type->title}}</td>
                                            <td class="">{{$type->category->title}}</td>
                                            <td class="">{{$type_helper->typeQuantity($type->id)}}</td>
                                            <td class="">{{$type_helper->typeAltQuantity($type->id)}}</td>
                                            <td class="">{{$type->status}}</td>
                                            <td class="">{{$type->created_at}}</td>
                                            <td>
                                                <div class="row col-md-5">
                                                    <div class="form-group">
                                                        <a href="{{route('admin.types.show',$type)}}">
                                                            <button class="btn btn-purple darken-4 btn-sm m-0"><i
                                                                        class="fa fa-eye "></i>
                                                                View
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                                <a href="{{route('admin.types.edit',$type)}}">
                                                    <button class="btn btn-purple darken-4 btn-sm m-0"><i
                                                                class="fa fa-edit "></i>
                                                        Edit
                                                    </button>
                                                </a>
                                            </td>
                                            @empty
                                                <span>No Product Type data</span>
                                    @endforelse
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <th>Alternate Quantity</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection