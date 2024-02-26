<?php

$drawNumber = [
    [1, 5, 2, 4, 4],  // No repeats
    [9, 7, 1, 8, 3],  // No repeats
    [4, 5, 7, 8, 1],  // One pair
    [5, 8, 6, 6, 5],  // One pair
    [7, 4, 4, 5, 2],  // Two pairs
    [2, 3, 6, 7, 8],  // No repeats
    [4, 6, 1, 3, 9],  // No repeats
    [2, 4, 6, 8, 9],  // No repeats
    [1, 1, 2, 3, 4],  // One pair
    [5, 5, 6, 7, 8],  // One pair
];



function findPattern(array $pattern, array $drawNumbers): bool {
    $drawNumbers = array_count_values(array_slice($drawNumbers, 0, 5));
    sort($drawNumbers);
    sort($pattern);
    return $drawNumbers === $pattern;
}



//$drawNumber = array_reverse($drawNumber);
$counts = ['g120' => 1, 'g60' => 1, 'g30' => 1];
foreach ($drawNumber as $draw) {
    $row = [];
    if (findPattern([1, 1, 1, 1, 1], $draw)) { // Check for no repeats
        $row[] = 'g120';
        $counts['g120'] = 1; // Reset count for g120
    } else {
        $row[] = $counts['g120']++;
    }
    if (findPattern([2, 1, 1, 1], $draw)) { // Check for one pair
        $row[] = 'g60';
        $counts['g60']= 1; // Reset count for g60
    } else {
        $row[] = $counts['g60']++;
    }
    if (findPattern([2, 2, 1], $draw)) { // Check for two pairs
        $row[] = 'g30';
        $counts['g30'] = 1; // Reset count for g30
    } else {
        $row[] = $counts['g30']++;
    }

    $table[] = $row;
}

// print_r($drawNumber);
// exit;

// Display the table
//echo "g120\tg60\tg30\n";
foreach ($table as $row) {
    echo implode("\t", $row) . "\n";
}
echo "\n\n";
echo json_encode($table);
