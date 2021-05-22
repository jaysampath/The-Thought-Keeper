<?php
  
  session_start();
  
  if(array_key_exists("logout",$_GET)){
      unset($_SESSION);
      setcookie("id","",time()-60*60);
      $_COOKIE["id"]="";
  }else if((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])) {
      header("Location: thoughtentry.php");
  }

  
  
  $link = mysqli_connect("sdb-e.hosting.stackcp.net","secretdiary_db-313833c85e","X@9K*5'[`YG,","secretdiary_db-313833c85e");
  
  if(mysqli_connect_error()){
      die("Error while connecting to a database");
  }
  
  $email = $_POST['email'];
  $password = $_POST['password'];
  $submit = $_POST['submit'];
  $error="";
  $success="";
  if($submit){
      
      if($email==""){
          $error.="Email Required<br>";
      }
      
      if($password==""){
          $error.="password Required<br>";
      }
      
      if($error!=""){
          $error="<p>There were error(s) in your form</p>".$error;
      }else{
          
          if($_POST['signup']=="1"){
          
          $query = "SELECT * FROM users where email ='".mysqli_real_escape_string($link,$email)."'";
         
         $result = mysqli_query($link,$query);
         
         if(mysqli_num_rows($result) > 0){
             
             $error = "Email Already registered. Log in";
             
         }else{
             
             $query = "INSERT INTO users(email,password) VALUES('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."') ";
             
             if(mysqli_query($link,$query)){
                 $success = "Successfully registered";
                 //header();
                 $tempid = "SELECT max(id) from users";
                 $query = "UPDATE users SET password = '".$_POST['password']."' WHERE id= ".$tempid." LIMIT 1 ";
                $id = mysqli_insert_id($link);
                 mysqli_query($link,$query);
                 
                 $_SESSION['id'] = $id;
                 
                 if($_POST['stayloggedin']=='1'){
                     
                     setcookie("id",$id,time()+60*60*24*365);
                 }
                 header("Location: thoughtentry.php");
             }
             
         }
          }else{
            //  echo "loged in";
              $query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
             
              $result = mysqli_query($link,$query);
              
              //print_r($result);
              
              $row = mysqli_fetch_row($result); 
              
             // echo $row[2]."<br>";
              
              if(isset($row)){
                  $hashedpassword = $_POST['password'];
                  
                  echo $hashedpassword."<br>";
                  
                  if($hashedpassword == $row[2]){
                      
                     // echo "matched";
                      
                      $_SESSION['id'] = $row['id'];
                      
                       if($_POST['stayloggedin']=='1'){
                     
                        setcookie("id",$row['id'],time()+60*60*24*365);
                      }
                      header("Location: thoughtentry.php");
                      
                      
                  }else{
                 //     echo "Incorect password";
                       $error="Incorrect email/password Combination";
                       
                  }
              }
         
          }
      }
      
      
  }
  


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

     
    
     <style type="text/css">
     
    html { 
          background: url(background.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
       }
       body{
           background:none;
           text-align:center;
       }
       
       .container{
           width:450px;
           margin-top:150px;
           
       }
       h1{
           color:white;
           font-size:45px;
       }
       p{
           color:white;
       }
       .form-check-label{
           color:white;
       }
       #checkbox{
           position:relative;
           left:40px  ;
       }
       #loginform{
           display:none;
       }
       #loginbutton{
           margin-top:5px;
       }
       #errormsg{
           color:red;
       }
    
   
    </style>
    <title>Thought Keeper</title>
  </head>
  <body>
      
      <div class = "container" >
      
    <h1>Thought Keeper</h1> 
    
    <p>Wanna Keep your thoughts safe and secure. Sign UP!</p>
    
     <div id="errormsg"><?echo $error?></div>
      
      <form method="post" id="signinform" >
          
          <div class="mb-3">
          
          <input type = "email" class="form-control" name = "email" placeholder="Enter email">
          
          </div>
          
          <div class="mb-3">
          
          <input type = "password" class="form-control" name = "password" placeholder="Enter password">
          
          </div>
          <div class="mb-3 form-check">
          
          <input type="checkbox" class="form-check-input"  name = "stayloggedin" id="exampleCheck1"value = 1>
          <label class="form-check-label" for="exampleCheck1">Stay Logged in</label>
          
          </div>
          
          <input type="hidden" class="form-control" name = "signup" value = 1>
          
          <input type="submit" class="btn btn-primary" name ="submit" value="Sign Up!">
          
          
      </form>
      
      
      
      <form method="post" id="loginform">
          
     <!--    <div class="mb-3">
          
          <input type = "email" class="form-control" name = "email" placeholder="Enter email">
          
          </div>
          
          <div class="mb-3">
          
          <input type = "password" class="form-control" name = "password" placeholder="Enter password">
          
          </div>
          <div class="mb-3 form-check">
          
          <input type="checkbox" id="checkbox" class="form-check-input"  name = "stayloggedin" id="exampleCheck1"value = 1>
          <label class="form-check-label" for="exampleCheck1">Stay Logged In</label>
          
          </div> 
          
          -->
          
          <input type="hidden" class="form-control" name = "signup" value = 0>
          
          <input type="submit" class="btn btn-primary" name ="submit" value="Log in">
          
          
      </form>
    

   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
     
     <script type="text/javascript">
         
       
         
     </script>
    
  </body>
</html>




      
 

    

   
  
   
   