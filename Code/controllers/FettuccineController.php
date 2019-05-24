<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("../utils/CrudEndpoint.php");
include("../utils/Database.php");

class FettuccineController {

  private $connection;

  private const CREATE_SQL = "INSERT INTO fettuccine (name, size,descreption) VALUES (?,?,?)";
  private const READ_SQL = "SELECT name,size,descreption FROM fettuccine WHERE name =? LIMIT 1";
  private const LIST_SQL = "SELECT * FROM fettuccine";
  private const UPDATE_SQL = "UPDATE fettuccine SET name=?, size=?,descreption=? WHERE name=?";
  private const DELETE_SQL = "DELETE FROM fettuccine WHERE id=?";

  public function __construct() {
    $database = new Database();
    $this->connection = $database->getConnection();
  }

  public function create($entity) {
    $stmt = $this->connection->prepare(FettuccineController::CREATE_SQL);
    $stmt->bind_param("sss", $entity['name'], $entity['size'], $entity['descreption']);
    $stmt->execute();
    $stmt->close();
    return "Done creating fettuccine";
  }

  public function delete($id) {
    $stmt = $this->connection->prepare(FettuccineController::DELETE_SQL);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    return "Done deleting fettuccine";
  }

  public function get($id) {
    $stmt = $this->connection->prepare(FettuccineController::READ_SQL);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $name = "";
    $size = "";
    $descreption = "";
    $stmt->store_result();
    $stmt->bind_result($name, $size, $descreption);
    $stmt->fetch();
    $stmt->close();
    return "Hello " . $name . ", your fettuccine is " . $size . " and " . $descreption;
  }

  public function list() {
    $stmt = $this->connection->prepare(FettuccineController::LIST_SQL);
    return "nnothing to seee here";
  }

  public function update($id, $entity) {
    $stmt = $this->connection->prepare(FettuccineController::UPDATE_SQL);
    $stmt->bind_param("ssss", $entity['name'], $entity['size'], $entity['descreption'], $id);
    $stmt->execute();
    $stmt->close();
    return "done updating fettuccine " . $id;
  }

}
