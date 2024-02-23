<?php
//rispondo in linguaggio json
header('Content-Type: application/json');

//path per arrivare al file json
$source_path = __DIR__ . '/../../../database/tasks.json';

//prendo i contenuti del file json
$data = file_get_contents($source_path);

//salvo in task i data
$tasks = $data;

//controllo se ho un nuovo task
$task_id= $_POST['id'] ?? null;


//se ce l'ho
if($task_id) {

    //converto in array php
    $tasks = json_decode($tasks, true);

    $tasks = array_map(function($task){
        if($task['id'] == $_POST['id'] ) $task['done'] = !$task['done'];
        return $task;
    }, $tasks);

    //riconverto in json
    $tasks = json_encode($tasks);

}

    //stampo i task riconvertiti in jason
    echo $tasks;


