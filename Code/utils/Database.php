<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author tareq
 */
class Database {

  private const servername = "localhost";
  private const username = "ws_user";
  private const password = "A-h-4...59";
  private const dbname = "ws";

  private $connection;

  function __construct() {
    $this->connection = new mysqli(Database::servername, Database::username, Database::password, Database::dbname);
    $this->connection->set_charset("utf8mb4");
  }

  function getConnection() {
    return $this->connection;
  }

}
