<?php
if (isset($_POST["electionId"])) {
    $query = "insert into candidateRequest (electionId, candidateName, photo, title, descr, vid, flyer) values (?, 'Zakaria', ?, ?, ?, ?, ?)";
    $host = "localhost";
    $db = "Voting";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($query);
    $stmt->bindValue(1, (int)$_POST["electionId"]);
    $stmt->bindValue(2, $_POST["photo"]);
    $stmt->bindValue(3, $_POST["title"]);
    $stmt->bindValue(4, $_POST["descr"]);
    $stmt->bindValue(5, $_POST["vid"]);
    $stmt->bindValue(6, $_POST["flyer"]);
    $stmt->execute();
    header("Location: election.php?electionId=" . $_POST["electionId"]);
}
