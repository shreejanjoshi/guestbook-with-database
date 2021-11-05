<?php
// include 'database.php';
// include 'function.php';

// storeData();

// $connection = mysqli_connect('localhost', 'root', '', 'guestbook');

// if (!$connection) {
//     die("Database connection failed");
// }

// if (isset($_post['submit'])) {

//     $username = $_post['username'];
//     $title = $_post['title'];
//     $date = $_post['date'];
//     $message = $_post['message'];

//     $query = "INSERT INTO users (username, title, date, message) ";
//     $query .= "VALUE ('$username', '$title', '$date', '$message')";

//     $result = mysqli_query($connection, $query);

//     if (!$result) {
//         die("Query failed " . mysqli_error($connection));
//     } else {
//         echo ("Data is saved");
//     }
// }

$connect = mysqli_connect('localhost', 'root', '', 'book');

if (!$connect) {
    die("Not connected");
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $message = $_POST['message'];

    $query = "INSERT INTO users (name, title, message)";
    $query .= "VALUE ('$name', '$title', '$message')";

    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Query failed " . mysqli_error($connect));
    } else {
        echo ("Data saved");
    }
}

$show = "SELECT * FROM users";
$showResult = mysqli_query($connect, $show);

if (!$showResult) {
    die("Failed to show " . mysqli_error($connect));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <div class="col-xs-6">
            <form action="guestbook.php" method="post">
                <h1>Guest Book</h1>
                <!-- <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" class="form-control message" style="width:100%;height:150px;"></textarea>
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="Submit"> -->
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" class="form-control message" style="width:100%;height:150px;"></textarea>
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="ENTER">
            </form>

            <h1>Saved Data</h1>
            <?php 
            //showData() 
            ?>
            <?php
            while ($data = mysqli_fetch_assoc($showResult)) {
            ?>
                <pre><?php print_r($data) ?></pre>
            <?php } ?>
        </div>
    </div>
</body>

</html>