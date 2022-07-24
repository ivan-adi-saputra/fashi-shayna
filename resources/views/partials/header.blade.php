@php
    use App\Models\Cart;
    use App\Models\Product;
    if ( Auth::check() ) {
        $carts = Cart::with('product')->where('users_id', auth()->user()->id)->get();
    }
    // $total = Product::with('cart')->where('id', 'products_id')->sum('price');
    // $item = Product::where('users_id', auth()->user()->id);
    // $total = collect($item)->sum('price')
@endphp
<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i> ivanadisaputra@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i> +6289 658 142 086
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./index.html">
                            <img src="{{ url('img/logo_website_shayna.png') }}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7"></div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="cart-icon">
                            Keranjang Belanja &nbsp;
                            <a href="{{ route('cart') }}">
                                {{-- <i class="icon_bag_alt"></i> --}}
                                <i class="bi bi-cart-dash"></i>
                                @if ( Auth::check() && $carts->count() )
                                    <span>{{ $carts->count() }}</span>   
                                @else 
                                    
                                @endif
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                            @if(Auth::check() && $carts)
                                            @foreach ($carts as $cart)
                                                <tr>
                                                    <td class="si-pic">
                                                        @if ( $cart->product->photo )
                                                            <img src="{{ asset('storage/' . $cart->product->photo) }}" alt="" height="80" />
                                                        @else
                                                            <img src="{{ url('img/select-product-1.jpg') }}" alt="" />
                                                        @endif
                                                    </td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$ {{ $cart->price }}.00</p>
                                                            <h6>{{ $cart->product->name }}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <a href="{{ route('cart') }}">
                                                            <i class="ti-close"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    {{-- @foreach ( $carts as $cart ) --}}
                                    @if (Auth::check() && $carts)
                                        <span>total:</span>
                                        <h5>$ {{ $carts->sum('price') }}.00</h5>
                                    @endif
                                    {{-- @endforeach --}}
                                </div>
                                <div class="select-button">
                                    <a href="{{ route('cart') }}" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="{{ route('cart') }}" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->