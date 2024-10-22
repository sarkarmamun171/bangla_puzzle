@extends('frontend.master')
@section('content')
<section class="themart-interestproduct-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="wpo-section-title">
                    <h2>Products Of Your Interest</h2>
                </div>
            </div>
        </div>
        <div class="product-wrap">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="product-item">
                        <div class="image">
                            <img src="{{ asset('uploads/product/preview/') }}/{{ $product->preview_img }}" alt=""style="width: 60%; margin:auto;">
                            <div class="tag new">New</div>
                        </div>
                        <div class="text">
                            <h2> <a title="{{ $product->product_name }}" href="">
                                @if (strlen($product->product_name)>25)
                                        {{ Str::substr($product->product_name,0,25).'....' }}
                                    </a>
                                @else
                                    {{ $product->product_name }}
                                </a>
                                @endif
                            </h2>
                            <div class="rating-product">
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <span>130</span>
                            </div>
                            <div class="price">
                                <span class="present-price">&#2547;{{ $product->after_discount }}</span>
                                <del class="old-price">&#2547;{{ $product->price }}</del>
                            </div>
                            <div class="shop-btn">
                                <a class="theme-btn-s2" href="">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="more-btn">
                    <a class="theme-btn-s2" href="product.html">View All</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
