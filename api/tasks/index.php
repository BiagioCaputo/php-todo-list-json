<?php
//rispondo in linguaggio json
header('Content-Type: application/json');

//path per arrivare al file json
$source_path = __DIR__ . '/../../database/tasks.json';

//prendo i contenuti del file json
$data = file_get_contents($source_path);

//salvo in task i data
$tasks = $data;

//controllo se ho un nuovo task
$task_text= $_POST['task'] ?? '';




//se ce l'ho
if($task_text) {

    //converto in array php
    $tasks = json_decode($tasks, true);
    
    $new_task = [
        'done' => false,
        'text' => $task_text,
        'id' => uniqid()
    ];
    //aggiungo il task
    $tasks[] = $new_task;

    //riconverto in json
    $tasks = json_encode($tasks);

}


echo $tasks;

