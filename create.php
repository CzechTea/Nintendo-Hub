<?php
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "nintendohub";
@include 'config.php';

$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$developer = "";
$release_date = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $developer = $_POST["developer"];
    $release_date = $_POST["release_date"];

    do {
        if (empty($name) || empty($developer) || empty($release_date)){
            $errorMessage = "All the fields are required.";
            break;
        }
        $sql = "INSERT INTO games (name,developer,release_date) 
                VALUES ('$name', '$developer', '$release_date')";
        $result = $connection->query($sql);

        if(!$result) {
            $errorMessage = "An error has occurred: " . $connection->error;
            break;
        }

        $name = "";
        $developer = "";
        $release_date = "2017-03-03";

        $successMessage = "The game was successfully added to the database.";

        haeder("location: admin_page.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container my-5">
    <h2>Add Game</h2>

    <?php
    if (!empty($errorMessage)) {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>' . $errorMessage . '</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
    ?>
    <form method="post">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Developer</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="developer" value="<?php echo htmlspecialchars($developer); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Release date</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="release_date" value="<?php echo htmlspecialchars($release_date); ?>">
            </div>
        </div>
        <?php
        if (!empty($successMessage)) {
            echo '
                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-6">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>' . $successMessage . '</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            ';
        }
        ?>
        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="admin_page.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>
