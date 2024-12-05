<?php
include "conn.php";

if (isset($_POST["singup"])) {
    $name=$_POST["name"];
    $pass=$_POST["pass"];
    $cpass=$_POST["cpass"];
    $select=$_POST["select"];
    $email=$_POST["email"];
if ($name!="" AND $pass!="" AND $cpass!="" AND $pass!="" AND $email!="") {
    $ins=mysqli_query($con,"select * from hospital_organisation where email='$email'");
    if (mysqli_num_rows($ins)>0) {
        $echo[]='sory the email have been arlaedy taken';
    }
    else {
        
    
if ($pass!= $cpass) {
    $echo[]='password does not match';
}else {

    $ins=mysqli_query($con,"INSERT into hospital_organisation(name,email,password,user_type) values('$name','$email','$cpass','$select')");
}
}}else {
    $echo[]='empty inputs try to insert';
}

}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
   *{
    background-color: #eee;
}
        form{
            
            border: 1px solid black;
            width: 30%;
            background: transparent;
            background-color: #fff;
            box-shadow:0 5px 10px rgba(0,0,0,.1);
            padding-bottom: 3px;
            border-radius: 5px;
        }
        input{
            color: green;
            border: 1px solid grey;
            border-radius: 5px;
            height: 40px;
            width: 97%;
            background: transparent;
            background-color: #fff;
        }
        button{
            background-color: grey;
            border: 1px solid grey;
            height: 40px;
            width: 97%;
        }
        center{
            padding-top: 140px;
        }
        select{
            border: 1px solid grey;
            height: 40px;
            width: 97%;
            border-radius: 5px;
        }
        h2{
            color: blue;
        }
        p{
            background: transparent;
        }
        .err{
            border: 1px solid red;
            background: crimson;
            color: #fff;
            display:block;
            font-size: 18px;
            padding:8px;
            margin: 10px 0;
            border-radius: 5px;
        }
        
    </style>
</head>
<body>
    <center>
    
    <form action="" method="post">
    <h2>create account here</h2>
         <?php 
        if(isset($echo)){
foreach($echo as $err){
 echo '<span class="err">'. $err.'</span>';
}
        }
        ?> 
        names: <br>
        <input type="text" name="name" id=""> <br>
        email: <br>
        <input type="email" name="email" id=""> <br>
        password: <br>
        <input type="password" name="pass" id=""> <br>
        reapeat password:
        <input type="password" name="cpass"><br><br>
        <select name="select" id="" >
            <option value="select user" >select user</option>
            <option value="admin">admin</option>
            <option value="doctor">doctor</option>
            <option value="nurse">nurse</option>
        </select>
        <br> <br>
        <button type="submit" name="singup">singup</button> <br> 
        <p>Arleady have an account? <a href="login.php">login</a></p>
        <br>
    </form>
    </center>
</body>
</html>