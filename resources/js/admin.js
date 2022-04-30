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
const filterBtn = document.querySelectorAll("[data-filter-btn]");

select.addEventListener("click", function () {
  elementToggleFunc(this);
});

// add event in all select items
for (let i = 0; i < selectItems.length; i++) {
  selectItems[i].addEventListener("click", function () {
    let selectedValue = this.innerText.toLowerCase();
    selectValue.innerText = this.innerText;
    elementToggleFunc(select);
    filterFunc(selectedValue);
  });
}

// Upload Image Display
var loadFile = function (event) {
  var output = document.getElementById("imgView");
  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function () {
    URL.revokeObjectURL(output.src); // free memory
  };
};
