function clickHandler(event) {
	// var filter = event.target.getAttribute('data-filter');
	// if (!filter) return;

	// var checkboxes = document
	// 	.querySelectorAll('#cat-filter :not(input[name="cat-checkbox"]:checked)')
	// 	.forEach(function (checkbox) {
	// 		//filter = checkbox.attributes['data-filter'].value;
	// 		// document.querySelectorAll('.image-grid [data-cat="' + filter + '"]');
	// 		console.log(checkbox);
	// 	});

	// var vehiclesByCategory = Array.from(
	// 	document.querySelectorAll('.image-grid :not([data-cat="' + filter + '"])')
	// );
	// console.log(vehiclesByCategory);
	// if (event.target.checked) {
	// 	vehiclesByCategory.forEach(function (vehicle) {
	// 		vehicle.setAttribute('hidden', 'true');
	// 	});
	// } else {
	// 	vehiclesByCategory.forEach(function (vehicle) {
	// 		vehicle.removeAttribute('hidden');
	// 	});
	// }

	//var checkboxes = document.querySelectorAll('input[name="cat-checkbox"]');
	//var values = [];

	// for (var i = 0; i < checkboxes.length; i++) {
	// 	if (checkboxes[i].checked == true) {
	// 		values.push(checkboxes[i].value);
	// 	}
	// }

	var checked = event.target.checked;

	//console.log(dict[event.target.value]);
	if (checked) {
		dict[event.target.value] = { Checked: true };
		checkCount++;
	} else {
		dict[event.target.value] = { Checked: false };
		checkCount--;
	}

	// var vehicles = document.querySelectorAll(
	// 	'.image-grid :not([data-cat="' + event.target.value + '"])'
	// );

	//console.log(dict);

	// vehicles.forEach(function (vehicle) {
	// 	if (isChecked) {
	// 		vehicle.setAttribute('hidden', 'true');
	// 	} else {
	// 		vehicle.removeAttribute('hidden');
	// 	}
	// });

	//console.log(vehicles);
	//console.log(values);
	Object.entries(dict).forEach(([key, value]) => {
		console.log(`${key}: ${value}`);
		var vehiclesByCategory = Array.from(
			document.querySelectorAll('.image-grid [data-cat="' + key + '"]')
		);
		// if ((value.Checked == vehiclesByCategory)) {

		// }
		// checked nan hidden wenna ba
		// console.log(value.Checked);
		//console.log(vehiclesByCategory[0].hidden);
		//console.log(value.Checked && !vehiclesByCategory[0].hidden);
		if (vehiclesByCategory.length != 0) {
			console.log(value.Checked);
			console.log(vehiclesByCategory[0].hasAttribute('hidden'));
			console.log(vehiclesByCategory[0]);
			if (value.Checked) {
				if (vehiclesByCategory[0].hasAttribute('hidden')) {
					vehiclesByCategory.forEach(function (vehicle) {
						// console.log(vehicle);
						console.log('set');
						vehicle.removeAttribute('hidden');
					});
				}
			} else {
				vehiclesByCategory.forEach(function (vehicle) {
					// console.log(vehicle);
					//console.log('set');
					vehicle.setAttribute('hidden', 'true');
				});
				// if (!vehiclesByCategory[0].hasAttribute('hidden')) {
				// 	vehiclesByCategory.forEach(function (vehicle) {
				// 		// console.log(vehicle);
				// 		//console.log('set');
				// 		vehicle.setAttribute('hidden', 'true');
				// 	});
				// } else {
				// 	vehiclesByCategory.forEach(function (vehicle) {
				// 		// console.log(vehicle);
				// 		//console.log('set');
				// 		vehicle.removeAttribute('hidden');
				// 	});
				// }
			}
		}

		//
	});

	if (checkCount == 0) {
		var vehicles = Array.from(document.getElementById('img-grid').children);
		vehicles.forEach(function (vehicle) {
			vehicle.removeAttribute('hidden');
		});
	}
	//var vehicles = Array.from(document.getElementById('img-grid').children);
	//console.log(vehicles);
	// var vehicles = vehicles.filter(
	// 	(element) => !values.includes(element.dataset.cat)
	// );

	// for (var i = 0; i < vehicles.length; i++) {
	// 	vehicles[i].setAttribute('hidden', 'true');
	// }

	// var vehicles = vehicles.filter((element) =>
	// 	values.includes(element.dataset.cat)
	// );
}

var checkboxes = document.querySelectorAll('input[name="cat-checkbox"]');

var dict = {
	car: { Checked: false },
	suv: { Checked: false },
	van: { Checked: false },
	min_bus: { Checked: false },
	bike: { Checked: false },
	tw: { Checked: false },
};

var checkCount = 0;

for (var i = 0; i < checkboxes.length; i++) {
	checkboxes[i].addEventListener('click', clickHandler);
}
