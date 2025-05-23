<?php

// --- 1. Setting the Timezone ---
// It's crucial to set the correct timezone for accurate date and time.
// Although you mentioned Madurai, Tamil Nadu, India, the specific timezone identifier
// for India is usually 'Asia/Kolkata'. Let's use that for accuracy.
date_default_timezone_set('Asia/Kolkata');
echo "<h2>Date and Time Functions in PHP (Madurai Time)</h2>";
echo "<p>Current Timezone set to: " . date_default_timezone_get() . "</p>";

// --- 2. Getting the Current Timestamp ---
// The time() function returns the current timestamp (number of seconds since the Unix Epoch).
$timestamp = time();
echo "<p>Current Timestamp (seconds since Unix Epoch): " . $timestamp . "</p>";

// --- 3. Formatting the Date and Time ---
// The date() function is used to format a timestamp into a human-readable string.
echo "<h3>Formatting Date and Time:</h3>";
$currentTimeFormatted = date('Y-m-d H:i:s'); // Year-Month-Day Hour:Minute:Second
echo "<p>Current Date and Time (Y-m-d H:i:s): " . $currentTimeFormatted . "</p>";

$todayDateFormatted = date('d/m/Y'); // Day/Month/Year
echo "<p>Today's Date (d/m/Y): " . $todayDateFormatted . "</p>";

$currentTime12Hour = date('h:i A'); // Hour (12-hour format with AM/PM)
echo "<p>Current Time (12-hour format): " . $currentTime12Hour . "</p>";

$dayOfWeek = date('l'); // Full day name (e.g., Monday)
echo "<p>Today is: " . $dayOfWeek . "</p>";

// --- 4. Working with mktime() ---
// The mktime() function can be used to create a Unix timestamp for a specific date and time.
echo "<h3>Creating a Specific Date and Time:</h3>";
$specificTimestamp = mktime(10, 30, 0, 12, 25, 2024); // Hour, Minute, Second, Month, Day, Year
$specificDateTimeFormatted = date('Y-m-d H:i:s', $specificTimestamp);
echo "<p>Date and Time for December 25, 2024, 10:30:00 AM: " . $specificDateTimeFormatted . "</p>";

// --- 5. Using strtotime() ---
// The strtotime() function parses a human-readable date/time string into a Unix timestamp.
echo "<h3>Parsing Date and Time Strings:</h3>";
$futureTimestamp = strtotime('+7 days'); // Timestamp for 7 days from now
$futureDateFormatted = date('Y-m-d', $futureTimestamp);
echo "<p>Date 7 days from now: " . $futureDateFormatted . "</p>";

$pastTimestamp = strtotime('last Monday'); // Timestamp for the last Monday
$pastDateFormatted = date('Y-m-d', $pastTimestamp);
echo "<p>Date of last Monday: " . $pastDateFormatted . "</p>";

// --- 6. Date and Time Calculations ---
echo "<h3>Date and Time Calculations:</h3>";
$now = new DateTime();
$interval = new DateInterval('P3DT2H'); // Period of 3 Days and 2 Hours
$now->add($interval);
echo "<p>Date and Time after adding 3 days and 2 hours: " . $now->format('Y-m-d H:i:s') . "</p>";

$pastDate = new DateTime('2025-05-10');
$currentDate = new DateTime();
$difference = $pastDate->diff($currentDate);
echo "<p>Difference between May 10, 2025, and today: " . $difference->format('%R%a days') . "</p>";

// --- 7. Comparing Dates ---
echo "<h3>Comparing Dates:</h3>";
$date1 = new DateTime('2025-06-01');
$date2 = new DateTime('2025-05-25');

if ($date1 > $date2) {
    echo "<p>June 1, 2025 is after May 25, 2025.</p>";
} elseif ($date1 < $date2) {
    echo "<p>June 1, 2025 is before May 25, 2025.</p>";
} else {
    echo "<p>June 1, 2025 is the same as May 25, 2025.</p>";
}

?>