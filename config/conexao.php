<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "crud_desweb";
    $port = 3306;

    $conn = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $user, $pass);