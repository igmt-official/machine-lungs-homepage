
//function for toggling class
const elementToggleFunc = function (elem) {
    elem.classList.toggle("active"); //remove class if found on the passed element
};

const add_product_modal_btn = document.querySelector("#showAddProductModal");   //get btn DOM (document object model) responsible for showing the modal
const overlay = document.querySelector(".overlay");     //get the element DOM that has class ".overlay"
const modal_close_btn = overlay.querySelector(".modal-close-btn"); //get the element DOM that has class ".modal-close-btn"

//show modal event click listener, Bind event listner
add_product_modal_btn.addEventListener("click", () => {
    elementToggleFunc(overlay);
})
//close modal click event listener, Bind event listner
modal_close_btn.addEventListener("click", () => {
    elementToggleFunc(overlay);
})