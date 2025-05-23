<?php
// Example using break
echo "Looping with break:<br>";
for ($i = 1; $i <= 10; $i++) {
    if ($i > 5) {
        break; // Exit the loop when $i becomes greater than 5
    }
    echo $i . "<br>";
}

echo "<br>";

// Example using continue
echo "Looping with continue:<br>";
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        continue; // Skip the iteration when $i is 3
    }
    echo $i . "<br>";
}
?>



<?php
// Example 1: Looping through an array (value only)
$fruits = ["apple", "banana", "cherry"];
echo "Looping through an array (value only) using foreach loop:<br>";
foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}

echo "<br>";

// Example 2: Looping through an associative array (key and value)
$person = ["name" => "Alice", "age" => 30, "city" => "New York"];
echo "Looping through an associative array (key and value) using foreach loop:<br>";
foreach ($person as $key => $value) {
    echo $key . ": " . $value . "<br>";
}

echo "<br>";

// Example 3: Looping through an array of objects (assuming a simple class)
class Car {
    public $model;
    public $year;

    public function __construct($model, $year) {
        $this->model = $model;
        $this->year = $year;
    }
}

$cars = [
    new Car("Toyota", 2020),
    new Car("Honda", 2022),
    new Car("Ford", 2021)
];

echo "Looping through an array of objects using foreach loop:<br>";
foreach ($cars as $car) {
    echo "Model: " . $car->model . ", Year: " . $car->year . "<br>";
}
?>


<?php
echo "Executing once using do...while loop:<br>";
$counter = 10;
do {
    echo "This will run once even though the condition is initially false.<br>";
    $counter++;
} while ($counter < 5);

echo "<br>";

// DOWHILE
echo "Getting user input (simplified) using do...while loop:<br>";
$userInput = "abc"; // Initial invalid input
do {
    echo "Enter a number: " . $userInput . "<br>"; 
    $userInput = rand(1, 10); 
} while (!is_numeric($userInput));

echo "You entered the number: " . $userInput . "<br>";
?>

<?php
// Example 1: Counting down from 5 to 1
echo "Counting down from 5 to 1 using while loop:<br>";
$count = 5;
while ($count >= 1) {
    echo $count . "<br>";
    $count--;
}

echo "<br>";

// while
echo "Hypothetically reading lines from a file using while loop:<br>";
$lines = ["Line 1", "Line 2", "Line 3"];
$index = 0;
while (isset($lines[$index])) {
    echo "Line: " . $lines[$index] . "<br>";
    $index++;
}
?>

<?php
// for loop
echo "Printing numbers from 1 to 5 using for loop:<br>";
for ($i = 1; $i <= 5; $i++) {
    echo $i . "<br>";
}

echo "<br>";

// Example 2: Printing even numbers from 2 to 10
echo "Printing even numbers from 2 to 10 using for loop:<br>";
for ($i = 2; $i <= 10; $i += 2) {
    echo $i . "<br>";
}

echo "<br>";

// Example 3: Looping through an array
$colors = ["red", "green", "blue"];
echo "Looping through an array using for loop:<br>";
for ($i = 0; $i < count($colors); $i++) {
    echo "Color at index " . $i . ": " . $colors[$i] . "<br>";
}
?>