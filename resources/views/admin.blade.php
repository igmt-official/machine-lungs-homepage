<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- DESCRIPTION -->
    <meta name="description"
        content="Machine Lungs - Vapeshop, we sell only premium juice, high nic / salt nic / Flavory / Mentol / etc..." />

    <!-- FAVICON -->
    <link rel="icon" href="#" />
    <link rel="apple-touch-icon" href="#" />
    <link rel="manifest" href="manifest.webmanifest" />

    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/general.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />

    <title>Machine Lungs - Vapeshop</title>
</head>

<body>
    <!-- <header class="header section" data-nav>
      <div class="nav-bar">
        <figure><span class="logo">MACHINE LUNGS</span></figure>

        <div class="mobile-nav">
          <i id="theme-btn" class="ri-moon-line"></i>
          <i class="ri-arrow-down-s-line" data-nav-btn></i>
        </div>
      </div>

      <div class="separator"></div>

      <nav class="nav">
        <ul class="nav-list">
          <li>
            <a href="#" class="nav-link active" data-nav-link>Home</a>
          </li>

          <li>
            <a href="#" class="nav-link" data-nav-link>New</a>
          </li>

          <li>
            <a href="#" class="nav-link" data-nav-link>Shop</a>
          </li>

          <li><a href="#" class="nav-link" data-nav-link>Contact</a></li>
        </ul>
      </nav>
    </header> -->

    <section class="admin">
        <div class="admin-container">
            <h1 class="admin-title">Admin</h1>
            <!-- !ADD PRODUCT -->
            <button id="showAddProductModal" class="add-product">
                <i class="ri-add-circle-line"></i>
                <span>Add New Product</span>
            </button>

            <!-- !ADD PRODUCT MODAL -->
            <div class="modal-container">
                <div class="overlay active">
                    <section class="add-product-modal">
                        <div class="add-product-header">
                            <h1 class="add-product-title">ADD NEW PRODUCT</h1>
                            <button class="modal-close-btn">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        <form class="add-product-form" action="#">
                            <div class="add-product-container">
                                <input type="text" class="form-input" placeholder="Product Name" required />
                                <!-- !SELECT CATEGORY BOX -->
                                <div class="category-select-box">
                                    <!-- !SELECT CATEGORY BOX BUTTON -->
                                    <button type="button" class="category-select" data-select>
                                        <div class="select-value" data-select-value>
                                            Select Category
                                        </div>

                                        <div class="select-icon">
                                            <i class="ri-arrow-down-s-line"></i>
                                        </div>
                                    </button>

                                    <!-- !SELECT CATEGORY LIST ITEM BOX -->
                                    <ul class="select-list">
                                        <li class="select-list-item">
                                            <button type="button" data-select-item>E-Liquids</button>
                                        </li>
                                        <li class="select-list-item">
                                            <button type="button" data-select-item>Mods</button>
                                        </li>
                                        <li class="select-list-item">
                                            <button type="button" data-select-item>Atomizer</button>
                                        </li>
                                        <li class="select-list-item">
                                            <button type="button" data-select-item>Coil</button>
                                        </li>
                                        <li class="select-list-item">
                                            <button type="button" data-select-item>Cotton</button>
                                        </li>
                                    </ul>
                                </div>
                                <div id="dynamic-variations" class="variations-wrapper ">
                                    <div class="variation-prices">
                                        <input type="text" class="form-input" placeholder="60ML, 6MG" required />
                                        <input type="text" class="form-input" placeholder="Price" required />
                                        <button type="button" class="delete-variation"><i
                                                class="ri-delete-bin-line"></i></button>
                                    </div>
                                </div>
                                <button type="button" class="add-variation-button" id="add-variation-button"> Add Variation</button>
                                {{-- <input type="text" class="form-input" placeholder="Stock" required /> --}}

                                <textarea  name="desription" id="desription" class="form-input description" placeholder="Description"></textarea>
                                <!-- !CUSTOM INPUT TYPE FILE -->
                                <div class="upload-product-photo">
                                    <p class="upload-title">Upload Product Photo</p>
                                    <small class="upload-description">
                                        Use 500pixels x 500pixels as default size to avoid image
                                        clipping.
                                    </small>

                                    <div class="img-wrapper">
                                        {{-- <input id="uploadBtn" type="file" class="upload-img" accept="image/*"
                                            required />
                                        <img id="imgView" class="img-view" src="#" alt="" />
                                        <label class="upload-img-custom" for="uploadBtn">
                                            <i class="ri-add-circle-line"></i>
                                        </label> --}}
                                        <div class="img-inner-wrapper">
                                            <input onchange="loadFile(event)" id="uploadBtn" type="file"
                                                class="upload-img" accept="image/*" required />

                                            <label class="upload-img-custom" for="uploadBtn">
                                                <i class="ri-add-circle-line"></i>
                                            </label>
                                            <img id="imgView" class="img-view" src="#" alt="" />
                                        </div>
                                    </div>
                                    <!-- <i class="ri-add-circle-line"></i> -->
                                </div>

                                <!-- !PUBLISH BUTTON -->
                                <button class="publish-btn">Publish</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>

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
</body>

</html>
