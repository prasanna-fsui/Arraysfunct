<?php
session_start();

// Redirect if session data is not set (e.g., accessed directly)
if (!isset($_SESSION['demographics']) || empty($_SESSION['demographics']['name'])) {
    header('Location: index.php');
    exit();
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and store form data in session
    $_SESSION['demographics']['country'] = htmlspecialchars($_POST['country'] ?? '');
    $_SESSION['demographics']['occupation'] = htmlspecialchars($_POST['occupation'] ?? '');

    // Redirect to the final confirmation page
    header('Location: demographics_confirm.php');
    exit();
}

// Retrieve data from session for pre-filling (if any)
$country = $_SESSION['demographics']['country'];
$occupation = $_SESSION['demographics']['occupation'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demographic Form - Part 2</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], select {
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
            margin-right: 10px;
        }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h1>Demographic Form - Part 2</h1>
    <form action="demographics_part2.php" method="post">
        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" value="<?php echo $country; ?>" required>
        </div>
        <div class="form-group">
            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="occupation" value="<?php echo $occupation; ?>" required>
        </div>
        <button type="submit">Submit</button>
        <button type="button" onclick="window.location.href='index.php';">Back</button>
    </form>
</body>
</html>