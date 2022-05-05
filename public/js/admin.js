

//function for toggling class
const elementToggleFunc = function (elem) {
  elem.classList.toggle("active"); //remove class if found on the passed element
};

const add_product_modal_btn = document.querySelector("#showAddProductModal"); //get btn DOM (document object model) responsible for showing the modal
const overlay = document.querySelector(".overlay"); //get the element DOM that has class ".overlay"
const modal_close_btn = overlay.querySelector(".modal-close-btn"); //get the element DOM that has class ".modal-close-btn"

//show modal event click listener, Bind event listner
add_product_modal_btn.addEventListener("click", () => {
  elementToggleFunc(overlay);
});
//close modal click event listener, Bind event listner
modal_close_btn.addEventListener("click", () => {
  elementToggleFunc(overlay);
});

// SELECT CATEGORY
const select = document.querySelector("[data-select]");
const selectItems = document.querySelectorAll("[data-select-item]");
const selectValue = document.querySelector("[data-select-value]");
//const filterBtn = document.querySelectorAll("[data-filter-btn]");

select.addEventListener("click", function () {
  elementToggleFunc(this);
});

// add event in all select items
for (let i = 0; i < selectItems.length; i++) {
  selectItems[i].addEventListener("click", function () {
    //let selectedValue = this.innerText.toLowerCase();
    selectValue.innerText = this.innerText;
    elementToggleFunc(select);
    //filterFunc(selectedValue);
  });
}

// Upload Image Display
var loadFile = function (event) {
  var output = document.getElementById("imgView");
  try {
    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.visibility = "visible";
  } catch (err) {
    output.style.visibility = "hidden";

  }
  output.onload = function () {
    URL.revokeObjectURL(output.src); // free memory
  };
};


/* add variation function */
function dynamicVariations() {
  //create div element
  const variation = "<div class='variation-prices'>" +
    "<input type='text' name='variation[]' class='form-input' placeholder='60ML, 6MG' required />" +
    "<input type='number' name='price[]' class='form-input' placeholder='Price' required />" +
    "<input type='number' name='stock_quantity[]' class='form-input' placeholder='QTY' required />" +
    "<button type='button' class='delete-variation' >" +
    "<i class='ri-delete-bin-line'></i> " +
    "</button > " +
    "</div > ";

  /* add variation buttin click listener */
  $("#add-variation-button").click(function (e) {
    e.preventDefault();
    //append to parent
    $("#dynamic-variations").append(variation);
  });
  /* delete variation click listener */
  $(document).on("click", ".delete-variation", function () {
    $(this).parent().remove();  //remove the parent of the button whose clicked
  });

}

/* load after the page finished loading */
$(document).ready(function () {
  //call dynamic variation function
  dynamicVariations();
});