<?php
session_start(); // Start the session at the very beginning

// Initialize demographic data in session if not already set
if (!isset($_SESSION['demographics'])) {
    $_SESSION['demographics'] = [
        'name' => '',
        'email' => '',
        'age' => '',
        'gender' => '',
        'country' => '',
        'occupation' => ''
    ];
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and store form data in session
    $_SESSION['demographics']['name'] = htmlspecialchars($_POST['name'] ?? '');
    $_SESSION['demographics']['email'] = htmlspecialchars($_POST['email'] ?? '');
    $_SESSION['demographics']['age'] = htmlspecialchars($_POST['age'] ?? '');
    $_SESSION['demographics']['gender'] = htmlspecialchars($_POST['gender'] ?? '');

    // Set a cookie to remember if the user has started the form
    // This cookie will last for 30 days (86400 seconds * 30 days)
    setcookie('form_started', 'true', time() + (86400 * 30), "/");

    // Redirect to the next part of the form (e.g., address_details.php)
    header('Location: demographics_part2.php');
    exit();
}

// Retrieve data from session for pre-filling (if any)
$name = $_SESSION['demographics']['name'];
$email = $_SESSION['demographics']['email'];
$age = $_SESSION['demographics']['age'];
$gender = $_SESSION['demographics']['gender'];

// Check for the 'form_started' cookie
$form_started_cookie = isset($_COOKIE['form_started']) ? $_COOKIE['form_started'] : 'false';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demographic Form - Part 1</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="number"], select {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover { background-color: #0056b3; }
        .message { margin-top: 15px; padding: 10px; background-color: #e2f0cb; border: 1px solid #c8e6c9; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Demographic Form - Part 1</h1>

    <?php if ($form_started_cookie === 'true'): ?>
        <div class="message">Welcome back! You've started the form before.</div>
    <?php endif; ?>

    <form action="index.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?php echo $age; ?>" min="1" max="120" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select...</option>
                <option value="male" <?php if ($gender === 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if ($gender === 'female') echo 'selected'; ?>>Female</option>
                <option value="other" <?php if ($gender === 'other') echo 'selected'; ?>>Other</option>
            </select>
        </div>
        <button type="submit">Next</button>
    </form>
</body>
</html>