@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Author - {{ $author->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $author->name }}</li>
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
                        <strong class="card-title">Edit Author - {{ $author->name }}</strong>
                        <div class="card-tools">
                            <a href="{{ route('author.index') }}" type="button" class="btn btn-outline-info btn-sm pull-right"><i class="fa fa-left-arrow"></i>&nbsp; Back To Permission List</a>
                        </div>
                    </div>
                    <div class="card-body">
                      <!-- Credit Card -->
                      <div id="pay-invoice">
                          <div class="card-body">
                              <div class="card-title">
                        @if(count($errors) > 0 )
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul class="p-0 m-0" style="list-style: none;">
                                    @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                              </div>
                              {{ Form::model($author,['route' => ['author.update',$author->id],'method'=>'put']) }}
                               
                                    
                        <div class="form-group">
          {{ Form::label('name', 'Name', array('class' => 'control-label mb-1')) }}
                                    
          {{ Form::text('name',null,['class'=>'form-control','id'=>'name'] )  }}
                              </div>

                               <div class="form-group">
          {{ Form::label('email', 'Email', array('class' => 'control-label mb-1')) }}
                                    
           {{ Form::email('email',null,['class'=>'form-control','id'=>'email'] )  }}
                              </div>

                               <div class="form-group">
          {{ Form::label('password', 'Update Password', array('class' => 'control-label mb-1')) }}
                                    
          {{ Form::password('password',['class'=>'form-control','id'=>'password'] )  }}
                              </div>

                              <div class="form-group">
          {{ Form::label('role', 'Roles', array('class' => 'control-label mb-1')) }}
                                    
          {{ Form::select('roles[]',$roles,$selectedRoles,['class'=>'myselect','data-placeholder'=>'Select role(s)', 'multiple'] )  }}
                              </div>

              <div>
                  <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                      <i class="fa fa-lock fa-lg"></i>&nbsp;
                      <span id="payment-button-amount">Update</span>
                      <span id="payment-button-sending" style="display:none;">Sendingâ€¦</span>
                  </button>
              </div>
                                {{ Form::close() }}
                          </div>
                      </div>

                    </div>
                  </div> <!-- .card -->
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
    <script src="{{ asset('admin/js/chosen.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery(".myselect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
        CKEDITOR.replace( 'description' ); 
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>
@endsection