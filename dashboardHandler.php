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
    }
} catch (PDOException $e) {
    header("Location: dashboard.php?message=An error has ocurred : " . $e->getMessage());
    exit();
}
