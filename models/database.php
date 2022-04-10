<?php

class Database {
  private $_conn;

  private $_hostname  = "localhost";
  private $_username  = "root";
  private $_password  = "";
  private $_dbname    = "uneti";

  private $_table;
  private $_offset    = 0;
  private $_limit     = 10;

  private function runSql($sql) {
    $result = mysqli_query($this->_conn, $sql);
    return $result;
  }

  function __construct($dbname = 'uneti') {
    $this->_dbname = $dbname;
    $this->_conn = mysqli_connect($this->_hostname, $this->_username, $this->_password, $this->_dbname);
    mysqli_set_charset($this->_conn, "utf8");
  }

  function table($tableName) {
    $this->_table = $tableName;
    return $this;
  }

  function offset($offset) {
    $this->_offset = $offset;
    return $this;
  }

  function limit($limit) {
    $this->_limit = $limit;
    return $this;
  }

  function update($id, $arr) : void {
    $tempSql = "";
    foreach($arr as $column => $value) {
      $tempSql .= "$column = '$value',";
    }
    $tempSql = substr_replace($tempSql, "", -1);
    $sql = "UPDATE $this->_table SET " . $tempSql .  " WHERE id = '$id'";
    $this->runSql($sql);
  } 

  function deleteId($id) {
    $sql = "DELETE FROM $this->table WHERE id = '$id'";
    $this->runSql($sql);
  }

  function create($arr) {
    $columns = "";
    $values  = "";
    foreach($arr as $column => $value) {
      $columns .= $column . ",";
      $values .= "'$value'" . ",";
    }
    $columns = substr_replace($columns, "", -1);
    $values = substr_replace($values, "", -1);
    $sql = "INSERT INTO $this->_table ($columns) 
    VALUES ($values);";
    $this->runSql($sql);
    $resGetLastInsertId = mysqli_insert_id($this->_conn);
    return $resGetLastInsertId;
  }

  function selectAll() : array {
    $sql    = "SELECT * FROM $this->_table LIMIT $this->_offset, $this->_limit";
    $result = $this->runSql($sql);
    $res    = [];
    foreach($result as $each) {
      $res[] = $each;
    }
    return $res;
  }
  function selectField($arr) {
    $whereCondition = "";
    foreach($arr as $column => $value) {
      $whereCondition .= " " . $column . " = " . "'$value' AND";
    }
    $whereCondition = substr_replace($whereCondition, "", -3);
    $sql    = "SELECT * FROM $this->_table WHERE $whereCondition";
    $res    = $this->runSql($sql);
    return $res;
  }
  function selectCustom($sql) {
    return $this->runSql($sql);
  }
  function selectId($id) : object {
    $sql    = "SELECT * FROM $this->_table WHERE id = '$id'";
    $result = $this->runSql($sql);
    $res    = mysqli_fetch_object($result);
    return $res;
  }
}
