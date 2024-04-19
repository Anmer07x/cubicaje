const menuWithSubmenu = document.querySelector('.with-submenu');
const submenu = document.querySelector('.submenu');
const arrowIcon = document.querySelector('.arrow-icon');
const profileName = document.querySelector('.profile-name');
const collapseBtn = document.querySelector('.collapse-btn');

menuWithSubmenu.addEventListener('click', (event) => {
    // Evita que el evento de clic se propague a elementos superiores
    event.stopPropagation();

    submenu.classList.toggle('show');
    arrowIcon.classList.toggle('fa-chevron-down');
    arrowIcon.classList.toggle('fa-chevron-up');
});

collapseBtn.addEventListener('click', (event) => {
    // Evita que el evento de clic se propague a elementos superiores
    event.stopPropagation();
});

function toggleMenu() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('collapsed');
    arrowIcon.classList.toggle('fa-chevron-right');
    arrowIcon.classList.toggle('fa-chevron-left');
    toggleCollapseBtnIcon();
}

function toggleCollapseBtnIcon() {
    const isMenuCollapsed = document.querySelector('.sidebar').classList.contains('collapsed');
    collapseBtn.innerHTML = isMenuCollapsed
        ? '<i class="fas fa-chevron-right"></i>'
        : '<i class="fas fa-chevron-left"></i>';
}

const cards = document.querySelectorAll('.card');
const hoverSound = document.getElementById('hover-sound');

cards.forEach(card => {
    card.addEventListener('mouseover', () => {
        hoverSound.play();
    });
});

function toggleLightMode() {
    document.body.style.backgroundColor = '#f0f0f0';
    document.querySelector('.light-mode').classList.add('seleccionado');
    document.querySelector('.dark-mode').classList.remove('seleccionado');
    document.querySelector('.sidebar').style.backgroundColor = '#fff';
    document
        .querySelectorAll('.profile p, .menu-item, .submenu-item, .footer-line, .card-container')
        .forEach((element) => {
            element.style.color = '#333';
        });
    document.querySelectorAll('.search, .submenu').forEach((element) => {
        element.style.backgroundColor = '#f3f3f3';
    });
    document.querySelector('.banner').style.backgroundColor = '#f0f0f0';
    document.querySelector('.banner-content').style.color = '#000';
    document.querySelectorAll('.card-container .card, .card p').forEach((card) => {
        card.style.backgroundColor = '#fff';
        card.style.color = '#333';
    });
    document.querySelector('.help-box').style.backgroundColor = '#f0f0f0';
    document.querySelector('.help-box a').style.color = '#000';
    document.querySelector('.footer-line').style.backgroundColor = '#333';
}

function toggleLogoutMenu() {
    const logoutMenu = document.getElementById('logoutMenu');
    logoutMenu.classList.toggle('hidden');
}

function logout() {
    window.location.href = '../index.php';
}

function toggleDarkMode() {
    document.body.style.backgroundColor = 'black';
    document.querySelector('.dark-mode').classList.add('seleccionado');
    document.querySelector('.light-mode').classList.remove('seleccionado');
    document.querySelector('.sidebar').style.backgroundColor = '#333';
    document
        .querySelectorAll('.profile p, .menu-item, .submenu-item, .footer-line, .card-container')
        .forEach((element) => {
            element.style.color = '#fff';
        });
    document.querySelectorAll('.search, .submenu').forEach((element) => {
        element.style.backgroundColor = '#444';
    });
    document.querySelector('.banner').style.backgroundColor = '#222';
    document.querySelector('.banner-content').style.color = '#fff';
    document.querySelectorAll('.card-container .card, .card p').forEach((card) => {
        card.style.backgroundColor = '#333';
        card.style.color = '#fff';
    });
    document.querySelector('.help-box').style.backgroundColor = '#222';
    document.querySelector('.help-box a').style.color = 'black';
    document.querySelector('.footer-line').style.backgroundColor = '#fff';
}
