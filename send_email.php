<?php

// Get the form data
\$name = $_POST['name'];
\$email = $_POST['email'];
\$phone = $_POST['phone'];
\$age = $_POST['age'];
\$gender = $_POST['gender'];
\$state = $_POST['state'];
\$gadget = $_POST['gadget'];
\$choice = $_POST['choice'];

// Send an email to the user
$message = "Hi $name,\n\nThank you for submitting your form. Your email address is $email.\n\nWe will be in touch soon.";
mail($email, "My Form Submission", $message);
// Redirect the user to the thank you page
header("Location: thank-you.html");

$spreadsheetId = '1mYom3E3_auTqmSyp9D-xQQ9tGxxMa2m2xT11Uy7j-Ms';
$sheetName = 'newSignUp';

$values = array(
  'name' => $name,
  'email' => $email,
  'phone' => $phone,
  'age' => $age,
  'gender' => $gender,
  'state' => $state,
  'gadget' => $gadget,
  'choice' => $choice
);

$client = new Google_Client();
$client->setApplicationName('My Form');
$client->setCredentials(file_get_contents('credentials.json'));

$service = new Google_Service_Sheets($client);
$result = $service->spreadsheets->values->append($spreadsheetId, $sheetName, $values, array(
  'valueInputOption' => 'RAW'
));

?>