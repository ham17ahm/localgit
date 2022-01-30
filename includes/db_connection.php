<?php
define("HOST", "localhost");
define("USER", "root");
define("DB", "hmpsdb");
define("PASS", "");

$conn = mysqli_connect(HOST, USER, PASS, DB);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
