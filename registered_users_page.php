


<html>

<head>

	<link rel="stylesheet"href="bootstrap/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="style1.css">

	<title></title>
</head>
<body>

</body>
</html>

<?php
	include("connection.php");

	// Attempt select query execution
	$sql = "SELECT * FROM tbl_user";
	if($result = mysqli_query($link,$sql)){
		    if(mysqli_num_rows($result) > 0){
			        echo "<table class='table table-bordered' >";
			            echo "<tr style='color: yellow;'>>";
			                echo "<th>ID</th>";
			                echo "<th>NAME</th>";
			                echo "<th>USERNAME</th>";
			                echo "<th>PASSWORD</th>";
			            echo "</tr>";
			        while($row = mysqli_fetch_array($result)){
			            echo "<tr style='background-color: black;color: blue'>";
				                echo "<td>" . $row['user_id'] . "</td>";
				                echo "<td>" . $row['namee'] . "</td>";
				                echo "<td>" . $row['user_name'] . "</td>";
				                echo "<td>" . $row['password'] . "</td>";
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
