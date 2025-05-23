<?php

function isValidEmail($email) {
  // Use the built-in filter_var function for email validation
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isValidMobileNumber($mobile) {
  // Regular expression to match a 10-digit number starting with 6, 7, 8, or 9
  $pattern = '/^[6-9][0-9]{9}$/';
  return preg_match($pattern, $mobile);
}

// Example usage with form submission (assuming you have a form that POSTs data)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];

  if (isValidEmail($email)) {
    echo "<p>Email address is valid!</p>";
  } else {
    echo "<p>Email address is invalid.</p>";
  }

  if (isValidMobileNumber($mobile)) {
    echo "<p>Mobile number is valid!</p>";
  } else {
    echo "<p>Mobile number is invalid. Please enter a 10-digit number starting with 6, 7, 8, or 9.</p>";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Form Validation</title>
</head>
<body>
  <h2>Enter your details:</h2>
  <form method="post">
    <div>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email">
    </div>
    <br>
    <div>
      <label for="mobile">Mobile Number:</label>
      <input type="tel" name="mobile" id="mobile" pattern="[6-9][0-9]{9}" title="Please enter a 10-digit number starting with 6-9">
    </div>
    <br>
    <button type="submit">Submit</button>
  </form>
</body>
</html>