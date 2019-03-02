<?php

include("connection.php");
session_start();
?>

<?php
$reg_no=0;
$firstName="";
$surname="";
$sex="";
$district="";
$telephone="";

if(isset($_POST['submit'])){

    $reg_no=$_POST['reg_no'];
    $firstName=$_POST['first_name'];
    $surname=$_POST['surname'];
    $sex=$_POST['sex'];
    $district=$_POST['district'];
    $telephone=$_POST['telephone'];

    $sql="insert into tbl_student(reg_no,first_name,surname,sex,district,telephone)VALUES('$reg_no','$firstName','$surname',' $sex','$district','$telephone')";
    $run=mysqli_query($link,$sql);


    if(!$run)
        echo mysqli_error($link);
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
            <legend class="text-center">Register Student</legend>

            <table>
                <tr>
                    <td>Reg No:</td>
                    <td></td>
                    <td><input type="number" style="width: 229px" name="reg_no"></td>
                </tr>

                <tr>
                    <td>First name:</td>
                    <td></td>
                    <td><input type="text" name="first_name"></td>
                </tr>

                <tr>
                    <td>Surname:</td>
                    <td></td>
                    <td><input type="text" name="surname"></td>
                </tr>

                <tr>
                    <td>Sex:</td>
                    <td></td>
                    <td><input type="text" name="sex"></td>
                </tr>
                <tr>
                    <td>District:</td>
                    <td></td>
                    <td><input type="text" name="district"></td>
                </tr>
                <tr>
                    <td>Telephone:</td>
                    <td></td>
                    <td><input type="text" name="telephone"></td>
                </tr>


                <tr>
                    <td></td>

                    <td><input type="submit" name="submit" value="Register"></td>

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



