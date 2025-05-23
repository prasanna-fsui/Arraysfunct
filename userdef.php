<!DOCTYPE html>
<html>
<head>
    <title>PHP User-Defined Function</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2 { border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 20px; }
        pre { background-color: #f4f4f4; padding: 10px; border: 1px solid #ddd; overflow-x: auto; }
        .output { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
    </style>
</head>
<body>

    <h1>User-Defined Functions in PHP</h1>

    <?php

    // --- Define a User-Defined Function ---
    // A function is defined using the 'function' keyword, followed by the function name,
    // a list of parameters in parentheses, and the function body in curly braces.

    /**
     * This function greets a person.
     *
     * @param string $name The name of the person to greet.
     * @return string The greeting message.
     */
    function greet($name) {
        // The function performs an action and returns a value.
        return "Hello, " . $name . "!";
    }

    /**
     * This function calculates the square of a number.
     *
     * @param float|int $number The number to square.
     * @return float|int The square of the number.
     */
    function calculateSquare($number) {
        // Basic input validation
        if (!is_numeric($number)) {
            return "<span class='error'>Error: Input must be a number.</span>";
        }
        return $number * $number;
    }

    /**
     * This function checks if a number is even or odd.
     * It doesn't return a value, but directly outputs. (Generally less preferred
     * than returning, but shown as an example).
     *
     * @param int $number The number to check.
     */
    function checkEvenOrOdd($number) {
        if (!is_int($number)) {
             echo "<span class='error'>Error: Input must be an integer.</span><br>";
             return; // Exit the function
        }
        if ($number % 2 == 0) {
            echo "<span class='output'>" . $number . "</span> is an even number.<br>";
        } else {
            echo "<span class='output'>" . $number . "</span> is an odd number.<br>";
        }
    }

    /**
     * Function with a default parameter value.
     *
     * @param string $message The message to display.
     * @param string $ending The ending punctuation (defaults to "!").
     * @return string The complete message.
     */
    function displayMessage($message, $ending = "!") {
        return $message . $ending;
    }

    /**
     * Function demonstrating passing by reference.
     * The '&' before the parameter means changes to $value inside the function
     * will affect the original variable outside.
     *
     * @param int $value The number to increment (passed by reference).
     */
    function incrementByTen(&$value) {
        $value += 10;
    }


    // --- Call the User-Defined Functions ---
    echo "<h2>Calling Functions</h2>";

    // Calling the greet function
    $greeting_message = greet("World");
    echo $greeting_message . "<br>"; // Output: Hello, World!

    echo greet("Alice") . "<br>"; // Output: Hello, Alice!

    // Calling the calculateSquare function
    $square_of_5 = calculateSquare(5);
    echo "The square of 5 is: <span class='output'>" . $square_of_5 . "</span><br>"; // Output: The square of 5 is: 25

    $square_of_10_5 = calculateSquare(10.5);
    echo "The square of 10.5 is: <span class='output'>" . $square_of_10_5 . "</span><br>"; // Output: The square of 10.5 is: 110.25

    $invalid_square = calculateSquare("abc");
    echo "Calculating square of 'abc': " . $invalid_square . "<br>"; // Output: Error message


    // Calling the checkEvenOrOdd function
    echo "Checking numbers:<br>";
    checkEvenOrOdd(4); // Output: 4 is an even number.
    checkEvenOrOdd(7); // Output: 7 is an odd number.
    checkEvenOrOdd(100); // Output: 100 is an even number.
    checkEvenOrOdd(3.14); // Output: Error message

    // Calling the displayMessage function
    echo displayMessage("This is a regular message") . "<br>"; // Output: This is a regular message!
    echo displayMessage("This message ends with a period", ".") . "<br>"; // Output: This message ends with a period.

    // Calling the incrementByTen function (demonstrating pass by reference)
    $original_number = 20;
    echo "Original number: <span class='output'>" . $original_number . "</span><br>"; // Output: Original number: 20

    incrementByTen($original_number);
    echo "Number after incrementing by 10: <span class='output'>" . $original_number . "</span><br>"; // Output: Number after incrementing by 10: 30

    ?>

</body>
</html>
