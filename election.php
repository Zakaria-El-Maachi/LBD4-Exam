<?php
try {
    $query = "select * from elections where ";
    $host = "localhost";
    $db = "Voting";
    $username = "root";
    $password = "";
    $r = 0;
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
            <td>" . $row["title"] . "</td><td>" . $row["startDate"] . "</td><td>" . $row["endDate"] . "</td>
            </tr>";
    }
} catch (PDOException $e) {
    echo "An error has ocurred : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <section>

        <table class="table table-striped" id="elections">
            <tr>
                <td>Title</td>
                <td>Start Date</td>
                <td>End Date</td>
            </tr>
            <?php
            try {
                $query = "select * from elections";
                $host = "localhost";
                $db = "Voting";
                $username = "root";
                $password = "";
                $r = 0;
                $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($query);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                    <td>" . $row["title"] . "</td><td>" . $row["startDate"] . "</td><td>" . $row["endDate"] . "</td>
                    </tr>";
                }
            } catch (PDOException $e) {
                echo "An error has ocurred : " . $e->getMessage();
            }
            ?>
        </table>
    </section>
</body>

</html>