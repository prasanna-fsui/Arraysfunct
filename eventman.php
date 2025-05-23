<!DOCTYPE html>
<html>
<head>
    <title>Event Cost Calculator</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 500px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], select { width: calc(100% - 22px); padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; float: right; }
        input[type="submit"]:hover { background-color: #45a049; }
        .result { margin-top: 20px; padding: 15px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 4px; clear: both; }
        .error { color: red; margin-top: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Event Cost Calculator</h1>

    <?php
    // Define the gifts function
    function calculateGiftsCost($giftCount) {
        // Ensure input is treated as a number, default to 0 if not valid
        $giftCount = (int) $giftCount;
        return $giftCount * 50;
    }

    $totalCost = 0;
    $errorMessage = '';
    $resultMessage = '';

    // Check if the form was submitted
    if (isset($_POST['submit'])) {
        // Get inputs from the POST request
        // Use trim to remove whitespace and strtolower for case-insensitive comparison
        $eventType = strtolower(trim($_POST['event_type'] ?? '')); // Use ?? for null coalescing (PHP 7+)
        $age = (int) ($_POST['age'] ?? 0); // Cast age to integer
        $guests = (int) ($_POST['guests'] ?? 0); // Cast guests to integer (not used in calculation but captured)
        $giftCount = (int) ($_POST['gift_count'] ?? 0); // Cast giftCount to integer
        $needs = strtolower(trim($_POST['needs'] ?? ''));

        // Calculate gift cost
        $giftCost = calculateGiftsCost($giftCount);

        // Logic based on event type using a switch statement
        switch ($eventType) {
            case 'birthday':
                $baseCost = 0;
                $validNeeds = false;

                if ($age > 0 && $age <= 5) {
                    // Age 0-5 specific needs
                    if ($needs === 'with chocolates') {
                        $baseCost = 20000;
                        $validNeeds = true;
                        $resultMessage .= "Birthday (Age <= 5, With Chocolates Base Cost): Rs. " . $baseCost . "<br>";
                    } elseif ($needs === 'without chocolates') {
                        $baseCost = 15000;
                        $validNeeds = true;
                        $resultMessage .= "Birthday (Age <= 5, Without Chocolates Base Cost): Rs. " . $baseCost . "<br>";
                    } else {
                        $errorMessage = "Please enter needs as 'with chocolates' or 'without chocolates' for this age group.";
                    }
                } elseif ($age > 5 && $age <= 100) {
                     // Age 6-100 specific needs
                    if ($needs === 'with games') {
                        $baseCost = 25000;
                        $validNeeds = true;
                        $resultMessage .= "Birthday (Age > 5, With Games Base Cost): Rs. " . $baseCost . "<br>";
                    } elseif ($needs === 'without games') {
                        // Note: JS code uses birthFunction (20000) here, consistent with JS.
                        $baseCost = 20000;
                        $validNeeds = true;
                        $resultMessage .= "Birthday (Age > 5, Without Games Base Cost): Rs. " . $baseCost . "<br>";
                    } else {
                         $errorMessage = "Please enter needs as 'with games' or 'without games' for this age group.";
                    }
                } else {
                    // Invalid age
                    $errorMessage = "We do not provide birthday events for ages over 100 or zero/negative.";
                }

                // If valid needs were entered and no age error
                if ($validNeeds && empty($errorMessage)) {
                    $totalCost = $baseCost + $giftCost;
                    $resultMessage .= "Return Gifts Cost: Rs. " . $giftCost . "<br>";
                    $resultMessage .= "<strong>Grand Total: Rs. " . $totalCost . "</strong>";
                }
                break;

            case 'marriage':
                $baseCost = 0;
                $validNeeds = false;
                // Combining type and hall option in 'needs' input for simplicity, user must type it correctly
                if ($needs === 'traditional with hall') {
                    $baseCost = 200000;
                    $validNeeds = true;
                    $resultMessage .= "Marriage (Traditional, With Hall Base Cost): Rs. " . $baseCost . "<br>";
                } elseif ($needs === 'traditional without hall') {
                    $baseCost = 150000;
                    $validNeeds = true;
                    $resultMessage .= "Marriage (Traditional, Without Hall Base Cost): Rs. " . $baseCost . "<br>";
                } elseif ($needs === 'modern with hall') {
                    $baseCost = 300000;
                    $validNeeds = true;
                     $resultMessage .= "Marriage (Modern, With Hall Base Cost): Rs. " . $baseCost . "<br>";
                } elseif ($needs === 'modern without hall') {
                    $baseCost = 250000;
                    $validNeeds = true;
                    $resultMessage .= "Marriage (Modern, Without Hall Base Cost): Rs. " . $baseCost . "<br>";
                } else {
                    $errorMessage = "Please enter needs for Marriage as 'traditional with hall', 'traditional without hall', 'modern with hall', or 'modern without hall'.";
                }

                 if($validNeeds) {
                    $totalCost = $baseCost + $giftCost;
                    $resultMessage .= "Return Gifts Cost: Rs. " . $giftCost . "<br>";
                    $resultMessage .= "<strong>Grand Total: Rs. " . $totalCost . "</strong>";
                }
                break;

            case 'seemantham': // Baby Shower
                $baseCost = 0;
                $validNeeds = false;
                 // Combining type and hall option in 'needs' input
                if ($needs === 'traditionally with hall') {
                    $baseCost = 110000;
                    $validNeeds = true;
                    $resultMessage .= "Seemantham (Traditionally, With Hall Base Cost): Rs. " . $baseCost . "<br>";
                } elseif ($needs === 'traditionally without hall') {
                    $baseCost = 95000;
                    $validNeeds = true;
                    $resultMessage .= "Seemantham (Traditionally, Without Hall Base Cost): Rs. " . $baseCost . "<br>";
                } elseif ($needs === 'modernful with hall') {
                    $baseCost = 140000;
                    $validNeeds = true;
                    $resultMessage .= "Seemantham (Modernful, With Hall Base Cost): Rs. " . $baseCost . "<br>";
                } elseif ($needs === 'modernful without hall') {
                     // Corresponds to JS babysimple = 100000
                    $baseCost = 100000;
                    $validNeeds = true;
                    $resultMessage .= "Seemantham (Modernful, Without Hall Base Cost): Rs. " . $baseCost . "<br>";
                } else {
                    $errorMessage = "Please enter needs for Seemantham as 'traditionally with hall', 'traditionally without hall', 'modernful with hall', or 'modernful without hall'.";
                }

                 if($validNeeds) {
                    $totalCost = $baseCost + $giftCost;
                    $resultMessage .= "Return Gifts Cost: Rs. " . $giftCost . "<br>";
                    $resultMessage .= "<strong>Grand Total: Rs. " . $totalCost . "</strong>";
                }
                break;

            case 'housewarming': // Newhouse
                $baseCost = 0;
                $validNeeds = false;
                // Combining type (apartment/house) and need (archanas/chants) in 'needs' input
                if ($needs === 'apartment with archanas') {
                    $baseCost = 75000;
                    $validNeeds = true;
                    $resultMessage .= "Housewarming (Apartment, With Archanas Base Cost): Rs. " . $baseCost . "<br>";
                } elseif ($needs === 'apartment only chants') {
                    $baseCost = 50000;
                    $validNeeds = true;
                     $resultMessage .= "Housewarming (Apartment, Only Chants Base Cost): Rs. " . $baseCost . "<br>";
                } elseif ($needs === 'house with archanas') {
                    $baseCost = 80000;
                    $validNeeds = true;
                    $resultMessage .= "Housewarming (House, With Archanas Base Cost): Rs. " . $baseCost . "<br>";
                } elseif ($needs === 'house only chants') {
                    $baseCost = 60000;
                    $validNeeds = true;
                    $resultMessage .= "Housewarming (House, Only Chants Base Cost): Rs. " . $baseCost . "<br>";
                } else {
                     $errorMessage = "Please enter needs for Housewarming as 'apartment with archanas', 'apartment only chants', 'house with archanas', or 'house only chants'.";
                }

                if($validNeeds) {
                    $totalCost = $baseCost + $giftCost;
                    $resultMessage .= "Return Gifts Cost: Rs. " . $giftCost . "<br>";
                    $resultMessage .= "<strong>Grand Total: Rs. " . $totalCost . "</strong>";
                }
                break;

            default:
                $errorMessage = "Please select a proper event type (Birthday, Marriage, Seemantham, Housewarming).";
                break;
        }
    }
    ?>

    <form action="" method="post">
        <label for="event_type">Select Event:</label>
        <select name="event_type" id="event_type" required>
            <option value="">--Select--</option>
            <option value="birthday" <?php if(isset($_POST['event_type']) && $_POST['event_type'] == 'birthday') echo 'selected'; ?>>Birthday</option>
            <option value="marriage" <?php if(isset($_POST['event_type']) && $_POST['event_type'] == 'marriage') echo 'selected'; ?>>Marriage</option>
            <option value="seemantham" <?php if(isset($_POST['event_type']) && $_POST['event_type'] == 'seemantham') echo 'selected'; ?>>Seemantham</option>
            <option value="housewarming" <?php if(isset($_POST['event_type']) && $_POST['event_type'] == 'housewarming') echo 'selected'; ?>>Housewarming</option>
        </select>

        <label for="age">Age (Enter for Birthday):</label>
        <input type="text" name="age" id="age" value="<?php echo $_POST['age'] ?? ''; ?>">

        <label for="guests">Number of Guests:</label>
        <input type="text" name="guests" id="guests" value="<?php echo $_POST['guests'] ?? ''; ?>" required>

        <label for="gift_count">Return Gift Count:</label>
        <input type="text" name="gift_count" id="gift_count" value="<?php echo $_POST['gift_count'] ?? ''; ?>" required>

        <label for="needs">Specific Needs (Enter exactly as listed below for your chosen event):</label>
        <ul>
            <li>Birthday (Age 0-5): "with chocolates" or "without chocolates"</li>
            <li>Birthday (Age 6-100): "with games" or "without games"</li>
            <li>Marriage: "traditional with hall", "traditional without hall", "modern with hall", or "modern without hall"</li>
            <li>Seemantham: "traditionally with hall", "traditionally without hall", "modernful with hall", or "modernful without hall"</li>
            <li>Housewarming: "apartment with archanas", "apartment only chants", "house with archanas", or "house only chants"</li>
        </ul>
        <input type="text" name="needs" id="needs" value="<?php echo $_POST['needs'] ?? ''; ?>" required>


        <input type="submit" name="submit" value="Calculate Cost">
    </form>

    <?php
    if (!empty($errorMessage)) {
        echo '<div class="error">' . $errorMessage . '</div>';
    } elseif (!empty($resultMessage)) {
        echo '<div class="result">';
        echo '<h2>Calculation Result:</h2>';
        echo $resultMessage;
        echo '</div>';
    }
    ?>

</div>

</body>
</html>