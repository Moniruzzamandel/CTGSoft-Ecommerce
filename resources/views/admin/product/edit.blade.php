@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Product - {{ $product->title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $product->title }}</li>
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
                        <strong class="card-title">Edit Product - {{ $product->title }}</strong>
                        <div class="card-tools">
                            <a href="{{ route('product.index') }}" type="button" class="btn btn-outline-info btn-sm pull-right"><i class="fa fa-left-arrow"></i>&nbsp; Back To Product List</a>
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
                              {{ Form::model($product,['route' => ['product.update',$product->id],'method'=>'put','enctype'=>'multipart/form-data']) }}
                                 
                                      
                              <div class="form-group">
                {{ Form::label('title', 'Title', array('class' => 'control-label mb-1')) }}
                                          
                {{ Form::text('title',null,['class'=>'form-control','id'=>'title'] )  }}
                                    </div>
    
                                     <div class="form-group">
                {{ Form::label('category', 'Category', array('class' => 'control-label mb-1')) }}
                                          
                {{ Form::select('category_id',$categories,$product->category_id,['class'=>'form-control myselect','data-placeholder'=>'Select Category'] )  }}
                                    </div>

                <div class="form-group">
                    {{ Form::label('price', 'Price', array('class' => 'control-label mb-1')) }}
                                              
                    {{ Form::text('price',null,['class'=>'form-control','id'=>'price'] )  }}
                </div>
    
                                     <div class="form-group">
         {{ Form::label('description', 'Description', array('class' => 'control-label mb-1')) }}
                                          
        {{ Form::textarea('description',null,['class'=>'form-control my-editor','id'=>'description'] )  }}
                                    </div>
    
               <div class="form-group">
     {{ Form::label('image', 'Image', array('class' => 'control-label mb-1')) }}
                                          
     {{ Form::file('img',['class'=>'form-control'] )  }}
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
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'description' ); 
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>
@endsection