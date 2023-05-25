<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/elections.css">
    <title>Document</title>
    <script defer src="js/elections.js"></script>
</head>

<body>
    <h1>Elections</h1>
    <p>Welcome to the elections page, choose an election to apply for or vote</p>
    <section>
        <?php
        try {
            $query = "select * from elections";
            $host = "localhost";
            $db = "Voting";
            $username = "root";
            $password = "";
            $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($query);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='election' data-id='" . $row["electionId"] . "'>
                    <h1>" . $row["title"] . "</h1>
                    <p>" . $row["descr"] . "</p>
                    <div class='hor'>
                    <h5>" . $row["startDate"] . "</h5><p>--></p><h5>" . $row["endDate"] . "</h5>
                    </div>
                    <div class='hor'>
                    <button class='vote'>Vote</button><button class='apply'>Apply</button>
                    </div>
                    </div>";
            }
        } catch (PDOException $e) {
            echo "An error has ocurred : " . $e->getMessage();
        }
        ?>
        </table>
    </section>
</body>

</html>