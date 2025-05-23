<!DOCTYPE html>
<html>
<head>
    <title>PHP Array Creation</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2 { border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 20px; }
        pre { background-color: #f4f4f4; padding: 10px; border: 1px solid #ddd; overflow-x: auto; }
    </style>
</head>
<body>

    <h1>Creating Arrays in PHP</h1>

    <?php

    // --- Method 1: Using the array() construct ---
    // This is the traditional way to create arrays in PHP.

    echo "<h2>Creating Arrays using array()</h2>";

    // Creating an indexed array (keys are automatically numbers starting from 0)
    $colors = array("Red", "Green", "Blue", "Yellow");

    echo "Indexed Array (\$colors):<br>";
    echo "<pre>";
    print_r($colors); // print_r is useful for displaying array contents and structure
    echo "</pre>";

    // Creating an associative array (you define the keys)
    $person = array(
        "name" => "Alice",
        "age" => 30,
        "city" => "New York"
    );

    echo "Associative Array (\$person):<br>";
    echo "<pre>";
    print_r($person);
    echo "</pre>";


    // --- Method 2: Using the short array syntax (PHP 5.4+) ---
    // This is the modern and preferred way to create arrays.

    echo "<h2>Creating Arrays using [] (Short Syntax)</h2>";

    // Creating an indexed array
    $numbers = [10, 20, 30, 40, 50];

    echo "Indexed Array (\$numbers):<br>";
    echo "<pre>";
    print_r($numbers);
    echo "</pre>";

    // Creating an associative array
    $product = [
        "id" => 101,
        "name" => "Laptop",
        "price" => 1200.50,
        "in_stock" => true
    ];

    echo "Associative Array (\$product):<br>";
    echo "<pre>";
    print_r($product);
    echo "</pre>";


    // --- Method 3: Adding elements one by one ---
    // You can create an empty array and add elements later.

    echo "<h2>Creating and Populating an Array Element by Element</h2>";

    // Create an empty array
    $fruits = [];

    // Add elements (indexed array)
    $fruits[] = "Apple"; // Adds "Apple" at index 0
    $fruits[] = "Banana"; // Adds "Banana" at index 1
    $fruits[] = "Cherry"; // Adds "Cherry" at index 2

    echo "Indexed Array (\$fruits) populated element by element:<br>";
    echo "<pre>";
    print_r($fruits);
    echo "</pre>";

    // Create an empty array
    $user_settings = array(); // Can also use array()

    // Add elements (associative array)
    $user_settings["theme"] = "dark";
    $user_settings["notifications"] = true;
    $user_settings["language"] = "en";

    echo "Associative Array (\$user_settings) populated element by element:<br>";
    echo "<pre>";
    print_r($user_settings);
    echo "</pre>";

    ?>

</body>
</html>
