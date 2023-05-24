<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script defer src="js/election.js"></script>
    <title>Document</title>
</head>

<body>
    <section>
        <?php
        try {
            $query = "select * from elections where electionId = ?";
            $host = "localhost";
            $db = "Voting";
            $username = "root";
            $password = "";
            $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $_GET["electionId"]);
            $stmt->execute();
            $answer = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "<h1>" . $answer["title"] . "</h1><p>" . $answer["descr"] . "</p><br/>" .
                "<ul>
            <li>Start Date : " . $answer["startDate"] . "</li>
            <li>End Date : " . $answer["endDate"] . "</li>
        </ul>";
        } catch (PDOException $e) {
            echo "An error has ocurred : " . $e->getMessage();
        }
        ?>
    </section>
    <section id="apply">
        <h1>Apply</h1>
    </section>
    <section id="vote">
        <h1>Vote</h1>
    </section>
</body>

</html>