@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Batches List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.batches.create')}}">Home</a></li>
                            <li class="breadcrumb-item active">Batches List</li>
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
                               <span class="float-right"><a href="{{route('admin.batches.create')}}"
                                                            class="btn btn-primary btn-theme">Add Batches</a></span>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Company</th>
                                        <th>Godown</th>
                                        <th>Product Type</th>
                                        <th>Batch Quantity</th>
                                        <th>Batch Alternate Quantity</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($batches as $index => $batch)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$batch->title}}</td>
                                            <td class="">{{$batch->company->title}}</td>
                                            <td class="">{{$batch->godown->title}}</td>
                                            <td class="">{{$batch->product_type->title}}</td>
                                            <td class="">{{$batch_helper->batchQuantity($batch->id)}}</td>
                                            <td class="">{{$batch_helper->batchAltQuantity($batch->id)}}</td>
                                            <td class="">{{$batch->created_at}}</td>
                                            <td>
                                                <div class="row col-md-5">
                                                    <a href="{{route('admin.batches.edit',$batch)}}">
                                                        <button class="btn btn-purple darken-4 btn-sm m-0"><i
                                                                    class="fa fa-edit "></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                       data-target="#deleteModal-{{$batch->id}}">
                                                        <button type="submit" class="btn btn-delete"><i
                                                                    class="fa fa-trash"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="deleteModal-{{$batch->id}}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ready to
                                                            Leave?</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Are you sure you want to delete!!!</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Cancel
                                                        </button>
                                                        {{ Form::open(['url' => route('admin.batches.destroy',$batch), 'method' => 'delete','class'=>'form-delete  pull-left']) }}
                                                        <button type="submit" class="btn btn-delete">
                                                            Delete
                                                        </button>
                                                        {{Form::close() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <span>No Godown data</span>
                                    @endforelse
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Company</th>
                                        <th>Godown</th>
                                        <th>Product Type</th>
                                        <th>Batch Quantity</th>
                                        <th>Batch Alternate Quantity</th>
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