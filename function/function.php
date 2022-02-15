<?php 
    // ----------- PHP function to write the backend logic of the AGE CALCULATOR project ------------------

    // Gets the inputted DOB value from user
    $DOB = $_GET['dateOfBirth'];

    // Converts to date format
    $printDOB = date("d-m-Y", strtotime($DOB));

    // Gets today's (current) date
    $CDT = date("d-m-Y");

    // Age
    $age = date_diff(date_create($DOB), date_create($CDT));
    $ageY = $age->format("%y"); // Age in years
    $ageM = $age->format("%m");
    $ageD = $age->format("%d");

    // Age in days
    $ageInDays = ($ageY * 365.2425) + ($ageM * 30.417) + $ageD;

    // Age in months 
    $ageInMonths = $ageInDays/30.417;

    // Age in weeks 
    $ageInWeeks = $ageInDays/7;

    // Age in hours 
    $ageInHours = $ageInDays * 24;

    // Age in minutes 
    $ageInMinutes = $ageInDays * 1440;

    // Age in seconds
    $ageInSeconds = $ageInDays * 86400;

    // Age in milliseconds 
    $ageInMilliseconds = $ageInDays * 8.64e+7;

    // Birthday wish 
    $tokenDOB = explode('-', $DOB);
    $tokenDOB_month = $tokenDOB[1];
    $tokenDOB_date = $tokenDOB[2];
    $tokenCDT = explode('-', $CDT);
    $tokenCDT_month = $tokenCDT[1];
    $tokenCDT_date = $tokenCDT[0];

    // Next Birthday
    $oneYrLater = $ageY + 1;
    $AgeoneYrLater = date("d-m-Y", strtotime(date("d-m-Y", strtotime($DOB)) . " + $oneYrLater year"));
    $nextBirthday = date_diff(date_create($CDT), date_create($AgeoneYrLater));
    $nextAgeM = $nextBirthday->format("%m");
    $nextAgeD = $nextBirthday->format("%d");    
    $nextBirthdayVal = round(abs(($nextAgeM * 30.417) + $nextAgeD));

    // Birthday note
    // Displays a "Happy birthday" text on their birthday!
    if(($tokenDOB_date == $tokenCDT_date) and ($tokenDOB_month == $tokenCDT_month))
        $BWnote = "Happy Birthday!";
    else
        $BWnote = "Your next birthday is within ".$nextBirthdayVal. " days!";
?>
