// set up main menu
const main_menu_toggle = document.getElementById('main-menu-toggle');
if (main_menu_toggle !== null) {
	main_menu_toggle.addEventListener('click', function() {
		document.querySelector('.main-menu ul').classList.toggle('collapsed');
	});
}
