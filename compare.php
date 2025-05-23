<!DOCTYPE html>
<html>
<head>
    <title>PHP Comparison Operators</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2 { border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 20px; }
        pre { background-color: #f4f4f4; padding: 10px; border: 1px solid #ddd; overflow-x: auto; }
        .output { color: darkgreen; font-weight: bold; }
        .result { margin-bottom: 10px; }
    </style>
</head>
<body>

    <h1>Comparison Operators in PHP</h1>

    <?php

    // --- Comparison Operators ---
    // Used to compare two values. They return a boolean value (true or false).

    $a = 10;
    $b = 20;
    $c = 10;
    $d = "10"; // A string containing the number 10

    echo "<h2>Equal (==)</h2>";
    // Returns true if $a is equal to $b after type juggling.
    echo "<div class='result'>\$a == \$b (" . $a . " == " . $b . "): <span class='output'>" . (int)($a == $b) . " (false)</span></div>"; // Output: 0 (false)
    echo "<div class='result'>\$a == \$c (" . $a . " == " . $c . "): <span class='output'>" . (int)($a == $c) . " (true)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\$a == \$d (" . $a . " == \"" . $d . "\"): <span class='output'>" . (int)($a == $d) . " (true - type juggling)</span></div>"; // Output: 1 (true) - PHP converts "10" to a number

    echo "<h2>Identical (===)</h2>";
    // Returns true if $a is equal to $b AND they are of the same type.
    echo "<div class='result'>\$a === \$b (" . $a . " === " . $b . "): <span class='output'>" . (int)($a === $b) . " (false)</span></div>"; // Output: 0 (false)
    echo "<div class='result'>\$a === \$c (" . $a . " === " . $c . "): <span class='output'>" . (int)($a === $c) . " (true)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\$a === \$d (" . $a . " === \"" . $d . "\"): <span class='output'>" . (int)($a === $d) . " (false - different types)</span></div>"; // Output: 0 (false) - integer vs string

    echo "<h2>Not equal (!= or &lt;&gt;)</h2>";
    // Returns true if $a is not equal to $b after type juggling.
    echo "<div class='result'>\$a != \$b (" . $a . " != " . $b . "): <span class='output'>" . (int)($a != $b) . " (true)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\$a != \$c (" . $a . " != " . $c . "): <span class='output'>" . (int)($a != $c) . " (false)</span></div>"; // Output: 0 (false)
    echo "<div class='result'>\$a != \$d (" . $a . " != \"" . $d . "\"): <span class='output'>" . (int)($a != $d) . " (false - type juggling)</span></div>"; // Output: 0 (false)

    echo "<h2>Not identical (!==)</h2>";
    // Returns true if $a is not equal to $b OR they are not of the same type.
    echo "<div class='result'>\$a !== \$b (" . $a . " !== " . $b . "): <span class='output'>" . (int)($a !== $b) . " (true)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\$a !== \$c (" . $a . " !== " . $c . "): <span class='output'>" . (int)($a !== $c) . " (false)</span></div>"; // Output: 0 (false)
    echo "<div class='result'>\$a !== \$d (" . $a . " !== \"" . $d . "\"): <span class='output'>" . (int)($a !== $d) . " (true - different types)</span></div>"; // Output: 1 (true)

    echo "<h2>Greater than (&gt;)</h2>";
    // Returns true if $a is strictly greater than $b.
    echo "<div class='result'>\$a > \$b (" . $a . " > " . $b . "): <span class='output'>" . (int)($a > $b) . " (false)</span></div>"; // Output: 0 (false)
    echo "<div class='result'>\$b > \$a (" . $b . " > " . $a . "): <span class='output'>" . (int)($b > $a) . " (true)</span></div>"; // Output: 1 (true)

    echo "<h2>Less than (&lt;)</h2>";
    // Returns true if $a is strictly less than $b.
    echo "<div class='result'>\$a < \$b (" . $a . " < " . $b . "): <span class='output'>" . (int)($a < $b) . " (true)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\$b < \$a (" . $b . " < " . $a . "): <span class='output'>" . (int)($b < $a) . " (false)</span></div>"; // Output: 0 (false)

    echo "<h2>Greater than or equal to (&gt;=)</h2>";
    // Returns true if $a is greater than or equal to $b.
    echo "<div class='result'>\$a >= \$b (" . $a . " >= " . $b . "): <span class='output'>" . (int)($a >= $b) . " (false)</span></div>"; // Output: 0 (false)
    echo "<div class='result'>\$a >= \$c (" . $a . " >= " . $c . "): <span class='output'>" . (int)($a >= $c) . " (true)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\$b >= \$a (" . $b . " >= " . $a . "): <span class='output'>" . (int)($b >= $a) . " (true)</span></div>"; // Output: 1 (true)

    echo "<h2>Less than or equal to (&lt;=)</h2>";
    // Returns true if $a is less than or equal to $b.
    echo "<div class='result'>\$a <= \$b (" . $a . " <= " . $b . "): <span class='output'>" . (int)($a <= $b) . " (true)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\$a <= \$c (" . $a . " <= " . $c . "): <span class='output'>" . (int)($a <= $c) . " (true)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\$b <= \$a (" . $b . " <= " . $a . "): <span class='output'>" . (int)($b <= $a) . " (false)</span></div>"; // Output: 0 (false)


    // --- Comparison with different types and values ---
    echo "<h2>Comparing Different Types and Values</h2>";

    echo "<div class='result'>0 == false: <span class='output'>" . (int)(0 == false) . " (true - type juggling)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>0 === false: <span class='output'>" . (int)(0 === false) . " (false - different types)</span></div>"; // Output: 0 (false)

    echo "<div class='result'>1 == true: <span class='output'>" . (int)(1 == true) . " (true - type juggling)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>1 === true: <span class='output'>" . (int)(1 === true) . " (false - different types)</span></div>"; // Output: 0 (false)

    echo "<div class='result'>0 == null: <span class='output'>" . (int)(0 == null) . " (true - type juggling)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>0 === null: <span class='output'>" . (int)(0 === null) . " (false - different types)</span></div>"; // Output: 0 (false)

    echo "<div class='result'>\"\" == null: <span class='output'>" . (int)("" == null) . " (true - type juggling)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\"\" === null: <span class='output'>" . (int)("" === null) . " (false - different types)</span></div>"; // Output: 0 (false)

    echo "<div class='result'>\"abc\" == 0: <span class='output'>" . (int)("abc" == 0) . " (true - type juggling, 'abc' becomes 0)</span></div>"; // Output: 1 (true)
    echo "<div class='result'>\"abc\" === 0: <span class='output'>" . (int)("abc" === 0) . " (false - different types)</span></div>"; // Output: 0 (false)

    ?>

</body>
</html>
