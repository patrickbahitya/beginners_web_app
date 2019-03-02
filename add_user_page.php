<?php
include("connection.php");
session_start();


?>





<?php
$name="";
$username="";
$password="";

if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="insert into tbl_user (namee,user_name,password) VALUES ('$name','$username','$password')";

    //$run=mysql_query($sql); this can't be be used in new versions of php instead use mysqli but with two parameters!!

    $run=mysqli_query($link,$sql);


    if(!$run)
        echo mysqli_error();
    else
        echo'<p style="color: yellow;font-size: x-large"> record successfully inserted!!</p>';





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




    <form method="post"   action="<?php echo($_SERVER['PHP_SELF']); ?>">
        <fieldset>
            <legend class="text-center">Add User</legend>

            <table>
                <tr>
                    <td>name:</td>
                    <td></td>
                    <td><input type="text" name="name"></td>
                </tr>

                <tr>
                    <td>username:   </td>
                    <td></td>
                    <td>
                        <select  name="username" style="width: 229px">
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

                    <td><input type="submit" name="submit" value="Add"></td>

                </tr>
            </table>
        </fieldset>

    </form>

    <br/>
    <br/>



</div>


<div id="footer">
    <p> &iff; copyright &copy;Patrick Bahitya 2018 &iff;</p>

</div>










</body>

</html>

