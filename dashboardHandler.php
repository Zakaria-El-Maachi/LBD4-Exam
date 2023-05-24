<?php
$host = "localhost";
$db = "Voting";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    if ($_POST["request"] == 1) {
        $query = "select * from elections";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
            <td>" . $row["title"] . "</td><td>" . $row["startDate"] . "</td><td>" . $row["endDate"] . "</td>
            </tr>";
        }
    } elseif ($_POST["request"] == 2) {
        $query = "select e.electionId, e.title as electionTitle, u.userId, username, r.title as progTitle from candidateRequests r inner join users u on r.userId = u.userId inner join elections e on r.electionId = r.electionId";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
            <td>" . $row["progTitle"] . "</td><td>" . $row["username"] . "</td><td>" . $row["electionTitle"] . "</td>
            </tr>";
        }
    }
} catch (PDOException $e) {
    echo "An error has ocurred : " . $e->getMessage();
}
