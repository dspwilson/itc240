

<!--
/ index.php
/
/ ITC240
/ Seattle Central College
/ Assignment 
/ Derek S Wilson
/ April 2018
/
-->

<?php

/* set define vars as empty
/  for initial page load
*/

// form vars
if (!isset($investment)) { $investment = '';} 
if (!isset($interest_rate)) { $interest_rate = '';}
if (!isset($years)) { $years = '';} 

// report result vars
if (!isset($investment_f)) { $investment_f = '';} 
if (!isset($interest_rate_f)) { $interest_rate_f = '';} 
if (!isset($future_value_f)) { $future_value_f = '';} 
if (!isset($years_f)) { $years_f = '';} 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
        <main>
        <h1>Future Value Calculator</h1>
            
        <!-- error message processing
            mix of html and php         
        -->
        <?php 
        // if there is an error msg style it and print
            if(!empty($error_message)) {
        ?>
            <p class="error">
        <?php 
            echo htmlspecialchars($error_message);
        ?>
            </p>
        <?php 
            }  // part of php
        ?>
            
        <form action="calculate_future_value.php" method="post">

            <div id="data">
                <label>Investment Amount:</label>
                <input type="text" name="investment" value="<?php echo htmlspecialchars($investment); ?>"><br>
                
                <label>Yearly Interest Rate:</label>
                <input type="text" name="interest_rate" value="<?php echo htmlspecialchars($interest_rate); ?>"><br>
                
                <label>Years:</label>
                <input type="text" name="years" value="<?php echo htmlspecialchars($years); ?>"><br> 
            </div>

            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Calculate Future Value"><br>
            </div>

        </form>
          
        <!-- Future Value Calculator Results -->
        <label>Investment Amount:</label>
        <span><?=$investment_f; ?></span><br />
        <label>Yearly Interest Rate:</label>
        <span><?=$interest_rate_f; ?></span><br />
        <label>Number of Years:</label>
        <span><?=$years_f; ?></span><br />
        <label>Future Value:</label>
        <span><?=$future_value_f; ?></span><br />
            
        <p>This calculation was done on <?=date("m/d/y"); ?></p>
    </main>
</body>
</html>
