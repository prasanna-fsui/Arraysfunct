<!DOCTYPE html>
<html>
<head>
    <title>PHP Spaceship Operator</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2 { border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 20px; }
        pre { background-color: #f4f4f4; padding: 10px; border: 1px solid #ddd; overflow-x: auto; }
        .output { color: purple; font-weight: bold; }
    </style>
</head>
<body>

    <h1>Spaceship Operator (`<=>`) in PHP</h1>

    <?php

    // --- The Spaceship Operator (`<=>`) ---
    // Introduced in PHP 7, the spaceship operator is used for combined comparisons.
    // It returns:
    // - -1 if the left operand is less than the right operand.
    // - 0 if the left operand is equal to the right operand.
    // - 1 if the left operand is greater than the right operand.
    // It works with integers, floats, strings, arrays, and objects.

    echo "<h2>Comparing Numbers</h2>";

    $a = 10;
    $b = 20;
    $c = 10;

    echo "$a <=> $b: <span class='output'>" . ($a <=> $b) . "</span> (10 is less than 20, returns -1)<br>"; // Output: -1
    echo "$a <=> $c: <span class='output'>" . ($a <=> $c) . "</span> (10 is equal to 10, returns 0)<br>"; // Output: 0
    echo "$b <=> $a: <span class='output'>" . ($b <=> $a) . "</span> (20 is greater than 10, returns 1)<br>"; // Output: 1

    $x = 5.5;
    $y = 5.5;
    $z = 3.14;

    echo "$x <=> $y: <span class='output'>" . ($x <=> $y) . "</span> (5.5 is equal to 5.5, returns 0)<br>"; // Output: 0
    echo "$x <=> $z: <span class='output'>" . ($x <=> $z) . "</span> (5.5 is greater than 3.14, returns 1)<br>"; // Output: 1


    echo "<h2>Comparing Strings</h2>";

    $str1 = "apple";
    $str2 = "banana";
    $str3 = "apple";

    // String comparison is case-sensitive and based on alphabetical order.
    echo "'$str1' <=> '$str2': <span class='output'>" . ($str1 <=> $str2) . "</span> ('apple' is less than 'banana', returns -1)<br>"; // Output: -1
    echo "'$str1' <=> '$str3': <span class='output'>" . ($str1 <=> $str3) . "</span> ('apple' is equal to 'apple', returns 0)<br>"; // Output: 0
    echo "'$str2' <=> '$str1': <span class='output'>" . ($str2 <=> $str1) . "</span> ('banana' is greater than 'apple', returns 1)<br>"; // Output: 1

    $str4 = "Apple"; // Note the capital A
     echo "'$str1' <=> '$str4': <span class='output'>" . ($str1 <=> $str4) . "</span> ('apple' is greater than 'Apple', returns 1 due to ASCII)<br>"; // Output: 1


    echo "<h2>Comparing Arrays</h2>";
    // Array comparison rules are complex:
    // - Arrays are compared element by element from left to right.
    // - If keys are numeric, they are compared numerically. If keys are strings, they are compared lexicographically.
    // - The first difference determines the result.
    // - If one array is a prefix of another, the longer array is considered greater.

    $arr1 = [1, 2, 3];
    $arr2 = [1, 2, 4];
    $arr3 = [1, 2, 3];
    $arr4 = [1, 2, 3, 4]; // Longer array

    echo "Comparing [1, 2, 3] <=> [1, 2, 4]: <span class='output'>" . ($arr1 <=> $arr2) . "</span> (3 is less than 4, returns -1)<br>"; // Output: -1
    echo "Comparing [1, 2, 3] <=> [1, 2, 3]: <span class='output'>" . ($arr1 <=> $arr3) . "</span> (Equal, returns 0)<br>"; // Output: 0
    echo "Comparing [1, 2, 4] <=> [1, 2, 3]: <span class='output'>" . ($arr2 <=> $arr1) . "</span> (4 is greater than 3, returns 1)<br>"; // Output: 1
    echo "Comparing [1, 2, 3] <=> [1, 2, 3, 4]: <span class='output'>" . ($arr1 <=> $arr4) . "</span> (Shorter is less than longer, returns -1)<br>"; // Output: -1


    echo "<h2>Comparing Mixed Types (Be Cautious!)</h2>";
    // PHP's loose typing can lead to unexpected results when comparing different types.
    // The spaceship operator follows the same comparison rules as the standard comparison operators (==, <, >).

    echo "10 <=> '10': <span class='output'>" . (10 <=> '10') . "</span> (Numeric string converted to number, returns 0)<br>"; // Output: 0
    echo "'10' <=> 10: <span class='output'>" . ('10' <=> 10) . "</span> (Numeric string converted to number, returns 0)<br>"; // Output: 0
    echo "'abc' <=> 10: <span class='output'>" . ('abc' <=> 10) . "</span> (Non-numeric string compared to number, usually converts string to 0, returns -1)<br>"; // Output: -1 (as 'abc' becomes 0)
    echo "true <=> false: <span class='output'>" . (true <=> false) . "</span> (true is 1, false is 0, returns 1)<br>"; // Output: 1
    echo "null <=> 0: <span class='output'>" . (null <=> 0) . "</span> (null becomes 0 in numeric comparison, returns 0)<br>"; // Output: 0
    echo "null <=> '': <span class='output'>" . (null <=> '') . "</span> (null becomes '' in string comparison, returns 0)<br>"; // Output: 0


    ?>

</body>
</html>
