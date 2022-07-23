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
                    <span>Product</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shayna in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
            <div class="dropdown">
                <a class="btn btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </a>
                <ul class="dropdown-menu">
                    @foreach( $items as $item )
                        <li><a class="dropdown-item" href="/product?category={{ $item->category->slug }}">{{ $item->category->name }}</a></li>
                    @endforeach
                </ul>
              </div>
        </div>

        {{-- search --}}
        <div class="row justify-content-end mb-3">
            <div class="col-md-6">
                <form action="{{ route('product') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                        <button class="btn btn-warning" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($items as $item)
            <div class="product-item">
                <div class="pi-pic">
                    @if ($item->photo)
                        <img src="{{ asset('storage/' . $item->photo) }}" alt="" />
                    @else
                        <img src="{{ url('img/products/women-2.jpg') }}" alt="" />
                    @endif
                    <ul>
                        <li class="w-icon active">
                            <form action="{{ route('add-cart', $item->id) }}" method="post">
                            @csrf
                                <button type="submit" class="btn btn-warning border-0">
                                    <i class="bi bi-cart-dash"></i>
                                </button>                            </form>
                        </li>
                        <li class="quick-view"><a href="">+ Quick View</a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    <div class="catagory-name">{{ $item->category->name }}</div>
                    <a href="{{ route('product-details', $item->id) }}">
                        <h5>{{ $item->name }}</h5>
                    </a>
                    <div class="product-price">
                        $ {{ $item->price }}.00
                    </div>
                </div>
            </div>
                
            @endforeach
            </div>
        </div>
    </div>
</section>
@endsection