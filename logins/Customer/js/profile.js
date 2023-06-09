function edit() {
  // Disable edit and delete buttons
  document.getElementById('edit-btn').disabled = true;
  document.getElementById('delete-account-btn').disabled = true;

  // Enable save changes button
  document.getElementById('save-changes-btn').disabled = false;

  // Enable editing for input fields except NIC and Driving License
  var editableFields = ['prefix', 'firstName', 'lastName', 'email'];
  editableFields.forEach(function(fieldId) {
    var field = document.getElementById(fieldId);
    if (field !== null && field.getAttribute('readonly') !== null) {
      field.removeAttribute('readonly');
    }
  });
}
