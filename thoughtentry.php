<?php

    session_start();

    if (array_key_exists("id", $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
        
        echo "<p>Logged In! <a href='index.php?logout=1'>Log out</a></p>";
        
    } else {
        
        header("Location: index.php");
        
    }


?>

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
 
 <style>
 body{
     background:none;
     color:white;
 }
 
 a{
     border:1px solid grey;
     background-color:red;
     padding:8px;
     color:white;
     margin-left:1300px;
     margin-top:30px;
     position:relative
     top:10px;
 }
 #content{
     height:1000px;
     background:none;
     border:3px solid blue;
 }
 html { 
          background: url(background.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          }
          
          button{
              margin-left:20px;
          }
     
 </style>
 
  </head>
  <body>
      <button type="submit" class="btn btn-success">save</button>
      <button type="submit" class="btn btn-danger">reset</button>
      <button type="submit" class="btn btn-primary">My thoughts</button>
    <div class="form-group">
    <label for="content">Enter your thoughts here!</label>
    <textarea focus class="form-control" id="content" rows="3"></textarea>
  </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  
  </body>
  
  <script>
      
      
  </script>
  
</html>
