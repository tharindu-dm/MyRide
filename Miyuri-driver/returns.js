document.addEventListener('DOMContentLoaded', function() {
    // Add button event listener
    document.getElementById('addButton').addEventListener('click', function() {
        document.getElementById('returnForm').style.display = 'block';
    });

    // Form submit event listener
    document.getElementById('returnForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        // Get form values
        var driverID = document.getElementById('driverID').value;
        var returnDate = document.getElementById('returnDate').value;
        var returnTime = document.getElementById('returnTime').value;
        var returnStatus = '';
        
        // Collect checkbox values
        var checkboxes = document.getElementsByName('returnStatus');
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                returnStatus += checkbox.value + ', ';
            }
        });
        
        // Remove trailing comma and whitespace
        returnStatus = returnStatus.trim().slice(0, -1);

        var notices = document.getElementById('notices').value;

        // TODO: Perform AJAX request to store data in the database

        // Create new row in the table
        var table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
        var newRow = table.insertRow();

        // Insert data cells
        var cell1 = newRow.insertCell();
        cell1.textContent = driverID;
        var cell2 = newRow.insertCell();
        cell2.textContent = returnDate;
        var cell3 = newRow.insertCell();
        cell3.textContent = returnTime;
        var cell4 = newRow.insertCell();
        cell4.textContent = returnStatus;
        var cell5 = newRow.insertCell();
        cell5.textContent = notices;
        var cell6 = newRow.insertCell();
        cell6.innerHTML = '<button class="deleteButton">Delete</button>';

        // Clear form inputs
        document.getElementById('driverID').value = '';
        document.getElementById('returnDate').value = '';
        document.getElementById('returnTime').value = '';
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = false;
        });
        document.getElementById('notices').value = '';
    });

    // Delete button event listener (event delegation)
    document.getElementById('dataTable').addEventListener('click', function(event) {
        if (event.target.classList.contains('deleteButton')) {
            var row = event.target.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    });
});
