/* SHOW MENU */
const elementToggleFunc = function (elem) {
  elem.classList.toggle("active");
};

const navMenu = document.querySelector(".header-container");
const navMenuBtn = document.getElementById("mobile-nav-btn");
const navMenuBtnIcon = "ri-arrow-up-s-line";

navMenuBtn.addEventListener("click", function () {
  elementToggleFunc(navMenu);
  navMenuBtn.classList.toggle(navMenuBtnIcon);
});

/* REMOVE MENU MOBILE */
// const navLink = document.querySelectorAll(".nav-link");

// function linkAction() {
//   const navMenu = document.getElementById("nav-menu");
//   // When we click on each nav__link, we remove the show-menu class
//   navMenu.classList.remove("show-menu");
// }
// navLink.forEach((n) => n.addEventListener("click", linkAction));

/* DARK LIGHT THEME */
const themeButton = document.getElementById("theme-btn");
const darkTheme = "dark-theme";
const iconTheme = "ri-moon-line";

// Previously selected topic (if user selected)
const selectedTheme = localStorage.getItem("selected-theme");
const selectedIcon = localStorage.getItem("selected-icon");

// We obtain the current theme that the interface has by validating the dark-theme class
const getCurrentTheme = () =>
  document.body.classList.contains(darkTheme) ? "dark" : "light";
const getCurrentIcon = () =>
  themeButton.classList.contains(iconTheme) ? "ri-sun-line" : "ri-moon-line";

// We validate if the user previously chose a topic
if (selectedTheme) {
  // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
  document.body.classList[selectedTheme === "dark" ? "add" : "remove"](
    darkTheme
  );
  themeButton.classList[selectedIcon === "ri-moon-line" ? "add" : "remove"](
    iconTheme
  );
}

// Activate / deactivate the theme manually with the button
themeButton.addEventListener("click", () => {
  // Add or remove the dark / icon theme
  document.body.classList.toggle(darkTheme);
  themeButton.classList.toggle(iconTheme);
  // We save the theme and the current icon that the user chose
  localStorage.setItem("selected-theme", getCurrentTheme());
  localStorage.setItem("selected-icon", getCurrentIcon());
});
