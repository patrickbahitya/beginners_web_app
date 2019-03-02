<?php
include"connection.php";
if(count($_POST)>0) {
    mysqli_query($link,"UPDATE tbl_user set user_id='" . $_POST['user_id'] . "', namee='" . $_POST['namee'] . "', user_name='" . $_POST['user_name'] . "', password='" . $_POST['password'] . "' WHERE user_id='" . $_POST['user_id'] . "'");
    $message = "Record Modified Successfully";
}
$result = mysqli_query($link,"SELECT * FROM tbl_user WHERE user_id='" . $_GET['user_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
    <title></title>
</head>
<body bgcolor="green">
<form name="frmUser" method="post" action="">
    <div><?php if(isset($message)) { echo $message; } ?>
    </div>
    <div style="padding-bottom:5px;">
    </div>
    ID: <br>
    <input type="hidden" name="user_id" class="txtField" value="<?php echo$row['user_id']; ?>">
    <input type="text" name="user_id" value="<?php echo $row['user_id']; ?>">
    <br>
    NAME: <br>
    <input type="text" name="namee" class="txtField" value="<?php echo$row['namee']; ?>">
    <br>
    USERNAME :<br>
    <input type="text" name="user_name" class="txtField" value="<?php echo$row['user_name']; ?>">
    <br>
    PASSWORD:<br>
    <input type="text" name="password" class="txtField" value="<?php echo$row['password']; ?>">
    <br>
    <input type="submit" name="submit" value="Submit" class="buttom">
</form>
</body>
</html>

