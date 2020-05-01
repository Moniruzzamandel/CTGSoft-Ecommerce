@extends('front.layouts.master')

@section('content')

<div class="content-wrapper">

        @include('front.layouts.banner')
    
        <!-- End Books products grid -->
    
        <div class="container">
            <div class="row pt120">
                <div class="books-grid">
    
                <div class="row mb30">
                    @foreach ($products as $product)

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                            <div class="books-item">
            <a href="{{ route('single', ['id'=>$product->id]) }}">
                                <div class="books-item-thumb">
                                    {{-- <img src="{{ asset('front/img/book6.png') }}" alt="book"> --}}
                                    <img src="{{ asset('product') }}/{{ $product->thumb_image }} " class="img img-responsive">
                                    <div class="new">New</div>
                                    <div class="sale">Sale</div>
                                    <div class="overlay overlay-books"></div>
                                </div>
            </a>
                                <div class="books-item-info">
                                    <h5 class="books-title"><a href="{{ route('single', ['id'=>$product->id]) }}">{{ $product->title }}</a></h5>
        
                                    <div class="books-price">BDT {{ $product->price }}</div>
                                </div>
        
                                <a href="{{ route('cart.rapid.add', ['id' => $product->id ]) }}" class="btn btn-small btn--dark add">
                                    <span class="text">Add to Cart</span>
                                    <i class="seoicon-commerce"></i>
                                </a>
        
                            </div>
                        </div>
                        
                    @endforeach
                    
                </div>
                   
                <div class="row pb120">
    
                    <div class="col-lg-12">
                        {{ $products->links("pagination::default") }} 
                        
                    </div>
    
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection