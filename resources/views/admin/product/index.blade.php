@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ $page_name }}</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">{{ $page_name }}</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">       
                            <div class="card-header">
                                <strong class="card-title">{{ $page_name }} List Data</strong>
                                <div class="card-tools">
                                 <a href="{{ route('product.create') }}" type="button" class="btn btn-outline-success btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp; Create Product</a>
                                </div> 
                            </div>
                            
                            <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Price</th>
                                                <th>Entry Person</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                        
                                                @foreach($data as $i=>$row)
                                                <tr>
                                                <td style="width: 5%">{{ ++$i }}</td>
                                                <td> 
                    @if(file_exists(public_path('/product/').$row->thumb_image))
                        <img src="{{ asset('product') }}/{{ $row->thumb_image }} " class="img img-responsive">
                    @endif 
                                                </td> 
                                                <td  style="width: 20%">{{ $row->title }}</td>
                                                <td  style="width: 10%">{{ $row->price }} BDT</td>
                                                <td style="width: 15%"> {{ $row->creator->name }}</td>
                                                <td style="width: 10%"> {{ $row->category->name }}</td> 
                                                <td style="width: 10%"> 
                    {{ Form::open(['method'=>'PUT','url'=>['/admin/product/status/'.$row->id],'style'=>'display:inline' ]) }}
                        @if($row->status === 1)
                            {{ Form::submit('Unpublish',['class'=>'btn btn-outline-danger btn-sm']) }}
                            @else
                            {{ Form::submit('Publish',['class'=>'btn btn-outline-success btn-sm']) }}
                        @endif
                    {{ Form::close() }}            
                                                </td>
                                                <td style="width: 15%">
        
                    <a href="{{ route('product.edit', ['id'=>$row->id]) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                    {{ Form::open(['method'=>'DELETE','url'=>['/admin/product/'.$row->id],'style'=>'display:inline' ]) }}
                    {{ Form::submit('Delete',['class'=>'btn btn-outline-danger btn-sm']) }}
                    {{ Form::close() }}
                                                            
                                                </td>    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                </div>
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>

@endsection

@section('scriptoptions')

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin/js/toaster.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table').DataTable();
        } );
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>

@endsection

