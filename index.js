function saveFormData() {
    // Get the form data
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const age = document.getElementById("age").value;
    const gender = document.getElementById("gender").value;
    const state = document.getElementById("state").value;
    const gadget = document.getElementById("gadget").value;
    const choice = document.getElementById("choice").value;
  
    // Create a new Google Sheet
    const spreadsheet = SpreadsheetApp.openById("1mYom3E3_auTqmSyp9D-xQQ9tGxxMa2m2xT11Uy7j-Ms");
  
    // Append the form data to the Google Sheet
    spreadsheet.appendRow([
      name,
      email,
      phone,
      age,
      gender,
      state,
      gadget,
      choice
    ]);
  
    // Notify the user that the form data has been saved
    alert("Your form data has been saved!");
  }
  
  // Add an event listener to the submit button
  document.getElementById("submit").addEventListener("click", saveFormData);
  