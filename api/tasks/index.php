<?php
//rispondo in linguaggio json
header('Content-Type: application/json');

//path per arrivare al file json
$source_path = __DIR__ . '/../../database/tasks.json';

//prendo i contenuti del file json
$data = file_get_contents($source_path);

//salvo in task i data
$tasks = $data;

//converto in array php
$tasks = json_decode($tasks, true);

//controllo se ho un nuovo task
$newTask = $_POST['task'] ?? '';

//se ce l'ho
if($newTask) {
    //aggiungo il task
    $tasks[] = $newTask;
}

//riconverto in json
$tasks = json_encode($tasks);

//sovrascrivo il vecchio array tasks con quello aggiornato
//file_put_contents($source_path, $tasks);

//stampo i task riconvertiti in jason
echo $tasks;
