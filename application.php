<?php
$message = "success";
try {
    if (isset($_POST["electionId"])) {
        $query = "insert into candidateRequests (electionId, userId, photo, title, descr, vid, flyer) values (?, ?, ?, ?, ?, ?, ?)";
        $host = "localhost";
        $db = "Voting";
        $username = "root";
        $password = "";
        $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($query);
        $stmt->bindValue(1, (int)$_POST["electionId"]);
        session_start();
        $stmt->bindValue(2, $_SESSION["userId"]);
        $stmt->bindValue(3, $_POST["photo"]);
        $stmt->bindValue(4, $_POST["title"]);
        $stmt->bindValue(5, $_POST["descr"]);
        $stmt->bindValue(6, $_POST["vid"]);
        $stmt->bindValue(7, $_POST["flyer"]);
        $stmt->execute();
    }
} catch (PDOException $e) {
    $message = $e->getMessage();
}

header("Location: elections.php?$message");
