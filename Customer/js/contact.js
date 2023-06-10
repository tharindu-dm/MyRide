document.getElementById("contact-form").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent the form from submitting

  var name = document.getElementById("name").value;
  var contact = document.getElementById("contact").value;
  var problem = document.getElementById("problem").value;
  var description = document.getElementById("description").value;

  // Create a new FormData object and append the form data
  var formData = new FormData();
  formData.append("name", name);
  formData.append("contact", contact);
  formData.append("problem", problem);
  formData.append("description", description);

  // Send the form data to the PHP file using an AJAX request
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../php/contactmy.php", true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Display the response message
      alert(xhr.responseText);
      // Reset the form
      document.getElementById("contact-form").reset();
    }
  };
  xhr.send(formData);
});
