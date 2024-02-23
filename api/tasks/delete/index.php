<?php 
//rendo possibile la lettura in json
header('Content-Type: application/json');

//prendo il percorso dal database
$source_path = __DIR__ . '/../../../database/tasks.json';

//metto in una variabile il contenuto del percorso recuperato
$tasks_json = file_get_contents($source_path);


//per cambiare done
$task_id = $_POST['id'] ?? null;

//decodo il json in php
$tasks = json_decode($tasks_json, true);


if ($task_id) {

    $tasks = array_filter($tasks, function($task) {
        return $task['id'] != $_POST['id'];
    });
} 

    


$tasks = json_encode($tasks);

//traduco nuovamente in json
echo $tasks;


?>

