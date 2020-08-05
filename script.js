// set up main menu
const main_menu_toggle = document.getElementById('main-menu-toggle');
if (main_menu_toggle !== null) {
	main_menu_toggle.addEventListener('click', function() {
		document.querySelector('.main-menu ul').classList.toggle('collapsed');
	});
}

// update copyright year
const copyright_current_year = document.getElementById('copyright-current-year');
if (copyright_current_year !== null) {copyright_current_year.innerText = (new Date()).getFullYear();}
