<?php
ini_set('max_execution_time', 3000);
ini_set('memory_limit', '-1');

include_once 'Prime.php';
$prime = new Prime();

$from = 2;
$max_number = 1000;
$prime_numbers = [];
$sequence = [];
$last_prime_number = [];

$i = $from;
while ($i < $max_number) {
    if ($prime->IsPrime($i)) {
        $prime_numbers[] = $i;
    }
    $i++;
}
$total_prime_no = count($prime_numbers);
$pre_prime = false;
for ($i = 0; $i < $total_prime_no; $i++) {
    $sum = 0;
    $sequence[$i] = [];
    $last_prime_number[$i] = '';
    for ($j = $i; $j < $total_prime_no; $j++) {
        $sum += $prime_numbers[$j];
        if (in_array($sum, $prime_numbers) && $sum < $max_number) {
            $last_prime_number[$i] = $prime_numbers[$j];
        }
        $sequence[$i][] = $prime_numbers[$j];
    }
}

$new_sequence = [];
$output = [];
foreach ($sequence as $index => $number) {
    foreach ($number as $k) {
        if ($k <= $last_prime_number[$index]) {
            $new_sequence[$index][] = $k;
        }
    }
    if (count($output) < count($new_sequence[$index])) {
        $output = $new_sequence[$index];
    }
}
echo "Limit: " . $max_number . " | Prime Sum: " . array_sum($output) . " | #Terms: " . count($output) . " | Terms: " . implode(", ", $output);