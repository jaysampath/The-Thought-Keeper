<?php
   
   session_start();
   
   if(array_key_exists("id",$_COOKIE)){
       
       $_SESSION['id'] = $_COOKIE['id'];
       
   }
   
   if(array_key_exists("id",$_SESSION)){
       
       echo "<p>Logged in  <a href = 'thoughtkeeper.php?logout=1'>Log Out </a></p>   ";
       
   }else{
       header("Location: thoughtkeeper.php");
   }
   
   $link = mysqli_connect("sdb-e.hosting.stackcp.net","secretdiary_db-313833c85e","X@9K*5'[`YG,","secretdiary_db-313833c85e");
  
  if(mysqli_connect_error()){
      die("Error while connecting to a database");
  }
  
  $contenttext = $_POST['content'];
  
  if($_POST['save']){
      $query = "UPDATE users SET dairy= '".$content."'  ";
      
      if(mysqli_query($link,$query)){
          echo "<p>Thoughts Saved.</p>";
      }
  }


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Thought Keeper</title>
    
    <style type="text/css">
        
        html { 
   background: url(background.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
 }
 p{
     margin:15px;
     color:white;
 }
 
 a{
     float:right;
     background-color:red;
     color:white;
     width:80px;
     margin:15px;
 }
 body{
     background:none;
 }
 
 #contentlabel{
  
   color:white;
   font-size:150%;
   margin:5px;
   margin-top:10px;
 }
 
 #content{
     
     width:100%;
     height:1000px;
     background:none;
 }
 
 #save{
     float:right;
     position:relative;
     top:-25px;
     background-color:green;
     margin:0;
 }
 
        
        
    </style>
    
  </head>
  <body>
    
    <p> <input id = "save" type="submit" name ="save" value="save"> </p>
    <form method="post">
    <div class="form-group">
    <label for="content" id= "contentlabel">Enter Your Thoughts!</label>
    <textarea name= "content" id="content" class="form-control" id="content" rows="3"></textarea>
   </div>
   </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    
  
  
  </body>
</html>


