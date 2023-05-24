<?php
try {
    if (isset($_POST["candidateId"])) {
        $query = "select * from candidates C inner join programs P on C.candidateId = P.candidateId where P.candidateId = ? ";
        $host = "localhost";
        $db = "Voting";
        $username = "root";
        $password = "";
        $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($query);
        $stmt->bindValue(1, $_POST["candidateId"]);
        $stmt->execute();
        $answer = $stmt->fetch(PDO::FETCH_ASSOC);
        echo
        "<div>" .
            "<h1>" . $answer["title"] . "</h1><img src='" . $answer["photo"] . "' />" .
            "<p>" . $answer["descr"] . "</p>" .
            "<iframe frameborder='0' allowfullscreen src='" . $answer["vid"] . "'></iframe>" .
            "<p>" . $answer["descr"] . "</p>" .
            "<img src='" . $answer["flyer"] . "' />" .
            "</div>";
    } else {
        echo "<div><h1>No Candidate Error</h1><img/></div>";
    }
} catch (PDOException $e) {
    echo "An error has ocurred : " . $e->getMessage();
}
