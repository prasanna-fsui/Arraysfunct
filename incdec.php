<!DOCTYPE html>
<html>
<head>
    <title>PHP Increment/Decrement Operators</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2 { border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 20px; }
        pre { background-color: #f4f4f4; padding: 10px; border: 1px solid #ddd; overflow-x: auto; }
        .output { color: blue; font-weight: bold; }
        .result { margin-bottom: 10px; }
    </style>
</head>
<body>

    <h1>Increment and Decrement Operators in PHP</h1>

    <?php

    echo "<h2>Increment Operators</h2>";

    // --- Pre-increment (++$variable) ---
    // Increments $variable by one, then returns $variable.
    $a = 10;
    echo "<div class='result'>Initial value of \$a: <span class='output'>" . $a . "</span></div>";
    $b = ++$a; // $a becomes 11, then $b is assigned the new value of $a (11)
    echo "<div class='result'>After \$b = ++\$a: \$a is <span class='output'>" . $a . "</span>, \$b is <span class='output'>" . $b . "</span></div>"; // Output: $a is 11, $b is 11

    echo "<br>";

    // --- Post-increment ($variable++) ---
    // Returns $variable, then increments $variable by one.
    $x = 10;
    echo "<div class='result'>Initial value of \$x: <span class='output'>" . $x . "</span></div>";
    $y = $x++; // $y is assigned the current value of $x (10), then $x is incremented to 11
    echo "<div class='result'>After \$y = \$x++: \$x is <span class='output'>" . $x . "</span>, \$y is <span class='output'>" . $y . "</span></div>"; // Output: $x is 11, $y is 10


    echo "<h2>Decrement Operators</h2>";

    // --- Pre-decrement (--$variable) ---
    // Decrements $variable by one, then returns $variable.
    $p = 20;
    echo "<div class='result'>Initial value of \$p: <span class='output'>" . $p . "</span></div>";
    $q = --$p; // $p becomes 19, then $q is assigned the new value of $p (19)
    echo "<div class='result'>After \$q = --\$p: \$p is <span class='output'>" . $p . "</span>, \$q is <span class='output'>" . $q . "</span></div>"; // Output: $p is 19, $q is 19

    echo "<br>";

    // --- Post-decrement ($variable--) ---
    // Returns $variable, then decrements $variable by one.
    $m = 20;
    echo "<div class='result'>Initial value of \$m: <span class='output'>" . $m . "</span></div>";
    $n = $m--; // $n is assigned the current value of $m (20), then $m is decremented to 19
    echo "<div class='result'>After \$n = \$m--: \$m is <span class='output'>" . $m . "</span>, \$n is <span class='output'>" . $n . "</span></div>"; // Output: $m is 19, $n is 20


    // --- Common Usage in Loops ---
    echo "<h2>Common Usage in Loops</h2>";

    echo "Counting up using post-increment:<br>";
    for ($i = 1; $i <= 5; $i++) { // $i++ is post-increment
        echo "Iteration " . $i . "<br>";
    }

    echo "<br>Counting down using post-decrement:<br>";
     for ($j = 5; $j >= 1; $j--) { // $j-- is post-decrement
        echo "Iteration " . $j . "<br>";
    }


    ?>

</body>
</html>
