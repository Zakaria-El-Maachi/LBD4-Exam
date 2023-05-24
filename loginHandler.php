<?php
try {
    if (isset($_POST["username"]) && isset($_POST["passwrd"])) {
        $host = "localhost";
        $db = "Voting";
        $username = "root";
        $password = "";
        $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST["email"])) {
            $query = "insert into users (username, email, passwrd, isAdmin) values (?, ?, ?, 0)";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $_POST["username"]);
            $stmt->bindValue(2, $_POST["email"]);
            $stmt->bindValue(3, password_hash($_POST["passwrd"], PASSWORD_DEFAULT));
            $stmt->execute();
        } else {
            $query = "select userId, passwrd from users where username = ?";
            $r = 0;
            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $_POST["username"]);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $answer = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($_POST["passwrd"], $answer["passwrd"])) {
                    $r = 1;
                    session_start();
                    $_SESSION["userId"] = $answer["userId"];
                }
            }
            echo $r;
        }
    }
} catch (PDOException $e) {
    echo "An error has ocurred : " . $e->getMessage();
}
