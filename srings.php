<!DOCTYPE html>
<html>
<head>
    <title>PHP String Operators</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2 { border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 20px; }
        pre { background-color: #f4f4f4; padding: 10px; border: 1px solid #ddd; overflow-x: auto; }
        .output { color: blue; font-weight: bold; }
    </style>
</head>
<body>

    <h1>String Operators in PHP</h1>

    <?php

    // --- 1. Concatenation Operator (.) ---
    // Used to join two or more strings together.

    echo "<h2>Concatenation Operator (.)</h2>";

    $string1 = "Hello";
    $string2 = "World";

    // Concatenating two strings
    $greeting = $string1 . " " . $string2 . "!";
    echo "Concatenated string: <span class='output'>" . $greeting . "</span><br>"; // Output: Hello World!

    // Concatenating multiple strings and variables
    $name = "Alice";
    $message = "Welcome, " . $name . " to the demonstration.";
    echo "Another example: <span class='output'>" . $message . "</span><br>"; // Output: Welcome, Alice to the demonstration.

    // Concatenating a string and a number (PHP often handles this automatically)
    $item = "Apples";
    $count = 5;
    $list_item = "We have " . $count . " " . $item . ".";
    echo "String and number concatenation: <span class='output'>" . $list_item . "</span><br>"; // Output: We have 5 Apples.


    // --- 2. Concatenation Assignment Operator (.=) ---
    // Appends the right operand to the left operand.
    // It's a shorthand for $variable = $variable . $another_string;

    echo "<h2>Concatenation Assignment Operator (.=)</h2>";

    $text = "This is the first part.";
    echo "Initial value of \$text: <span class='output'>" . $text . "</span><br>";

    // Append another string using .=
    $text .= " And this is the second part.";
    echo "After using .= : <span class='output'>" . $text . "</span><br>"; // Output: This is the first part. And this is the second part.

    // Append another string and a variable
    $more_info = " More details.";
    $text .= $more_info;
    echo "After appending a variable using .= : <span class='output'>" . $text . "</span><br>"; // Output: This is the first part. And this is the second part. More details.

    // Using .= in a loop (common use case)
    $list_items = ["Item A", "Item B", "Item C"];
    $html_list = "<ul>";
    foreach ($list_items as $item) {
        $html_list .= "<li>" . $item . "</li>"; // Append each list item HTML
    }
    $html_list .= "</ul>"; // Append the closing tag

    echo "Building an HTML list using .= :<br>";
    echo $html_list; // Output the generated HTML list


    ?>

</body>
</html>
