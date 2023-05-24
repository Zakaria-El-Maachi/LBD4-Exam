<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/vote.css">
    <script defer src="js/vote.js"></script>
    <title>Document</title>

</head>

<body>
    <div>
        <section id="cards">
            <?php
            try {
                $query = "select * from candidates where electionId = ?";
                $host = "localhost";
                $db = "Voting";
                $username = "root";
                $password = "";
                $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1, $_GET["electionId"]);
                $stmt->execute();
                while ($answer = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div><input type='hidden' value='" . $answer["candidateId"] . "'><h1>" . $answer["candidateName"] . "</h1><img src='" . $answer["photo"] . "' /></div>";
                }
            } catch (PDOException $e) {
                echo "An error has ocurred : " . $e->getMessage();
            }
            ?>
        </section>
        <section id="info">
        </section>
    </div>
</body>

</html>