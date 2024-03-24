<?php 
    include "services/databases.php";
     
    if(isset($_POST["register"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "INSERT INTO users (username, password) VALUE ('$username', '$password')";

        if($db->query($sql)){
            echo "data berhaasil masuk";
        }else{
            echo "data gagal masuk";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php include("layouts/header.html") ?>

    <br>
    <h3>DAFTAR AKUN DISINI</h3>
    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username">
        <input type="password" placeholder="password" name="password">
        <button type="submit" name="register">Daftar Sekarang</button>
    </form>

    <?php include("layouts/footer.html") ?>
</body>
</html>