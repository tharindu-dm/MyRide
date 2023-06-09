var clickHandler = function (event) {
	var filter = event.target.getAttribute('data-filter');
	if (!filter) return;

	var vehiclesByCategory = Array.from(
		document.querySelectorAll('.image-grid [data-cat="' + filter + '"]')
	);

	if (event.target.checked) {
		vehiclesByCategory.forEach(function (vehicle) {
			vehicle.removeAttribute('hidden');
		});
	} else {
		vehiclesByCategory.forEach(function (vehicle) {
			vehicle.setAttribute('hidden', 'true');
		});
	}
};

document.documentElement.addEventListener('click', clickHandler, false);
