




<html>

<head>
    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
    <title></title>
</head>

<body bgcolor="green">



<table class="table table-bordered">
    <?php
    include("connection.php");
    $sql="select * from tbl_assessment";
    $result=mysqli_query($link,$sql);

    echo'<thead style="color: yellow;">';
    echo'<tr>';
    echo'<td>REG_No.</td>';
    echo'<td>ASSESSMENT_TYPE</td>';
    echo'<td>MARKS</td>';
    echo' </tr>';
    echo'</thead>';

    while($row=mysqli_fetch_array($result)){
        $assessment_type = $row['assessment_type'];
        $marks = $row['marks'];
        $reg_no = $row['reg_no'];


        // echo $row['0'].$row['1'].$row['2'].$row['3'];


        echo'<tbody style="background-color: black;color: blue">';
        echo'<tr>';
        echo"<td>$reg_no</td>";
        echo"<td>$assessment_type </td>";
        echo"<td> $marks</td>";
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
$sql = "SELECT * FROM tbl_assessment";
if($result = mysqli_query($link,$sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered'>";
        echo "<tr style='color: yellow;background-color: black'>";
        echo "<th>REG_No.</th>";
        echo "<th>ASSESSMENT_TYPE</th>";
        echo "<th>MARKS</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr style='color: blue;background-color: yellow'>";
            echo "<td>" . $row['reg_no'] . "</td>";
            echo "<td>" . $row['assessment_type'] . "</td>";
            echo "<td>" . $row['marks'] . "</td>";
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








