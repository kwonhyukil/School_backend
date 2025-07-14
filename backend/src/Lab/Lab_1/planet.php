<?php
$name = $_GET['planet'];

$distance = [
    "mercury" => 57900000,
    "earth" => 150000000,
    "mars" => 230000000
];

$LightSpeed = 300000;

$time = $distance[$name] / $LightSpeed;

$timeMiuntes = $time / 60;

echo "Trave time from Sun to " . $name . " : " . round($timeMiuntes, 2) . " minutes";
