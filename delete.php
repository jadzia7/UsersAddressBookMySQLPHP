<?php

require 'app' . DIRECTORY_SEPARATOR . 'connection.php';
require 'app' . DIRECTORY_SEPARATOR . 'header.php';
$id = $_GET['id'];
$sql = <<<TAG
             DELETE FROM users WHERE id=$id;
TAG;


if (mysqli_query(dbConnection(), $sql)) {
    header("Location:index.php");
    echo "You just remove successfully user!!!";
} else {
    echo "Something went wrong!!!";
}
?>
