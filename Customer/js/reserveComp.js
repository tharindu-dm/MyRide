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

function nicCheck() {
  var field = document.getElementById("nic");
  var input = document.getElementById("nic").value.trim();
  var currentYear = new Date().getFullYear();

  if (input.length === 10) {
    var lastChar = input.charAt(9);

    if (lastChar === "v") {
      input = input.slice(0, 9) + "V";
      document.getElementById("nic").value = input;
    }

    var yearOfBirth = "19" + input.slice(0, 2);
    var age = currentYear - yearOfBirth;

    if (age >= 18 && age < 120) {
      // Valid NIC with 10 characters and valid age
      console.log("Valid NIC with 10 characters and valid age");
    } else {
      // Invalid NIC
      alert("Invalid NIC");
      field.value = "";
    }
  } else if (input.length === 12) {
    var yearOfBirth = input.slice(0, 4);
    var age = currentYear - yearOfBirth;

    if (age >= 18 && age < 120) {
      // Valid NIC with 12 characters and valid age
      console.log("Valid NIC with 12 characters and valid age");
    } else {
      // Invalid NIC or age
      alert("Invalid NIC");
      field.value = "";
    }
  } else {
    alert("Invalid NIC length");
    field.value = "";
  }
}

function emailCheck() {
  var field = document.getElementById("email");
  var pattern = /[a-z0-9._+\-%]+@[a-z0-9\.-]+\.[a-z]{2,3}$/;

  if (pattern.test(field.value)) {
    console.log("Email is valid.");
  } else {
    console.log("Email is not valid.");
    alert("invalid email");
    var field = document.getElementById("email");
    field.value = "";
  }
}
