<?php
$path =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', $path);

$resource = $parts[2];
$id = $parts[3] ?? null;
$method =  $_SERVER['REQUEST_METHOD'];
// http status code para las url no permitidas
if($resource !== "tasks"){
  //obtenemos el protocolo http usado y usando el metodo header pasamos el status code
  // header("{$_SERVER['SERVER_PROTOCOL']} 404 not found");
  //usando http_response este es el metodo recomendado
  http_response_code(404);
  exit;
}


require dirname(__DIR__) . "/api_curso/src/TaskController.php";

$controller = new TaskController;

$controller->processRequest($method, $id);