<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author tareq
 */
interface CrudEndpoint {

  /**
   * a function to list an entity
   */
  public function list();

  /**
   * reads an entity by id
   * @param integer $id the id of the entity
   */
  public function get($id);

  /**
   * updates an entity by an id
   * @param int $id  the id of the entity
   * @param Array $entity an associative array representing the entity
   */
  public function update($id, $entity);

  /**
   * creates a new entity
   * @param type $entity an associative array representing the entity
   */
  public function create($entity);

  /**
   * deletes an entity by id
   * @param type $id the id of the entity
   */
  public function delete($id);
}
