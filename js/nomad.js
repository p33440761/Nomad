// 手機版--點擊漢堡選單彈出Nav
const modal = document.querySelector(".module-modal");
const check = document.getElementById("check");
const mobileBtn = document.getElementById("mobile-cta");
const nav = document.querySelector("nav");

check.addEventListener("click", () => {
  modal.classList.add("open");
  nav.classList.add("menu-btn");
});

modal.addEventListener("click", (e) => {
  if (e.target.classList.contains("module-modal")) {
    modal.classList.remove("open");
    nav.classList.remove("menu-btn");
    check.checked = false;
  }
});

// 桌機版--側邊Navbar滑動效果
const arrowDown = document.querySelector(".icon-arrow-down");
const arrowUp = document.querySelector(".icon-arrow-up");
const sideNavItem = document.querySelector(".side-navbar-item");

arrowDown.addEventListener("click", () => {
  sideNavItem.classList.add("slide-down");
  sideNavItem.classList.remove("slide-up");
  arrowDown.classList.add("hide");
  arrowUp.classList.remove("hide");
});

arrowUp.addEventListener("click", () => {
  sideNavItem.classList.add("slide-up");
  sideNavItem.classList.remove("slide-down");
  arrowDown.classList.remove("hide");
  arrowUp.classList.add("hide");
});

// 桌機版--點選右上角User icon下拉選單效果
const userIcon = document.querySelector(".left-box");
const dropDownBox = document.querySelector(".dropDown-box");
const heroSection = document.querySelector(".hero-section");

userIcon.addEventListener("click", () => {
  dropDownBox.classList.toggle("open");
});

heroSection.addEventListener("click", (e) => {
  if (!e.target.classList.contains("left-box")) {
    dropDownBox.classList.remove("open");
  }
});
