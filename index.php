<?php

session_start();
include("connection.php");
$username="";
$password="";
if(isset($_POST["submit"])){

  $username=$_POST['username'];
    $password=$_POST['password'];

}

if($username=="Admin"){
    if($password=="pass"){

        $sql="insert into tbl_admin(username)VALUES ('$username')";
        mysqli_query($sql);


        header("Location:admin_home_page.php");



    }else{
        echo("<font color='#8b0000'style='font-size: x-large'> Invalid Usernmae or Password!!</font>");


    }


}elseif($username=="HOD"){
   $check_user_query="select * from tbl_user WHERE user_name='$username' AND password='$password' ";
    $check_user=mysqli_query($link,"$check_user_query");
    $user_exist=mysqli_num_rows($check_user);
    if($user_exist>0){
        header("Location:hod_home_page.php");


    }else{
        echo("<font color='#8b0000'style='font-size: x-large'>Invalid Username or Password!!</font>");


    }


}elseif($username=="AR"){
    $check_user_query="select * from tbl_user WHERE user_name='$username' AND password='$password' ";
    $check_user=mysqli_query($link,"$check_user_query");
    $user_exist=mysqli_num_rows($check_user);
    if($user_exist>0){
        header("Location:academic_registrar_home_page.php");


    }else{
        echo("<font color='#8b0000'style='font-size: x-large'>Invalid Username or Password!!</font>");


    }


}





?>


<!DOCTYPE html>

    <html>
<head>



    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>student registration and examination</title>
</head>

<body>
<div  id="header">
    <img class="title-logo1" src="images/liralogo.jpg" width="200" height="170"  alt="university logo" >


    <img class="title-logo2" src="images/liralogo2.png" width="200" height="170"  alt="university logo" >



</div>

<div id="title-row">

    <h1>Lira University</h1>
    <h3>Student Registration and Examination Management System</h3>

</div>

    <div id="container">



        <br/>
        <br/>





            <fieldset>
                <legend class="text-center">Enter username and password</legend>
                <form method="post"   action="<?php echo($_SERVER['PHP_SELF']); ?>">
                <table>
                    <tr>
                        <td>username:   </td>
                        <td></td>
                        <td>
                            <select name="username" style="width: 229px">
                                <option>Admin</option>
                                <option>HOD</option>
                                <option>AR</option>
                            </select>

                        </td>
                    </tr>

                    <tr>
                        <td>password:</td>
                        <td></td>
                        <td><input type="password" name="password"></td>
                    </tr>


                    <tr>
                        <td></td>

                        <td><input type="submit" name="submit" value="login"></td>

                    </tr>
                </table>
                    </form>
            </fieldset>


        <br/>
        <br/>



    </div>

<div id="footer">
    <p> &iff; copyright &copy;Patrick Bahitya 2018 &iff;</p>

</div>


<!--

<p><a href="admin_home_page.php">to admin</a> </p>
<p><a href="hod_home_page.php">to HOD</a> </p>
<p><a href="academic_registrar_home_page.php">to AR</a> </p>

-->




</body>

</html>
