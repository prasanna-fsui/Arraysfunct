<?php
session_start();

// Redirect if session data is not set
if (!isset($_SESSION['demographics']) || empty($_SESSION['demographics']['name'])) {
    header('Location: index.php');
    exit();
}

$demographics = $_SESSION['demographics'];

// Handle reset
if (isset($_GET['action']) && $_GET['action'] === 'reset') {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    // Optionally delete the cookie as well
    setcookie('form_started', '', time() - 3600, "/"); // Set expiration to a past time to delete

    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demographic Form - Confirmation</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .data-item { margin-bottom: 10px; }
        .data-item strong { display: inline-block; width: 100px; }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover { background-color: #218838; }
        .reset-button {
            background-color: #dc3545;
            margin-left: 10px;
        }
        .reset-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h1>Demographic Form - Confirmation</h1>

    <h2>Submitted Data:</h2>
    <div class="data-item"><strong>Name:</strong> <?php echo htmlspecialchars($demographics['name']); ?></div>
    <div class="data-item"><strong>Email:</strong> <?php echo htmlspecialchars($demographics['email']); ?></div>
    <div class="data-item"><strong>Age:</strong> <?php echo htmlspecialchars($demographics['age']); ?></div>
    <div class="data-item"><strong>Gender:</strong> <?php echo htmlspecialchars($demographics['gender']); ?></div>
    <div class="data-item"><strong>Country:</strong> <?php echo htmlspecialchars($demographics['country']); ?></div>
    <div class="data-item"><strong>Occupation:</strong> <?php echo htmlspecialchars($demographics['occupation']); ?></div>

    <p>Thank you for submitting your demographic information!</p>

    <button onclick="window.location.href='index.php';">Go Back to Part 1</button>
    <button class="reset-button" onclick="window.location.href='demographics_confirm.php?action=reset';">Reset Form</button>
</body>
</html>