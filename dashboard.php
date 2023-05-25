<!DOCTYPE html>
<html lang="en">
<?php $host = "localhost";
$db = "Voting";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">
    <script defer src="js/dashboard.js"></script>
    <title>Document</title>
</head>

<body>
    <div id="navbar">
        <a>Elections</a>
        <a>Create Election</a>
        <a>Requests</a>
    </div>

    <div id="info">
        <div id="message">
            <p></p>
            <button onclick="hideMessage()">X</button>
        </div>
        <section id="elections">
            <h1>Elections</h1>
            <button>Closed</button>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Election Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Deletion</th>
                    </tr>
                </thead>
                <?php try {
                    $query = "select * from elections";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr data-electionid='" . $row['electionId'] . "'>
                <td>" . $row["title"] . "</td><td>" . $row["startDate"] . "</td><td>" . $row["endDate"] . "</td>
                <td><button class='delete'>Delete</button></td>
                </tr>";
                    }
                } catch (PDOException $e) {
                    echo "An error has ocurred : " . $e->getMessage();
                } ?>
            </table>
            <div id="description">
                <p></p>
            </div>
        </section>
        <section id="create">
            <h1>Create Election</h1>
            <form action="dashboardHandler.php" method="post">
                <input type="hidden" name="request" value="1">
                <div class="form-group col-md-12">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="descr">Description</label>
                    <textarea name="descr" class="form-control" id="descr" rows="3"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="startDate">Start Date</label>
                        <input name="startDate" type="date" class="form-control" id="startDate">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="endDate">End Date</label>
                        <input name="endDate" type="date" class="form-control" id="endDate">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create Election</button>
            </form>
        </section>
        <section id="requests">
            <h1>Requests</h1>
            <table class=".table">
                <tr>
                    <th>Program Title</th>
                    <th>Usename</th>
                    <th>Election Title</th>
                </tr>
                <?php try {
                    $query = "select e.electionId, e.title as electionTitle, u.userId, username, r.title as progTitle from candidateRequests r inner join elections e on e.electionId = r.electionId inner join users u on r.userId = u.userId ";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                <td>" . $row["progTitle"] . "</td><td>" . $row["username"] . "</td><td>" . $row["electionTitle"] . "</td>
                </tr>";
                    }
                } catch (PDOException $e) {
                    echo "An error has ocurred : " . $e->getMessage();
                } ?>
            </table>
        </section>
    </div>
</body>

</html>