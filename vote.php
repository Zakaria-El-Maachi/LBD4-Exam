<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/vote.css">
    <title>Document</title>

</head>

<body>
    <div id="cards">
        <?php
        try {
            $query = "select * from candidates where electionId = ?";
            $host = "localhost";
            $db = "Voting";
            $username = "root";
            $password = "";
            $r = 0;
            $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $_GET["electionId"]);
            $stmt->execute();
            while ($answer = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div><h1>" . $answer["candidateName"] . "</h1><img src='" . $answer["photo"] . "' /></div>";
            }
        } catch (PDOException $e) {
            echo "An error has ocurred : " . $e->getMessage();
        }
        ?>
    </div>
</body>

</html>