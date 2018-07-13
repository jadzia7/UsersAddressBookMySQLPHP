<?php

function dbConnection() {

    $connect = mysqli_connect("yourHost", "yourUser", "yourPassword", "yourBase");
    $connect->set_charset('utf8_unicode_ci');
    
    return $connect;

}


