<?php
    include './function/function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Result | Age Calculator </title>
    <!-- Custom CSS -->
    <link href="./css/result.css" rel="stylesheet"/>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jsPDF library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
</head>
<body>
    <h1 class="titleStyle"> Result </h1>
    
    <div class="topStyle">
        <!-- Display the age in years, months, and days -->
        <?php echo $ageY; ?> years, <?php echo $ageM; ?> months, <?php echo $ageD; ?> days
    </div>
    
    <div style="text-align: center; font-size:20px; color:#4da3a3">
      <marquee direction="right">
      <i class="fas fa-birthday-cake icon-3x"></i>
      <?php echo $BWnote ?>
      </marquee>
    </div>
    
    <div id="content">
        <table cellspacing="0px">
            <tr>
                <th> Date of Birth</td>
                <th> <?php echo $printDOB; ?> </td>
              </tr>
            <tr>
              <td> Age in Years </td>
              <td> <?php echo $ageY ?> years </td>
            </tr>
            <tr>
              <td> Age in Months </td>
              <td> <?php echo round($ageInMonths) ?> months </td>
            </tr>
            <tr>
              <td> Age in Weeks </td>
              <td> <?php echo round($ageInWeeks) ?> weeks </td>
            </tr>
            <tr>
              <td> Age in Days </td>
              <td> <?php echo round($ageInDays) ?>  days </td>
            </tr>
            <tr>
                <td> Age in Hours </td>
                <td> <?php echo round($ageInHours) ?> hours </td>
              </tr>
            <tr>
              <td> Age in Minutes </td>
              <td> <?php echo round($ageInMinutes) ?> minutes </td>
            </tr>
            <tr>
              <td> Age in Seconds </td>
              <td> <?php echo round($ageInSeconds) ?> seconds </td>
            </tr>
            <tr>
                <td> Age in Milliseconds </td>
                <td> <?php echo round($ageInMilliseconds) ?> Milliseconds </td>
            </tr>
          </table>
    </div>

    <div class="buttonDiv">
        <input type="button" value="Go Back" class="buttonBack" onclick="goBack()" />
        <a class="aStyle" href="./index.php"> <input type="button" class="buttonNew" value="Start a New Search" /> </a> 
        <input type="button" id="download" value="Download report" class="buttonDownload"/>
      </div>

      <!-- Internal JS -->
      <script>
        // Reaching previous page
        function goBack() {
          window.history.back() 
        }
          
        // Downloading report in pdf
        // JSPDF is an open-source library for generating PDF documents using nothing but JavaScript.
        var doc = new jsPDF();
        doc.setFontSize(20);
        doc.setFontStyle('Courier');
        doc.text('Result', 10, 10);
        var specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
        };
        $('#download').click(function () {
            doc.fromHTML($('#content').html(), 15, 15, {
                'width': 170,
                'elementHandlers': specialElementHandlers
            });
            doc.save('ageCalcReport.pdf');
        });
      </script>
</body>
</html>
