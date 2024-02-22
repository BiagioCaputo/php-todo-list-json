<?php
//rispondo in linguaggio json
header('Content-Type: application/json');

//path per arrivare al file json
$source_path = __DIR__ . '/../../database/tasks.json';

//prendo i contenuti del file json
$data = file_get_contents($source_path);

//converto in array php
$tasks = json_decode($data, true);

//riconverto in json
$tasks = json_encode($tasks);

//stampo i task riconvertiti in jason
echo $tasks;
