<?php

$ch = curl_init("https://jsonplaceholder.typicode.com/users");
$fp = fopen("users.json", "w");


curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
if(curl_error($ch)) {
    fwrite($fp, curl_error($ch));
}
curl_close($ch);
fclose($fp);




?>