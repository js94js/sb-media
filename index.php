<html>
<head>
</head>
<body>

<?php

include 'curl_connection.php';
include 'class_collection.php';
include 'class_user.php';




$Collection = new Collection();
$Collection->getUsers();

$Collection->outputToCsv($Collection->users);



?>
</body>