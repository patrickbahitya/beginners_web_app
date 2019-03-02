

<?php
include"connection.php";
if(isset($_POST['save'])){
    $checkbox = $_POST['check'];
    for($i=0;$i<count($checkbox);$i++){
        $del_id = $checkbox[$i];
        mysqli_query($link,"DELETE FROM tbl_user WHERE user_id='".$del_id."'");
        $message = "<p style='color: yellow;font-size: x-large'>Data deleted successfully !</p>";
    }
}
$sql = "SELECT * FROM tbl_user";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style1.css">
    <title></title>
    </head>
    <body>
    <div><?php if(isset($message)) { echo $message; } ?>
    </div>
    <form method="post" action="">
        <table class="table table-bordered" >
        <thead>
        <tr style='color: yellow;background-color: black'>
        <th><input type="checkbox" id="checkAl"> Select All</th>
    <th> Id</th>
    <th>name</th>
    <th>user_name</th>
    <th>password</th>
    </tr>
    </thead>
    <?php
    $i=0;
    if($result=mysqli_query($link,$sql)){

        if(mysqli_num_rows($result) > 0){


    while($row = mysqli_fetch_array($result)) {
        ?>
        <tr  style='color: blue;background-color: yellow'>
            <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["user_id"]; ?>"></td>
            <td><?php echo $row["user_id"]; ?></td>
            <td><?php echo $row["namee"]; ?></td>
            <td><?php echo $row["user_name"]; ?></td>
            <td><?php echo $row["password"]; ?></td>
        </tr>
        <?php
        $i++;
    }


        }

        else{
            echo "No records available";
        }
    }

    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    ?>
        </table>
        <?php
        mysqli_free_result($result);
        ?>
        <p align="center"><button type="submit" class="btn btn-success"name="save">DELETE</button></p>
    </form>



        }





    }

    <script>
    $("#checkAl").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    </script>
    </body>
</html>
















