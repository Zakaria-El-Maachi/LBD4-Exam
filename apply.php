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
    <form action="application.php" method="post">
        <input type="hidden" name="electionId" value="<?php echo $_GET["electionId"] ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="photo">Photo</label>
                <input name="photo" type="text" class="form-control" id="photo" placeholder="https://photo">
            </div>
            <div class="form-group col-md-6">
                <label for="title">Program Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="The Big Amazing Plan">
            </div>
        </div>
        <div class="form-group">
            <label for="Program Description">Program Description</label>
            <textarea name="descr" class="form-control" id="Program Description" rows="3"></textarea>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="video">Program Campaign Video</label>
                <input name="vid" type="text" class="form-control" id="video" placeholder="https://video">
            </div>
            <div class="form-group col-md-6">
                <label for="flyer">Program Flyer</label>
                <input name="flyer" type="text" class="form-control" id="flyer" placeholder="https://flyer">
            </div>
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>
</body>

</html>