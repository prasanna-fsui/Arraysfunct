<!DOCTYPE html>
<html>
<head>
    <title>PHP Array Functions Demo</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; margin: 20px; }
        h2 { border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 20px; }
        pre { background-color: #f4f4f4; padding: 10px; border: 1px solid #ddd; overflow-x: auto; }
        .output { color: green; font-weight: bold; }
    </style>
</head>
<body>

    <h1>PHP Array Functions Demonstration</h1>

    <?php

    // --- Initial Array ---
    echo "<h2>Initial Array</h2>";
    $fruits = ["apple", "banana", "cherry", "date"];
    $student_scores = [
        "Alice" => 85,
        "Bob" => 92,
        "Charlie" => 78,
        "David" => 92
    ];

    echo "Fruits Array:<br>";
    echo "<pre>";
    print_r($fruits); // print_r is good for displaying array structure
    echo "</pre>";

    echo "Student Scores Array:<br>";
    echo "<pre>";
    print_r($student_scores);
    echo "</pre>";


    // --- Getting Array Size ---
    echo "<h2>Getting Array Size</h2>";
    $fruit_count = count($fruits);
    $student_count = sizeof($student_scores); // sizeof() is an alias of count()

    echo "Number of fruits: <span class='output'>" . $fruit_count . "</span><br>";
    echo "Number of students: <span class='output'>" . $student_count . "</span><br>";


    // --- Adding Elements ---
    echo "<h2>Adding Elements</h2>";

    // Add to the end using array_push()
    array_push($fruits, "elderberry", "fig");
    echo "After array_push('elderberry', 'fig') to Fruits:<br>";
    echo "<pre>"; print_r($fruits); echo "</pre>";

    // Add to the beginning using array_unshift()
    array_unshift($fruits, "apricot");
     echo "After array_unshift('apricot') to Fruits:<br>";
    echo "<pre>"; print_r($fruits); echo "</pre>";


    // --- Removing Elements ---
    echo "<h2>Removing Elements</h2>";

    // Remove from the end using array_pop()
    $last_fruit = array_pop($fruits);
    echo "Removed from end (array_pop): <span class='output'>" . $last_fruit . "</span><br>";
    echo "Fruits after array_pop:<br>";
    echo "<pre>"; print_r($fruits); echo "</pre>";

    // Remove from the beginning using array_shift()
    $first_fruit = array_shift($fruits);
    echo "Removed from beginning (array_shift): <span class='output'>" . $first_fruit . "</span><br>";
    echo "Fruits after array_shift:<br>";
    echo "<pre>"; print_r($fruits); echo "</pre>";


    // --- Sorting Arrays ---
    echo "<h2>Sorting Arrays</h2>";

    // Simple sort (sort by values, re-indexes numeric keys)
    $numbers = [4, 2, 8, 1, 5];
    sort($numbers);
    echo "Sorted Numbers (sort()):<br>";
    echo "<pre>"; print_r($numbers); echo "</pre>";

    // Sort by values, maintain key association (for associative arrays)
    asort($student_scores);
    echo "Student Scores sorted by score (asort()):<br>";
    echo "<pre>"; print_r($student_scores); echo "</pre>";

    // Sort by keys
    ksort($student_scores);
    echo "Student Scores sorted by name (ksort()):<br>";
    echo "<pre>"; print_r($student_scores); echo "</pre>";


    // --- Searching Arrays ---
    echo "<h2>Searching Arrays</h2>";

    // Check if a value exists using in_array()
    $search_fruit = "banana";
    if (in_array($search_fruit, $fruits)) {
        echo "<span class='output'>" . ucfirst($search_fruit) . "</span> is in the fruits array.<br>";
    } else {
        echo "<span class='output'>" . ucfirst($search_fruit) . "</span> is not in the fruits array.<br>";
    }

     $search_fruit_false = "grape";
    if (in_array($search_fruit_false, $fruits)) {
        echo "<span class='output'>" . ucfirst($search_fruit_false) . "</span> is in the fruits array.<br>";
    } else {
        echo "<span class='output'>" . ucfirst($search_fruit_false) . "</span> is not in the fruits array.<br>";
    }


    // Find the key for a specific value using array_search()
    $search_score = 92;
    $key = array_search($search_score, $student_scores);
     if ($key !== false) { // Use !== false because 0 is a valid key
         echo "The key for score <span class='output'>" . $search_score . "</span> is <span class='output'>" . $key . "</span><br>";
     } else {
         echo "Score <span class='output'>" . $search_score . "</span> not found.<br>";
     }

     $search_score_false = 100;
      $key_false = array_search($search_score_false, $student_scores);
      if ($key_false !== false) {
          echo "The key for score <span class='output'>" . $search_score_false . "</span> is <span class='output'>" . $key_false . "</span><br>";
      } else {
          echo "Score <span class='output'>" . $search_score_false . "</span> not found.<br>";
      }


    // Check if a key exists using array_key_exists()
    $search_name = "Bob";
    if (array_key_exists($search_name, $student_scores)) {
        echo "Key '<span class='output'>" . $search_name . "</span>' exists in student scores.<br>";
    } else {
        echo "Key '<span class='output'>" . $search_name . "</span>' does not exist.<br>";
    }


    // --- Getting Keys and Values ---
    echo "<h2>Getting Keys and Values</h2>";

    $all_keys = array_keys($student_scores);
    echo "All keys from student scores (array_keys()):<br>";
    echo "<pre>"; print_r($all_keys); echo "</pre>";

    $all_values = array_values($student_scores);
    echo "All values from student scores (array_values()):<br>";
    echo "<pre>"; print_r($all_values); echo "</pre>";


    // --- Merging Arrays ---
    echo "<h2>Merging Arrays</h2>";

    $more_fruits = ["grape", "honeydew"];
    $merged_fruits = array_merge($fruits, $more_fruits);
    echo "Merged fruits array (array_merge()):<br>";
    echo "<pre>"; print_r($merged_fruits); echo "</pre>";

    $more_scores = ["Eve" => 88, "Frank" => 78];
    $merged_scores = array_merge($student_scores, $more_scores); // Note: if keys are strings, they are appended. If numeric, they are re-indexed.
    echo "Merged student scores array (array_merge()):<br>";
    echo "<pre>"; print_r($merged_scores); echo "</pre>";

    // --- Iterating through an Array (using foreach) ---
    echo "<h2>Iterating through an Array (using foreach)</h2>";

    echo "Listing fruits:<br>";
    echo "<ul>";
    foreach ($fruits as $fruit) {
        echo "<li>" . ucfirst($fruit) . "</li>";
    }
    echo "</ul>";

    echo "Listing student scores:<br>";
     echo "<ul>";
    foreach ($student_scores as $name => $score) {
        echo "<li>" . $name . ": <span class='output'>" . $score . "</span></li>";
    }
     echo "</ul>";


    ?>

</div>

</body>
</html>