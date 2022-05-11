@php
use App\Http\Controllers\ProductsController;
$productsController = new ProductsController();
$products = $productsController->getAllProducts();

@endphp
@extends('layouts.app')

@section('title', 'Machine Lungs - Vapeshop')


@section('head')
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/general.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/queries.css') }}" />
@endsection

@section('body')
    <section class="admin">
        <div class="admin-container">
            <h1 class="admin-title">Admin</h1>
            {{-- include add product modal --}}
            @include('includes.add_product_modal')
            <!-- !STOCK TABLE HEADER -->
            <div class="stock">
                {{-- <div class="stock-info">
                    <ul class="stock-info-list">
                        <li class="stock-info-item">PRODUCT</li>
                        <li class="stock-info-item">VARIATION</li>
                        <li class="stock-info-item">AVAILABLE</li>
                    </ul>
                </div> --}}

                <!-- !STOCK TABLE LIST -->
                <div class="stock-product">
                    <ul class="stock-list">
                        @if (count($products) > 0)
                            @foreach ($products as $item)
                                <li class="stock-list-item">
                                    <button class="stock-list-item-btn">
                                        <figure class="stock-img">
                                            <div class="stock-img-container">

                                                <img src="{{ asset("product_images/{$item->product_image}") }}"
                                                    alt="Product Image" />
                                            </div>
                                            <figcaption>
                                                <div class="stock-caption">
                                                    <span>{{ $item->product_name }}</span>
                                                </div>
                                            </figcaption>
                                        </figure>

                                        <div class="stock-variation">
                                            @php
                                                $variations = $productsController->getProductVariations($item->id);
                                            @endphp


                                            @if (count($variations) > 0)
                                                @foreach ($variations as $variation)
                                                    <div class="single-variation">
                                                        <span>Var.: {{ $variation->variation }}</span>
                                                    </div>
                                                    <div class="single-stock">
                                                        Stock: {{ $variation->stock_quantity }}
                                                    </div>
                                                    <div class="single-price">
                                                        <span>Price: {{ $variation->price }}</span>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div>
                                                    Variation not found
                                                </div>
                                            @endif

                                        </div>

                                        <div class="available">
                                            @if ($item->status)
                                                AVAILABLE
                                            @else
                                                <span style="color:#d00">DELISTED</span>
                                            @endif
                                        </div>

                                    </button>

                                </li>
                            @endforeach
                        @endif


                        {{-- <li class="stock-list-item">
                            <button class="stock-list-item-btn">
                                <figure class="stock-img">
                                    <div class="stock-img-container">
                                        <img src="img/Magic-Cereal.png" alt="Product Image" />
                                    </div>
                                    <figcaption>
                                        <div class="stock-caption">
                                            <span>Magic Cereal</span>

                                        </div>
                                    </figcaption>
                                </figure>

                                <div class="stock-variation">
                                    <div class="single-variation">
                                        <span>ML: 60</span>
                                    </div>
                                    <div class="single-stock">
                                        Stock: 15
                                    </div>
                                    <div class="single-price">
                                        <span>Price: ₱ 60</span>
                                    </div>
                                </div>

                                <div class="available">AVAILABLE</div>

                            </button>

                        </li>
                        <li class="stock-list-item">
                            <button class="stock-list-item-btn">
                                <figure class="stock-img">
                                    <div class="stock-img-container">
                                        <img src="img/Magic-Cereal.png" alt="Product Image" />
                                    </div>
                                    <figcaption>
                                        <div class="stock-caption">
                                            <span>Magic Cereal</span>

                                        </div>
                                    </figcaption>
                                </figure>

                                <div class="stock-variation">
                                    <div class="single-variation">
                                        <span>ML: 60</span>
                                    </div>
                                    <div class="single-stock">
                                        Stock: 15
                                    </div>
                                    <div class="single-price">
                                        <span>Price: ₱ 60</span>
                                    </div>
                                </div>

                                <div class="available">AVAILABLE</div>

                            </button>

                        </li> --}}

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- !MAIN SCRIPT -->
    <!-- <script src="js/main.js"></script> -->

    <script type="module" src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/products.js') }}"></script>
@endsection
