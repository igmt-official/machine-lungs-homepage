@php
use App\Http\Controllers\HelperController;
$hc = new HelperController();

$categories = $hc->fetchCategories();
@endphp

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

            <form id="AddProductForm" class="add-product-form" method="POST" action="/product/create"
                enctype="multipart/form-data">
                @csrf
                <div class="add-product-container">

                    <input type="text" name="product_name" class="form-input" placeholder="Product Name" required />
                    <input type="hidden" name="category_id" class="form-input category_id" placeholder="Product Name"
                        required />
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
                            @if (count($categories) > 0)
                                @foreach ($categories as $category)
                                    <li class="select-list-item">
                                        <button class="category-button" type="button" value="{{ $category->id }}"
                                            data-select-item>{{ $category->category_name }}</button>
                                    </li>
                                @endforeach

                            @endif

                            {{-- <li class="select-list-item">
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
                            </li> --}}
                        </ul>
                    </div>
                    <div id="dynamic-variations" class="variations-wrapper ">
                        <div class="variation-prices">
                            <input type="text" name="variation[]" class="form-input" placeholder="60ML, 6MG"
                                required />
                            <input type="text" name="price[]" class="form-input" placeholder="Price" required />
                            <input type="text" name="stock_quantity[]" class="form-input" placeholder="QTY"
                                required />
                        </div>
                    </div>
                    <button type="button" class="add-variation-button" id="add-variation-button"> Add
                        Variation</button>
                    {{-- <input type="text" class="form-input" placeholder="Stock" required /> --}}

                    <textarea name="description" id="description" class="form-input description" placeholder="Description"></textarea>
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
                                <input name="product_img" onchange="loadFile(event)" id="uploadBtn" type="file"
                                    class="upload-img" accept="image/*" required>

                                <label class="upload-img-custom" for="uploadBtn">
                                    <i class="ri-add-circle-line"></i>
                                </label>
                                <img id="imgView" class="img-view" src="#" alt="" />
                            </div>
                        </div>
                        <!-- <i class="ri-add-circle-line"></i> -->
                    </div>

                    <!-- !PUBLISH BUTTON -->
                    <button type="submit" id="btn-publish" class="publish-btn">Publish</button>
                    <button id="btn-delist" class="publish-btn">Save and Delist</button>
                </div>
            </form>
        </section>
    </div>
</div>
