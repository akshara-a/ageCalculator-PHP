<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Age Calculator </title>
    <!-- Custom CSS -->
    <link href="./css/index.css" rel="stylesheet"/>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="./index.php">Age Calculator</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
      <!-- Main content -->
      <h3 class="titleStyle"> Age Calculator </h3>
      <form method="GET" action="result.php">
        <div class="mainContent">
          <label for="dateOfBirth"> Date of Birth </label>
          <input type="date" name="dateOfBirth" required/> <br/>
          <label for="dateToCal"> Date </label>
          <input type="date" name="dateToCal" id="today" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" placeholder="YYYY-MM-DD" required/> <br/>
          <input type="submit" value="Calculate" class="buttonSubmit"/>
          <input type="reset" value="Clear" class="buttonReset"/>
        </div>
      </form>
      <script>
        // Test if the browser supports input[type="date"]
        var isDateSupported = function () {
          var input = document.createElement('input');
          input.setAttribute('type', 'date');
          input.setAttribute('value', 'x');
          return (input.value !== 'x');
        };
        var field = document.querySelector('#today');
        var date = new Date();
        // If [type="date"] is supported, update the DOM
        if (isDateSupported()) {
          // Remove attributes
          field.removeAttribute('pattern');
          field.removeAttribute('placeholder');
          // Remove the helper text
          var helperText = document.querySelector('[for="today"] .description');
          if (helperText) {
            helperText.parentNode.removeChild(helperText);
          }        
        }
        field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) +
            '-' + date.getDate().toString().padStart(2, 0);
    </script>
</body>
</html>    
  