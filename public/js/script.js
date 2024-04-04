// Affichage menu header au clique
// const ks_menu = document.getElementById('ks-menu');
// const ks_burger = document.getElementById('ks-burger');

// ks_burger.addEventListener('click', () => {
//     ks_menu.classList.toggle('ks-visible');
// })

////////////////////////// HEADER COMPONENT //////////////////////////
// burger Menu //
let burgerIcon = document.querySelector(".header-burgericon"); // burgerIcon to open headerMenu
let exitMenu = document.querySelector(".header-menuexit") // Cross to close headerMenu
let headerMenu = document.querySelector(".header-menu"); // headerMenu with all the hyperlinks
let menuTag = document.querySelectorAll("ul li a"); // All headerMenu hyperlinks

// // Burger Menu Opening
burgerIcon.addEventListener("click", () => {
    headerMenu.style.transform = "translateX(0%)";
})

// Closing Header Menu
exitMenu.addEventListener("click", () => {
    headerMenu.style.transform = "translateX(-100%)";
})

// Closing Header Menu When Clicking On A Hyperlink
for (let i = 0; i < menuTag.length; i++) {
    menuTag[i].addEventListener("click", function () {
        headerMenu.style.transform = "translateX(0%)";
        burgerIcon.style.display = "none";
    });
}