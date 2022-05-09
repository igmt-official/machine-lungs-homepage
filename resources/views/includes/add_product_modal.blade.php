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
    <div class="overlay">
        <section class="add-product-modal">
            <div class="add-product-header">
                <h1 class="add-product-title">ADD NEW PRODUCT</h1>
                <button class="modal-close-btn">
                    <i class="ri-close-line"></i>
                </button>
            </div>

            <form id="AddProductForm" class="add-product-form needs-validation" method="POST" action="/product/create"
                enctype="multipart/form-data">
                @csrf
                <div class="add-product-container">

                    <div class="form-group">
                        <input type="text" name="product_name" class="form-input product-name"
                            placeholder="Product Name" />
                        <small class="invalid-message">Field required</small>
                    </div>
                    <input type="hidden" name="category_id" class="form-input category_id" placeholder="Product Name"
                        required />
                    <!-- !SELECT CATEGORY BOX -->

                    <div class="category-select-box">
                        <!-- !SELECT CATEGORY BOX BUTTON -->
                        <button type="button" class="category-select element-needs-validation " data-select>
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
                        </ul>
                        <small class="invalid-message">Field required</small>
                    </div>
                    <div id="dynamic-variations" class="variations-wrapper ">
                        <div class="form-input-wrapper">
                            <div class="variation-prices element-needs-validation">
                                <input type="text" name="variation[]" class="form-input variation"
                                    placeholder="60ML, 6MG" required />
                                <input type="text" name="price[]" class="form-input price-error" placeholder="Price"
                                    required />
                                <input type="text" name="stock_quantity[]" class="form-input stock-quantity"
                                    placeholder="QTY" required />
                            </div>
                            <small class="invalid-message">Field required</small>
                        </div>
                    </div>

                    <button type="button" class="add-variation-button" id="add-variation-button"> Add
                        Variation</button>

                    {{-- <input type="text" class="form-input" placeholder="Stock" required /> --}}
                    <div class="form-input-wrapper">
                        <textarea name="description" id="description" class="form-input description" placeholder="Description"></textarea>
                        <small class="invalid-message">Field required</small>
                    </div>
                    <!-- !CUSTOM INPUT TYPE FILE -->
                    <div class="upload-product-photo">
                        <p class="upload-title">Upload Product Photo</p>
                        <small class="upload-description">
                            Use 500pixels x 500pixels as default size to avoid image
                            clipping.
                        </small>

                        <div class="img-wrapper product-image element-needs-validation">
                            {{-- <input id="uploadBtn" type="file" class="upload-img" accept="image/*"
                                required />
                            <img id="imgView" class="img-view" src="#" alt="" />
                            <label class="upload-img-custom" for="uploadBtn">
                                <i class="ri-add-circle-line"></i>
                            </label> --}}
                            <div class="img-inner-wrapper ">
                                <input name="product_img" id="uploadBtn" type="file" class="upload-img"
                                    accept="image/*" required>
                                <label class="upload-img-custom" for="uploadBtn">
                                    <i class="ri-add-circle-line"></i>
                                </label>
                                <img id="imgView" class="img-view" src="#" alt="" />
                            </div>
                        </div>
                        <small class="invalid-message">Field required</small>
                        <!-- <i class="ri-add-circle-line"></i> -->
                    </div>
                    <input type="hidden" name="status" id="status" required hidden readonly>
                    <!-- !PUBLISH BUTTON -->
                    <button type="button" id="btn-publish" class="publish-btn save-product" value="1">Publish</button>
                    <button type="button" id="btn-delist" class="publish-btn save-product" value="0">Save and
                        Delist</button>
                </div>
            </form>
        </section>
    </div>
</div>
