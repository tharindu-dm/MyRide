// Function to display the login modal when the user icon is clicked
document.getElementById('user-icon').addEventListener('click', function() {
  document.getElementById('login-modal').style.display = 'block';
});

// Function to close the login modal when the user clicks outside the modal
window.addEventListener('click', function(event) {
  var modal = document.getElementById('login-modal');
  if (event.target == modal) {
    modal.style.display = 'none';
  }
});

// Function to check the login credentials on form submission
document.getElementById('login-form').addEventListener('submit', function(event) {
  event.preventDefault();
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  // Check if the entered username and password match the required credentials
  if (username === 'Justin_Swift' && password === 'driver123') {
    // Successful login
    document.getElementById('login-error').textContent = '';
    document.getElementById('user-dropdown').textContent = username + ' ';
    document.getElementById('login-modal').style.display = 'none';
  } else {
    // Invalid login credentials
    document.getElementById('login-error').textContent = 'Your password or username is not valid';
  }

  // Reset the input fields
  document.getElementById('username').value = '';
  document.getElementById('password').value = '';
});





const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})


const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})

// calender
const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");

// getting new date, current year and month
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

// storing full name of all months in array
const months = ["January", "February", "March", "April", "May", "June", "July",
              "August", "September", "October", "November", "December"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
        // adding active class to li if the current day, month, and year matched
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() 
                     && currYear === new Date().getFullYear() ? "active" : "";
        liTag += `<li class="${isToday}">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
    daysTag.innerHTML = liTag;
}
renderCalendar();

prevNextIcon.forEach(icon => { // getting prev and next icons
    icon.addEventListener("click", () => { // adding click event on both icons
        // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
            // creating a new date of current year & month and pass it as date value
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear(); // updating current year with new date year
            currMonth = date.getMonth(); // updating current month with new date month
        } else {
            date = new Date(); // pass the current date as date value
        }
        renderCalendar(); // calling renderCalendar function
    });
});
// end of calender

  //Report Status chart

const initialData = [60, 20, 15, 5];

const data = {
  labels: ['Viewed', 'Dismissed', 'Solved', 'Pending'],
  datasets: [{
    data: initialData,
    backgroundColor: ['#a11e6c', '#90d1c4', '#4a042d', '#4b4092'],
  }]
};

const options = {
  responsive: true,
  maintainAspectRatio: false,
  
};

const updateButton = document.getElementById('updateButton');
const legendInputs = document.querySelectorAll('.legend-input');

const ctx = document.getElementById('ReportStatus').getContext('2d');
const chart = new Chart(ctx, {
  type: 'pie',
  data: data,
  options: options
});

updateButton.addEventListener('click', () => {
  const newPercentages = Array.from(legendInputs).map(input => parseInt(input.value));

  data.datasets[0].data = newPercentages;
  chart.data.labels = data.labels;
  chart.update();
});

//reservations table
function addReservations() {
  var driverId = document.querySelector('.name-input').value;
  var pickupDate = document.querySelector('.due-date-input').value;
  var pickupTime = document.querySelector('.pickup-time-input').value;

  if (driverId && pickupDate && pickupTime) {
      var reservationsList = document.getElementById('reservations-list');

      // Create a new row element
      var newRow = document.createElement('div');
      newRow.className = 'reservations-row';

      // Create and append the row content
      newRow.innerHTML = `<span>${driverId}</span><span>${pickupDate}</span><span>${pickupTime}</span><button onclick="deleteRow(this)" class="delete-button" style="background-color: red; border-radius: 20px;  padding: 10px 20px;">Delete</button>`;

      reservationsList.appendChild(newRow);

      // Clear input values
      document.querySelector('.name-input').value = '';
      document.querySelector('.due-date-input').value = '';
      document.querySelector('.pickup-time-input').value = '';
  }
}

function deleteRow(button) {
  var row = button.parentNode;
  row.parentNode.removeChild(row);
}


// Data for the chart (replace with your actual data)
var datawork = {
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
  datasets: [
    
    {
      label: 'Returned',
      data: [10, 15, 20, 25, 30, 35],
      borderColor: 'red',
      fill: false
    },
    {
      label: 'Cancelled',
      data: [5, 10, 15, 10, 5, 0],
      borderColor: 'orange',
      fill: false
    },
    {
      label: 'Good Reviewed',
      data: [15, 25, 30, 15, 20, 30],
      borderColor: 'green',
      fill: false
    }
  ]
};

// Configure the chart options
var optionswork = {
  responsive: true,
  scales: {
    y: {
      beginAtZero: true
    }
  }
};

// Create the line chart
var chartwork = new Chart(ctx2, {
  type: 'line',
  data: datawork,
  options: optionswork
});

