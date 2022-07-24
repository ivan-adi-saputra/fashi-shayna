@extends('layouts.default')

@section('container')
        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text product-more">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->
    
        <!-- Shopping Cart Section Begin -->
        <section class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th class="p-name text-center">Product Name</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $cart)
                                                <tr>
                                                    <td class="cart-pic first-row">
                                                        @if ( $cart->product->photo )
                                                            <img src="{{ asset('storage/' . $cart->product->photo) }}" />
                                                        @else
                                                            <img src="img/cart-page/product-1.jpg" />
                                                        @endif
                                                    </td>
                                                    <td class="cart-title first-row text-center">
                                                        <h5>{{ $cart->product->name }}</h5>
                                                    </td>
                                                    <td class="p-price first-row">$ {{ $cart->price }}.00</td>
                                                    <td class="delete-item">
                                                        <form action="{{ route('destroy-cart', $cart->id) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf 
                                                            <button class="border-0"><i class="bi bi-x-lg"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- <tr>
                                                <td class="cart-pic first-row">
                                                    <img src="img/cart-page/product-1.jpg" />
                                                </td>
                                                <td class="cart-title first-row text-center">
                                                    <h5>Pure Pineapple</h5>
                                                </td>
                                                <td class="p-price first-row">$60.00</td>
                                                <td class="delete-item">
                                                    <a href="#" style="color: black"><i class="bi bi-x-lg"></i>
                                                 </a></td>
                                            </tr>
                                            <tr>
                                                <td class="cart-pic first-row">
                                                    <img src="img/cart-page/product-1.jpg" />
                                                </td>
                                                <td class="cart-title first-row text-center">
                                                    <h5>Pure Pineapple</h5>
                                                </td>
                                                <td class="p-price first-row">$60.00</td>
                                                <td class="delete-item">
                                                    <a href="#" style="color: black"><i class="bi bi-x-lg"></i></a></td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <h4 class="mb-4">
                                    Informasi Pembeli:
                                </h4>
                                <div class="user-checkout">
                                    <form>
                                        <div class="form-group">
                                            <label for="namaLengkap">Nama lengkap</label>
                                            <input type="text" class="form-control" id="namaLengkap" aria-describedby="namaHelp" placeholder="Masukan Nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="namaLengkap">Email Address</label>
                                            <input type="email" class="form-control" id="emailAddress" aria-describedby="emailHelp" placeholder="Masukan Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="namaLengkap">No. HP</label>
                                            <input type="text" class="form-control" id="noHP" aria-describedby="noHPHelp" placeholder="Masukan No. HP">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamatLengkap">Alamat Lengkap</label>
                                            <textarea class="form-control" id="alamatLengkap" rows="3"></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="subtotal">ID Transaction <span>#SH12000</span></li>
                                        <li class="subtotal mt-3">Subtotal <span>${{ $carts->sum('price') }}.00</span></li>
                                        <li class="subtotal mt-3">Pajak <span>10%</span></li>
                                        @php
                                        $total = 0    
                                        @endphp
                                        @foreach ( (array) session('cart') as $id => $details)
                                            @php
                                                $total += $details['price'] * $details['quantity']
                                            @endphp
                                        @endforeach
                                        <li class="subtotal mt-3">Total Biaya <span>$ {{ $total }}.00</span></li>
                                        <li class="subtotal mt-3">Bank Transfer <span>Mandiri</span></li>
                                        <li class="subtotal mt-3">No. Rekening <span>2208 1996 1403</span></li>
                                        <li class="subtotal mt-3">Nama Penerima <span>Shayna</span></li>
                                    </ul>
                                    <a href="success.html" class="proceed-btn">I ALREADY PAID</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shopping Cart Section End -->
@endsection