<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include("../controllers/PizzaController.php");

$controller = new PizzaController();
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);

switch ($_SERVER['REQUEST_METHOD']) {
  case "GET":
    echo($controller->get($queries['name']) );
    break;
  case "POST":
    echo($controller->create($queries) );
    break;
  case "PUT":
    echo($controller->update($queries['name'], $queries) );
    break;
  case "DELETE":
    echo($controller->delete($queries['name']) );
    break;
  default :
    echo("No idea what you are, but here is an OK");
}

