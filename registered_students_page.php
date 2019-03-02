

<html>

<head>

    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
    <title></title>
</head>

<body bgcolor="green">



<table  class='table table-bordered'>
    <?php
    include("connection.php");
    $sql="select * from tbl_student";
    $result=mysqli_query($link,$sql);

    echo'<thead style="color: yellow;">';
    echo'<tr>';
    echo '<td>REGISTRATION No.</td>';
    echo'<td>FIRST NAME</td>';
    echo'<td>SURNAME</td>';
    echo'<td>SEX</td>';
    echo'<td>DISTRICT</td>';
    echo'<td>TELEPHONE</td>';
    echo' </tr>';
    echo'</thead>';

    while($row=mysqli_fetch_array($result)){
        $reg_no = $row['reg_no'];
        $first_name = $row['first_name'];
        $surname = $row['surname'];
        $sex = $row['sex'];
        $district = $row['district'];
        $telephone = $row['telephone'];


        // echo $row['0'].$row['1'].$row['2'].$row['3'];


        echo'<tbody style="background-color: black;color: blue">';
        echo'<tr>';
        echo"<td> $reg_no </td>";
        echo"<td> $first_name    </td>";
        echo"<td>  $surname  </td>";
        echo"<td>  $sex</td>";
        echo"<td>  $district</td>";
        echo"<td>  $telephone</td>";
        echo' </tr>';
        echo'</tbody>';



    }


    ?>
    echo'</table>';


</body>
</html>




<?php

include("connection.php");
// Attempt select query execution
$sql = "SELECT * FROM tbl_student";
if($result = mysqli_query($link,$sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered'>";
        echo "<tr style='color: yellow;background-color: black'>";
        echo "<th>REGISTRATION No.</th>";
        echo "<th>FIRST NAME</th>";
        echo "<th>SURNAME</th>";
        echo "<th>SEX</th>";
        echo "<th>DISTRICT</th>";
        echo "<th>TELEPHONE</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr style='color: blue;background-color: yellow'>";
            echo "<td>" . $row['reg_no'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['surname'] . "</td>";
            echo "<td>" . $row['sex'] . "</td>";
            echo "<td>" . $row['district'] . "</td>";
            echo "<td>" . $row['telephone'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>






