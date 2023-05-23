<?php
try {
    if (isset($_POST["email"]) && isset($_POST["passwrd"])) {
        $query = "select passwrd from users where email = ?";
        $host = "localhost";
        $db = "Voting";
        $username = "root";
        $password = "";
        $r = 0;
        $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $_POST["email"]);
        $stmt->execute();
        $answer = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        if (password_verify($_POST["passwrd"], $answer["passwrd"])) {
            $r = 1;
        }
        echo $r;
    }
} catch (PDOException $e) {
    echo "An error has ocurred : " . $e->getMessage();
}
