@extends('layouts.default')

@section('container')
       <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ route('home') }}" class="text-decoration-none">
                            <i class="fa fa-home"></i> Home
                        </a>
                        <a href="{{ route('product') }}" class="text-decoration-none">
                             Product
                        </a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                        @if ( $galleries->count() )
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                @if ( $galleries[0]->photo )
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" height="600" src="{{ asset('storage/' . $galleries[0]->photo) }}" alt="First slide">
                                    </div>
                                @else
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" height="600" src="{{ url('img/mickey1.jpg') }}" alt="First slide">
                                    </div>
                                @endif
                                @foreach ($galleries->skip(1) as $gallery)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" height="600" src="{{ asset('storage/' . $gallery->photo) }}" alt="Second slide">
                                    </div>
                                @endforeach
                                </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                    </a>
                            </div>
                        @else
                            <div class="carousel-item active">
                                <img class="d-block w-100" height="600" src="{{ url('img/mickey1.jpg') }}" alt="First slide">
                            </div>
                        @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $item->category->name }}</span>
                                    <h3>{{ $item->name }}</h3>
                                </div>
                                <div class="pd-desc">
                                    {!! $item->description !!}
                                    <h4>$ {{ $item->price }}.00</h4>
                                </div>
                                <div class="quantity">
                                    <a href="shopping-cart.html" class="primary-btn pd-cart">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ( $products as $product )
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            @if ($product->photo)
                                <img src="{{ asset('storage/' . $product->photo) }}" alt="" />
                            @else 
                                <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=415&q=80" alt="" height="330" />

                            @endif
                            <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="bi bi-bag-dash"></i></a>
                                </li>
                                <li class="quick-view"><a href="{{ route('product-details', $product->id) }}">+ Quick View</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{ $product->category->name }}</div>
                            <a href="#">
                                <h5>{{ $product->name }}</h5>
                            </a>
                            <div class="product-price">
                                $ {{ $product->price }}.00
                                <span>$99.99</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ url('img/products/women-1.jpg') }}" alt="" />
                            <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="bi bi-bag-dash"></i></a>
                                </li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Coat</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $14.00
                                <span>$35.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ url('img/products/women-2.jpg') }}" alt="" />
                            <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="bi bi-bag-dash"></i></a>
                                </li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Shoes</div>
                            <a href="#">
                                <h5>Guangzhou sweater</h5>
                            </a>
                            <div class="product-price">
                                $13.00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ url('img/products/women-3.jpg') }}" alt="" />
                            <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="bi bi-bag-dash"></i></a>
                                </li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ url('img/products/women-4.jpg') }}" alt="" />
                            <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="bi bi-bag-dash"></i></a>
                                </li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Converse Shoes</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->
@endsection