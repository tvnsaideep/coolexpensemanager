<?php
$conn= new mysqli("localhost","root","","users") or die('connecting error'.$conn->connect_error);
if(isset($_POST['mit']))
{
  $name=$_POST['username'];
  $password=$_POST['password'];
  $mail=$_POST['email'];
  $income=$_POST['income'];
$myinsert=mysqli_query($conn,"insert into regusers(name,mail,password,income,balance) values('$name','$mail','$password','$income','$income')");
if($myinsert)
{
  echo '<script>alert("successfully registered,please login to continue");
  window.location.href="login.php";</script>';
}
else
{
   echo '<script>alert("cannot register, username or mail exists");</script>'.mysqli_errno();
}
}

?>
