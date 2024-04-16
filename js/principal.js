const menuWithSubmenu = document.querySelector('.with-submenu');
const submenu = document.querySelector('.submenu');
const arrowIcon = document.querySelector('.arrow-icon');
const profileName = document.querySelector('.profile-name');

menuWithSubmenu.addEventListener('click', (event) => {
	// Evita que el evento de clic se propague a elementos superiores
	event.stopPropagation();

	submenu.classList.toggle('show');
	arrowIcon.classList.toggle('fa-chevron-down');
	arrowIcon.classList.toggle('fa-chevron-up');
	profileName.classList.toggle('hidden'); // Oculta el nombre cuando el menú se recoja
});

// Manejar el clic en el botón de colapso del menú
collapseBtn.addEventListener('click', (event) => {
	// Evita que el evento de clic se propague a elementos superiores
	event.stopPropagation();
});

function toggleLightMode() {
	document.body.style.backgroundColor = '#f0f0f0'; // Cambia el color de fondo del cuerpo
	document.querySelector('.light-mode').classList.add('seleccionado');
	document.querySelector('.dark-mode').classList.remove('seleccionado');
	document.querySelector('.sidebar').style.backgroundColor = '#fff'; // Cambia el color de fondo del menú
	document
		.querySelectorAll('.profile p, .menu-item, .submenu-item, .footer-line, .card-container')
		.forEach((element) => {
			element.style.color = '#333'; // Cambia el color del texto de varios elementos
		});
	document.querySelectorAll('.search, .submenu').forEach((element) => {
		element.style.backgroundColor = '#f3f3f3'; // Cambia el color de fondo de varios elementos
	});
	// Agregar los elementos adicionales para cambiar de color en modo claro
	document.querySelector('.banner').style.backgroundColor = '#f0f0f0'; // Cambia el color de fondo del banner
	document.querySelector('.banner-content').style.color = '#000'; // Cambia el color del texto del banner
	document.querySelectorAll('.card-container .card, .card p').forEach((card) => {
		card.style.backgroundColor = '#fff'; // Cambia el color de fondo de las tarjetas
		card.style.color = '#333'; // Cambia el color del texto de las tarjetas
	});
	document.querySelector('.help-box').style.backgroundColor = '#f0f0f0'; // Cambia el color de fondo de la caja de ayuda
	document.querySelector('.help-box a').style.color = '#000'; // Cambia el color del texto del enlace en la caja de ayuda
	document.querySelector('.footer-line').style.backgroundColor = '#333'; // Cambia el color de fondo de la línea del pie de página
}

function toggleDarkMode() {
	document.body.style.backgroundColor = 'black'; // Cambia el color de fondo del cuerpo
	document.querySelector('.dark-mode').classList.add('seleccionado');
	document.querySelector('.light-mode').classList.remove('seleccionado');
	document.querySelector('.sidebar').style.backgroundColor = '#333'; // Cambia el color de fondo del menú
	document
		.querySelectorAll('.profile p, .menu-item, .submenu-item, .footer-line, .card-container')
		.forEach((element) => {
			element.style.color = '#fff'; // Cambia el color del texto de varios elementos
		});
	document.querySelectorAll('.search, .submenu').forEach((element) => {
		element.style.backgroundColor = '#444'; // Cambia el color de fondo de varios elementos
	});
	// Agregar los elementos adicionales para cambiar de color en modo oscuro
	document.querySelector('.banner').style.backgroundColor = '#222'; // Cambia el color de fondo del banner
	document.querySelector('.banner-content').style.color = '#fff'; // Cambia el color del texto del banner
	document.querySelectorAll('.card-container .card, .card p').forEach((card) => {
		card.style.backgroundColor = '#333'; // Cambia el color de fondo de las tarjetas
		card.style.color = '#fff'; // Cambia el color del texto de las tarjetas
	});
	document.querySelector('.help-box').style.backgroundColor = '#222'; // Cambia el color de fondo de la caja de ayuda
	document.querySelector('.help-box a').style.color = 'black'; // Cambia el color del texto del enlace en la caja de ayuda
	document.querySelector('.footer-line').style.backgroundColor = '#fff'; // Cambia el color de fondo de la línea del pie de página
}

// Función para retraer o expandir el menú
function toggleMenu() {
	const sidebar = document.querySelector('.sidebar');
	sidebar.classList.toggle('collapsed');
	arrowIcon.classList.toggle('fa-chevron-right');
	arrowIcon.classList.toggle('fa-chevron-left');
	toggleCollapseBtnIcon();
}

function toggleCollapseBtnIcon() {
	const collapseBtn = document.querySelector('.collapse-btn');
	const isMenuCollapsed = document.querySelector('.sidebar').classList.contains('collapsed');
	collapseBtn.innerHTML = isMenuCollapsed
		? '<i class="fas fa-chevron-right"></i>'
		: '<i class="fas fa-chevron-left"></i>';
}
