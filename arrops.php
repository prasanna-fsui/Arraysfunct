<!DOCTYPE html>
<html>
<head>
    <title>PHP Array Operators</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2 { border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 20px; }
        pre { background-color: #f4f4f4; padding: 10px; border: 1px solid #ddd; overflow-x: auto; }
        .output { color: darkorange; font-weight: bold; }
        .result { margin-bottom: 10px; }
    </style>
</head>
<body>

    <h1>Array Operators in PHP</h1>

    <?php

    // --- Define Example Arrays ---
    $array1 = ["a" => 1, "b" => 2, "c" => 3];
    $array2 = ["d" => 4, "e" => 5]; // Different keys
    $array3 = ["c" => 3, "b" => 2, "a" => 1]; // Same keys/values, different order
    $array4 = ["a" => 1, "b" => "2", "c" => 3]; // Same keys/values, different type for 'b'
    $array5 = ["a" => 1, "b" => 2]; // Missing key 'c'

    echo "<h2>Example Arrays</h2>";
    echo "Array 1: "; print_r($array1); echo "<br>";
    echo "Array 2: "; print_r($array2); echo "<br>";
    echo "Array 3 (different order): "; print_r($array3); echo "<br>";
    echo "Array 4 (different type for 'b'): "; print_r($array4); echo "<br>";
    echo "Array 5 (missing 'c'): "; print_r($array5); echo "<br>";


    // --- 1. Union Operator (+) ---
    // Appends elements from the right-hand array to the left-hand array.
    // If a key exists in both arrays, the element from the left-hand array is used.

    echo "<h2>Union Operator (+)</h2>";

    $union_result1 = $array1 + $array2; // Combines elements from array2 into array1
    echo "\$array1 + \$array2: ";
    print_r($union_result1);
    echo "<br>";
    // Output will be: Array ( [a] => 1 [b] => 2 [c] => 3 [d] => 4 [e] => 5 )

    $union_result2 = $array2 + $array1; // Combines elements from array1 into array2 (keys from array2 preferred)
    echo "\$array2 + \$array1: ";
    print_r($union_result2);
    echo "<br>";
    // Output will be: Array ( [d] => 4 [e] => 5 [a] => 1 [b] => 2 [c] => 3 )

    $union_result3 = $array1 + $array3; // Keys 'a', 'b', 'c' exist in array1, so array3's values are ignored
    echo "\$array1 + \$array3: ";
    print_r($union_result3);
    echo "<br>";
    // Output will be: Array ( [a] => 1 [b] => 2 [c] => 3 )


    // --- 2. Equality Operator (==) ---
    // Returns true if both arrays have the same key/value pairs.
    // The order of key/value pairs does NOT matter.
    // Type juggling IS performed for values.

    echo "<h2>Equality Operator (==)</h2>";

    echo "<div class='result'>\$array1 == \$array3: <span class='output'>" . (int)($array1 == $array3) . " (true - same key/value pairs, order doesn't matter)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\$array1 == \$array4: <span class='output'>" . (int)($array1 == $array4) . " (true - key 'b' values 2 and '2' are equal after type juggling)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\$array1 == \$array5: <span class='output'>" . (int)($array1 == $array5) . " (false - missing key 'c')</span></div>"; // Output: 0 (false)


    // --- 3. Identity Operator (===) ---
    // Returns true if both arrays have the same key/value pairs IN THE SAME ORDER AND OF THE SAME TYPES.
    // This is a strict comparison.

    echo "<h2>Identity Operator (===)</h2>";

    echo "<div class='result'>\$array1 === \$array3: <span class='output'>" . (int)($array1 === $array3) . " (false - different order)</span></div>"; // Output: 0 (false)
    echo "<div class='result'>\$array1 === \$array4: <span class='output'>" . (int)($array1 === $array4) . " (false - different type for key 'b')</span></div>"; // Output: 0 (false)
    echo "<div class='result'>\$array1 === \$array1: <span class='output'>" . (int)($array1 === $array1) . " (true - identical)</span></div>"; // Output: 1 (true)


    // --- 4. Inequality Operator (!= or <>) ---
    // Returns true if the arrays are NOT equal (opposite of ==).
    // Type juggling IS performed for values.

    echo "<h2>Inequality Operator (!=)</h2>";

    echo "<div class='result'>\$array1 != \$array3: <span class='output'>" . (int)($array1 != $array3) . " (false - they are equal with ==)</span></div>"; // Output: 0 (false)
    echo "<div class='result'>\$array1 != \$array5: <span class='output'>" . (int)($array1 != $array5) . " (true - they are not equal with ==)</span></div>"; // Output: 1 (true)


    // --- 5. Non-identity Operator (!==) ---
    // Returns true if the arrays are NOT identical (opposite of ===).

    echo "<h2>Non-identity Operator (!==)</h2>";

    echo "<div class='result'>\$array1 !== \$array3: <span class='output'>" . (int)($array1 !== $array3) . " (true - they are not identical with ===)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\$array1 !== \$array4: <span class='output'>" . (int)($array1 !== $array4) . " (true - they are not identical with ===)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\$array1 !== \$array1: <span class='output'>" . (int)($array1 !== $array1) . " (false - they are identical with ===)</span></div>"; // Output: 0 (false)


    ?>

</body>
</html>
