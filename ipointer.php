<?php

echo "<h2>PHP Array Internal Pointer Functions</h2>";

// Sample array
$fruits = ["apple", "banana", "orange", "grape", "mango"];
echo "<h3>Original Array:</h3>";
print_r($fruits);
echo "<br>";

// --- 1. current() ---
// Returns the value of the element at the current internal pointer position.
echo "<h3>1. current()</h3>";
echo "Current element: " . current($fruits) . "<br>"; // Output: apple

// --- 2. key() ---
// Returns the key of the element at the current internal pointer position.
echo "<h3>2. key()</h3>";
echo "Key of the current element: " . key($fruits) . "<br>"; // Output: 0

// --- 3. next() ---
// Advances the internal pointer to the next element and returns its value.
echo "<h3>3. next()</h3>";
echo "Moving to the next element...<br>";
echo "Next element: " . next($fruits) . "<br>"; // Output: banana
echo "Current key: " . key($fruits) . "<br>";   // Output: 1

echo "Moving to the next element again...<br>";
echo "Next element: " . next($fruits) . "<br>"; // Output: orange
echo "Current key: " . key($fruits) . "<br>";   // Output: 2

// --- 4. prev() ---
// Moves the internal pointer back to the previous element and returns its value.
echo "<h3>4. prev()</h3>";
echo "Moving back to the previous element...<br>";
echo "Previous element: " . prev($fruits) . "<br>"; // Output: banana
echo "Current key: " . key($fruits) . "<br>";    // Output: 1

echo "Moving back again...<br>";
echo "Previous element: " . prev($fruits) . "<br>"; // Output: apple
echo "Current key: " . key($fruits) . "<br>";    // Output: 0

// --- 5. reset() ---
// Moves the internal pointer to the first element of the array and returns its value.
echo "<h3>5. reset()</h3>";
echo "Resetting the pointer to the beginning...<br>";
echo "First element: " . reset($fruits) . "<br>"; // Output: apple
echo "Current key: " . key($fruits) . "<br>";    // Output: 0

// --- 6. end() ---
// Moves the internal pointer to the last element of the array and returns its value.
echo "<h3>6. end()</h3>";
echo "Moving the pointer to the end...<br>";
echo "Last element: " . end($fruits) . "<br>";   // Output: mango
echo "Current key: " . key($fruits) . "<br>";    // Output: 4

// --- Iterating through the array using pointer functions ---
echo "<h3>Iterating using pointer functions:</h3>";
reset($fruits); // Reset the pointer to the beginning
while (key($fruits) !== null) {
    echo key($fruits) . " => " . current($fruits) . "<br>";
    next($fruits);
}
echo "<br>";

// --- Important Note ---
echo "<h3>Important Note:</h3>";
echo "<p>Using internal pointer functions can sometimes make your code less readable compared to using foreach loops, especially for simple iteration. foreach automatically handles the pointer movement.</p>";
echo "<p>However, these functions are useful in specific scenarios where you need more fine-grained control over the array's internal pointer, such as:</p>";
echo "<ul>";
echo "<li>Iterating in a non-sequential manner.</li>";
echo "<li>Checking the current element without advancing the pointer.</li>";
echo "<li>Implementing custom array iterators.</li>";
echo "</ul>";

?>