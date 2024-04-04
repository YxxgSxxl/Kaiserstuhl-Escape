// Affichage menu header au clique
const ks_menu = document.getElementById('ks-menu');
const ks_burger = document.getElementById('ks-burger');

ks_burger.addEventListener('click', () => {
    ks_menu.classList.toggle('ks-visible');
})