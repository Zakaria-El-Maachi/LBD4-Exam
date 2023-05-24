<?php
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
            echo
            "<h1>" . $answer["title"] . "</h1><img src='" . $answer["photo"] . "' />" .
                "<p>" . $answer["descr"] . "</p>" .
                "<iframe frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen src='https://www.youtube.com/embed/" . $answer["vid"] . "></iframe>" .
                "<p>" . $answer["descr"] . "</p>" .
                "<img src='" . $answer["flyer"] . "' />---" . $answer["candidateId"];
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
    echo "An error has ocurred : " . $e->getMessage();
}
