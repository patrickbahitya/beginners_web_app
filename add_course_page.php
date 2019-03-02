<?php



?>

<?php
include("connection.php");
session_start();
$course_code=0;
$name="";

if(isset($_POST['submit'])){

    $course_code=$_POST['course_code'];
    $name=$_POST['name'];

    $sql="insert into tbl_course (course_code,course_name) VALUES ('$course_code','$name')";
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




    <form  method="post"   action="<?php echo($_SERVER['PHP_SELF']); ?>">
        <fieldset>
            <legend class="text-center">Add Course</legend>

            <table>

                <tr>
                    <td>Course code:</td>
                    <td></td>
                    <td><input type="number" style="width: 229px" name="course_code"></td>
                </tr>


                <tr>
                    <td>Course name:</td>
                    <td></td>
                    <td><input type="text" name="name"></td>
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


