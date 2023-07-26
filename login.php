<?php
$username=$_POST['username'];
$password=$_POST['password'];
//database connection
$con=new mysqli ("localhost","root","","resturant");
if($con->connect_error){
    die("could not connect".$con->connect_error()); 
}
else{
    $stmt=$con->prepare("select*from test where username=?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->rows>0){
$data=$stmt_result->fetch();
if($data['password']==$password){
    echo"<h2>login successful</h2>";
}
else{
    echo"<h2>invalid username or password</h2>";
}
    }
    else{
        echo"<h2>invalid username or passwword";
    }
}


?>