<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
<style>
    img{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<img src="block.png" alt="Fixing" style="width:128px;height:128px;">
<div class="container my-5">
    <h2>Welcome admin</h2>
    <a class="btn btn-primary" href="create.php" role="button">Add game</a>
    <br>
    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>developer</th>
            <th>release_date</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query = "SELECT * FROM games";
        $result = $conn->query($query);

        if (!$result){
            die("An error occurred while querying SQL: " . $conn->error);
        }

        while($row = $result->fetch_assoc()){
            echo '<tr>
                 <td>' . $row['id'] . '</td>
                 <td>' . $row['name'] . '</td>
                 <td>' . $row['developer'] . '</td>
                 <td>' . $row['release_date'] . '</td>
                 <td>
                    <a class="btn btn-primary btn-sm" href="edit.php?id=' . $row['id'] . '">Edit</a>
                    <a class="btn btn-primary btn-sm" href="delete.php?id=' . $row['id'] . '">Delete</a>
                </td>
            </tr>';
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>