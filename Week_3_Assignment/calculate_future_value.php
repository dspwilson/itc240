<?php
/* future value calculator */

// get the data from the form
$investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT); // will validate investment as float
$interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);
$years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);

// validate the variables

if ($investment === FALSE) {
    $error_message = 'Investment must be a valid number';
} else if ($investment <= 0) {
    $error_message = 'Investment must be greater than zero';
} else if ($interest_rate === FALSE) {
    $error_message = 'Interest rate must be a valid number';
} else if ($interest_rate <= 0) {
    $error_message = 'Interest rate must be greater than zero'; 
} else if ($years === FALSE) {
    $error_message = 'Years must be a valid number';
} else if ($years <= 0) {
    $error_message = 'Years must be greater than zero'; 
} else {
    $error_message = '';
}


if ($error_message != '') {
    include('index.php');
    exit();
} else { 
    
    $future_value=$investment;
    for ($year=1; $year<=$years;  $year++) {
        $future_value += ($future_value * ($interest_rate * 0.01));
    } // end for $year
} // end if $error_message
        
// format results
$investment_f = '$' . number_format($investment, 2);
$interest_rate_f = number_format($interest_rate, 2) . '%';
$future_value_f = '$' . number_format($future_value, 2);
$years_f = $years;

// clear form inputs after calculation
$investment = '';
$interest_rate = '';
$years = '';

// report results on index.php
include('index.php');
exit();

?>

