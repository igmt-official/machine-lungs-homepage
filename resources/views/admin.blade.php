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
                <div class="stock-info">
                    <ul class="stock-info-list">
                        <li class="stock-info-item">PRODUCT</li>
                        <li class="stock-info-item">VARIATION</li>
                        <li class="stock-info-item">AVAILABLE</li>
                    </ul>
                </div>

                <!-- !STOCK TABLE LIST -->
                <div class="stock-product">
                    <ul class="stock-list">
                        <li class="stock-list-item">
                            <button class="stock-list-item-btn">
                                <figure class="stock-img">
                                    <div class="stock-img-container">
                                        <img src="img/Chroma-Astra.png" alt="Product Image" />
                                    </div>

                                    <figcaption>
                                        <div class="stock-caption">
                                            <span>Chroma Asta</span>
                                            <span>₱ 200</span>
                                        </div>

                                        <span class="stock-quantity">Stock: 0</span>
                                    </figcaption>
                                </figure>

                                <div class="stock-variation">
                                    <div class="stock-ml-mg">
                                        <span>ML: 60</span>
                                        <span>MG: 6</span>
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
                                            <span>₱ 200</span>
                                        </div>

                                        <span class="stock-quantity">Stock: 0</span>
                                    </figcaption>
                                </figure>

                                <div class="stock-variation">
                                    <div class="stock-ml-mg">
                                        <span>ML: 60</span>
                                        <span>MG: 6</span>
                                    </div>
                                </div>

                                <div class="available">AVAILABLE</div>
                            </button>
                        </li>

                        <li class="stock-list-item">
                            <button class="stock-list-item-btn">
                                <figure class="stock-img">
                                    <div class="stock-img-container">
                                        <img src="img/Chroma-Astra.png" alt="Product Image" />
                                    </div>

                                    <figcaption>
                                        <div class="stock-caption">
                                            <span>Chroma Asta</span>
                                            <span>₱ 200</span>
                                        </div>

                                        <span class="stock-quantity">Stock: 0</span>
                                    </figcaption>
                                </figure>

                                <div class="stock-variation">
                                    <div class="stock-ml-mg">
                                        <span>ML: 60</span>
                                        <span>MG: 6</span>
                                    </div>
                                </div>

                                <div class="available">AVAILABLE</div>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- !MAIN SCRIPT -->
    <!-- <script src="js/main.js"></script> -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/products.js') }}"></script>
@endsection
