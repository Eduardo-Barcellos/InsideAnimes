const botaoMenu = document.querySelector('.menu');
const menu = document.querySelector('.menu2');

    botaoMenu.addEventListener('click', () => {

    menu.classList.toggle('menu-lateral-ativo');
});