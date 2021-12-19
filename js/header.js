/**   OPEN OFFCANVAS   */

document.querySelector('.header__mobile').addEventListener('click', () => {
    document.querySelector('.nav-menu').classList.add('offcanvas_active');
    document.querySelector('.mobile__overlay').classList.add('overlay_active');
    document.body.style.overflowY = "hidden";


})

document.querySelector('.nav-menu__close').addEventListener('click', (e) => {
    console.log(e);
    document.querySelector('.nav-menu').classList.remove('offcanvas_active');
    document.querySelector('.mobile__overlay').classList.remove('overlay_active');
    document.body.style.overflowY = "unset";
})

document.querySelector('.mobile__overlay').addEventListener('click', (e) => {
    if (e.target == document.querySelector('.mobile__overlay')) {
        document.querySelector('.nav-menu').classList.remove('offcanvas_active');
        document.querySelector('.mobile__overlay').classList.remove('overlay_active');
        document.body.style.overflowY = "unset";
    }
})




/**   OPEN OFFCANVAS   */