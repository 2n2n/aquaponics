<?php

require "./vendor/autoload.php";

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

$client = new Client(new Version2x('http://localhost:4000'));

$client->initialize();
while(true) {
    $seconds = 1;
    $client->emit('message', [
        "phlevel" => $_GET['pHValue'], 
        "templevel" => $_GET['sensors.getTempCByIndex(0)'], 
        "turblevel" => $_GET['sensorValue'], 
        "waterlevel" => $_GET['distance'] 
    ]);
    sleep($seconds);
}

$client->close();