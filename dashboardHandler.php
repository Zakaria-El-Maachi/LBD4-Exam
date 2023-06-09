<?php
$host = "localhost";
$db = "Voting";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    if ($_POST["request"] == 1) {
        $query = "insert into elections (title, descr, startDate, endDate) values (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(1, $_POST["title"]);
        $stmt->bindValue(2, $_POST["descr"]);
        $stmt->bindValue(3, $_POST["startDate"]);
        $stmt->bindValue(4, $_POST["endDate"]);
        $stmt->execute();
        if ($stmt) {
            header("Location: dashboard.php?message=createdElection");
            exit();
        } else {
            header("Location: dashboard.php?message=An error has ocurred");
            exit();
        }
    } elseif ($_POST["request"] == 2) {
        $query = "delete from elections where electionId = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(1, $_POST["electionId"]);
        $stmt->execute();
        if ($stmt) {
            echo "deletedElection";
        } else {
            echo "error";
        }
    } elseif ($_POST["request"] == 3) {
        $query = "select descr from elections where electionId = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(1, $_POST["electionId"]);
        $stmt->execute();
        if ($stmt !== false) {
            echo $stmt->fetch(PDO::FETCH_ASSOC)["descr"];
        } else {
            echo "Error loading the description";
        }
    }
} catch (PDOException $e) {
    header("Location: dashboard.php?message=An error has ocurred : " . $e->getMessage());
    exit();
}
