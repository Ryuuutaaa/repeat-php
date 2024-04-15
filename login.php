<?php

include "services/databases.php";
session_start();

if (isset($_SESSION["is_login"])) {
    header("Location : dashboard.php");
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users  WHERE username = '$username' AND password = '$password'";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION["username"] = $data["username"];
        $_SESSION["is_login"] = true;


        header("Location: dashboard.php");
    } else {
        echo "data tidak ditemukan";
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
    <h3>MASUK AKUNNN</h3>
    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username">
        <input type="password" placeholder="password" name="password">
        <button type="submit" name="login">Masuk Sekarang</button>
    </form>

    <?php include("layouts/footer.html") ?>
</body>

</html>