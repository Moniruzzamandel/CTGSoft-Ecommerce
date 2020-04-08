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
                                 <a href="{{ route('permission.create') }}" type="button" class="btn btn-outline-success btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp; Create Permission</a>
                                </div> 
                            </div>
                            
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Diaplay Name</th>
                                        <th>Discription</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $i=>$permission)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->display_name }}</td>
                                                <td>{!! $permission->description !!}</td>
                                                <td>
                                                <a href="{{ route('permission.edit', ['id'=>$permission->id]) }}" class="btn btn-outline-primary btn-sm">Edit</a> 
           {{ Form::open(['method'=>'DELETE','url'=>['/admin/permission/'.$permission->id],'style'=>'display:inline' ]) }}
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

