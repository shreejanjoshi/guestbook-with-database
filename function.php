<?php
include 'database.php';

function storeData()
{
    if (isset($_post['submit'])) {
        global $connection;

        $username = $_post['username'];
        $title = $_post['title'];
        $date = $_post['date'];
        $message = $_post['message'];

        $query = "INSERT INTO users (username, title, date, message)";
        $query .= "VALUE ('$username', '$title', '$date', '$message')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed " . mysqli_error($connection));
        } else {
            echo "Data is saved";
        }
    }
}

function showData()
{
    global $connection;

    $query = "SELECT * FROM users";
    $endResult = mysqli_query($connection, $query);

    if (!$endResult) {
        die("Query failed " . mysqli_error($connection));
    }

    while ($data = mysqli_fetch_assoc($endResult)) {
        print_r($data);
        echo "<br>";
    }
}
