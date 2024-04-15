<?php
include "services/databases.php";
session_start();

if (isset($_SESSION["is_login"])) {
    header("Location : dashboard.php");
}

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        $sql = "INSERT INTO users (username, password) VALUE ('$username', '$password')";

        if (!empty($username) && !empty($password)) {
            $sql = "INSERT INTO users (username, password) VALUE ('$username', '$password')";

            if ($db->query($sql)) {
                echo "<script>alert('Data berhasil masuk');</script>";
            } else {
                echo "<script>alert('Data gagal masuk');</script>";
            }
        } else {
            echo "<script>alert('Username dan password harus diisi');</script>";
        }
    } catch (mysqli_sql_exception) {
        echo "<script>alert('Username sudah digunakan');</script>";
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