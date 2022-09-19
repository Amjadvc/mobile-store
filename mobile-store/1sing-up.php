  
<html>
<head>
<style>
body{ background-image:url("L.jpg");}
.error {color: red;}
    div{text-align: center}
    table.t{margin-left: auto;margin-right: auto}
    #sup{background-color:whitesmoke;opacity: 0.6;}
</style>
</head>
<body>  

<?php
$fnameErr=$lnameErr = $emailErr = $genderErr = $phnoErr =$userErr=$passErr= "";
$fname=$lname = $email = $gender = $comment = $phno=$user=$pass ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "Name is required";
  } else {
    $fname =$_POST["fname"];
   
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
  }
      if (empty($_POST["lname"])) {
    $lnameErr = "Name is required";
  } else {
    $lname =$_POST["lname"];
   
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
    }
  }


  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email =$_POST["email"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["phno"])) {
    $phnoErr = "phone number is required";
  } else {
    $phno =$_POST["phno"];
 
    if (!preg_match("/^[0-9]{10}$/" ,$phno)) {
      $phnoErr = "Invalid phone number";
    }
  }


  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";

  }
     if (empty($_POST["user"])) {
    $userErr = "Username is required";
     }
 if (empty($_POST["pass"])) {
    $passErr = "Password is required";}
   else{ $pass =$_POST["pass"];
      
if (strlen($_POST["pass"])<='6'){$passErr="Password must be more than 8 characters";}
    
 if
   (!preg_match("#[0-9]+#",$pass)) {
      $passErr = " Password should contain atlest one number";
    }
  if(!preg_match("#[a-zA-Z]+#",$pass))
    {$passErr="password should contain capital or lowercase letters";}
       }
}
?>
<div>
<h1 style="text-align:center">Registration</h1>
<p><span class="error">* required field</span></p>
<form method="post" action="registration.php"> 
 <table class="t">
    
     <tr>
     <th >First Name:</th>
         <tD><input type="text" name="fname"></tD>
         <tD><span class="error">* <?php echo $fnameErr;?></span></tD>
     
     </tr>
    <tr>
     <th> Last Name: </th>
        <td> <input type="text" name="lname"></td>
        <td> <span class="error">* <?php echo $lnameErr;?></span></td>
     
     
     </tr>
     
     
        <tr>
     <th>  E-mail:  </th>
        <td> <input type="text" name="email"></td>
        <td> <span class="error">* <?php echo $emailErr;?></span></td>
     
     
     </tr>
     
     
     
        <tr>
     <th> Phone Number:</th>
        <td>  <input type="text" name="phno"></td>
        <td>   <span class="error">*<?php echo $phnoErr;?></span></td>
      </tr>
     <tr>
     
     <th>Gender:</th>
         <td> <select name="gender" size="1">
    <option></option>
     <option>male</option>
     <option>female</option>
     <option>other</option>
</select></td>
     <td>  <span class="error">* <?php echo $genderErr;?></span></td>
     
     </tr>
        <tr>
     <th> Username</th>
        <td>  <input type="text" name="user"></td>
        <td>   <span class="error">*<?php echo $userErr;?></span></td>
      </tr>

            <tr>
     <th> Password</th>
        <td>  <input type="text" name="pass"></td>
        <td>   <span class="error">*<?php echo $passErr;?></span></td>
      </tr>
    
     
    </table>   
  <input id="sup" type="submit" name="submit" value="Sign Up">  
</form>
</div>

</body>
</html>