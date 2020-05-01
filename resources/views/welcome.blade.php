@extends('front.layouts.master')

@section('content')

<div class="content-wrapper">

        <div class="container">
            <div class="row pt120">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="heading align-center mb60">
                        <h4 class="h1 heading-title">Chittagong Soft Ecommerce</h4>
                        <p class="heading-text">Buy mobile, laptop, desktop and we ship to you.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- End Books products grid -->
    
        <div class="container">
            <div class="row pt120">
                <div class="books-grid">
    
                <div class="row mb30">
                    @foreach ($products as $product)

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                            <div class="books-item">
                                <div class="books-item-thumb">
                                    {{-- <img src="{{ asset('front/img/book6.png') }}" alt="book"> --}}
                                    <img src="{{ asset('product') }}/{{ $product->thumb_image }} " class="img img-responsive">
                                    <div class="new">New</div>
                                    <div class="sale">Sale</div>
                                    <div class="overlay overlay-books"></div>
                                </div>
        
                                <div class="books-item-info">
                                    <h5 class="books-title">{{ $product->title }}</h5>
        
                                    <div class="books-price">BDT {{ $product->price }}</div>
                                </div>
        
                                <a href="19_cart.html" class="btn btn-small btn--dark add">
                                    <span class="text">Add to Cart</span>
                                    <i class="seoicon-commerce"></i>
                                </a>
        
                            </div>
                        </div>
                        
                    @endforeach
                    
                </div>
                   
                <div class="row pb120">
    
                    <div class="col-lg-12">
                        {{ $products->links() }} 
                        <nav class="navigation align-center">
    
                            <a href="#" class="page-numbers bg-border-color current"><span>1</span></a>
                            <a href="#" class="page-numbers bg-border-color"><span>2</span></a>
                            <a href="#" class="page-numbers bg-border-color"><span>3</span></a>
                            <a href="#" class="page-numbers bg-border-color"><span>4</span></a>
                            <a href="#" class="page-numbers bg-border-color"><span>5</span></a>
    
                            <svg class="btn-prev">
                                <use xlink:href="#arrow-left"></use>
                            </svg>
                            <svg class="btn-next">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
    
                        </nav>
    
                    </div>
    
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection