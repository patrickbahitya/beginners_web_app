<?php
include"connection.php";
$result = mysqli_query($link,"SELECT * FROM tbl_user");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
    <title></title>
</head>
<body>
<table class="table table-bordered">
    <tr style='color: yellow;background-color: black'>
        <td>ID</td>
        <td>NAME</td>
        <td>USERNAME</td>
        <td>PASSWORD</td>
    </tr>
    <?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {
        if($i%2==0)
            $classname="even";
        else
            $classname="odd";
        ?>
        <tr class="<?php if(isset($classname)) echo $classname;?>" style='color: blue;background-color: yellow'>
            <td><?php echo $row["user_id"]; ?></td>
            <td><?php echo $row["namee"]; ?></td>
            <td><?php echo $row["user_name"]; ?></td>
            <td><?php echo $row["password"]; ?></td>
            <td><a href="update-process.php?user_id=<?php echo $row["user_id"]; ?>">Update</a></td>
        </tr>
        <?php
        $i++;
    }
    ?>
</table>
</body>
</html>


