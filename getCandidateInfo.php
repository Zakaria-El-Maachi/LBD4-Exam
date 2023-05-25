<?php
$message = "success";
try {
    if (isset($_POST["set"])) {
        $host = "localhost";
        $db = "Voting";
        $username = "root";
        $password = "";
        $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($_POST["set"] == "0") {
            $query = "select * from candidates C inner join programs P on C.candidateId = P.candidateId where P.candidateId = ? ";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $_POST["candidateId"]);
            $stmt->execute();
            $answer = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "<div class='hor'>
            <div class='ver'>
            <h1>" . $answer["title"] . "</h1><p>" . $answer["descr"] . "</p>
            </div>
            <div class='ver'>
            <img src='" . $answer["photo"] . "' />" . "<iframe frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen src='https://www.youtube.com/embed/" . $answer["vid"] . "></iframe>" .
                "<img src='" . $answer["flyer"] . "' />
            </div>
            </div>---" . $answer["candidateId"];
        } else {
            $query = "insert into votes values (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, (int)$_POST["electionId"]);
            session_start();
            $stmt->bindValue(2, (int)$_SESSION["userId"]);
            $stmt->bindValue(3, (int)$_POST["vote"]);
            $stmt->bindValue(4, $_POST["SDate"]);
            $stmt->execute();
        }
    }
} catch (PDOException $e) {
    $message = $e->getMessage();
}
echo $message;
