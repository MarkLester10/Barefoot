<?php

session_start();
require 'connection.php';

//PURPOSE: FOR DEBUGGING ;
function dump($value) // to be deleted soon

{
  echo "<pre>", print_r($value, true), "</pre>";
  die();
}


function execQuery($sql, $data)
{
  global $conn;
  $stmt = $conn->prepare($sql);
  $values = array_values($data);
  $types = str_repeat('s', count($values));
  $stmt->bind_param($types, ...$values);
  $stmt->execute();
  return $stmt;
}

// SELECT FUNCTIONS

function selectAll($table, $conditions = [])
{
  global $conn;
  $sql = "SELECT * FROM $table";
  if (empty($conditions)) {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  } else {
    //this will return records that match the passed conditions
    $i = 0;
    foreach ($conditions as $key => $value) {
      if ($i === 0) {
        $sql = $sql . " WHERE $key=?";
      } else {
        $sql = $sql . " AND $key=?";
      }
      $i++;
    }
    $stmt = execQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); //return all values
    return $records;
  }
}

//Select One AND-WHERE
function selectOne($table, $conditions)
{
  $sql = "SELECT * FROM $table";
  //$sql ="SELECT * FROM users WHERE id=0 AND username=Mark Lester AND ADMIN=1 AND"
  $i = 0;
  foreach ($conditions as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " WHERE $key=?";
    } else {
      $sql = $sql . " AND $key=?";
    }
    $i++;
  }
  return commit($sql, $conditions);
}


//Select One OR-WHERE
function selectOneOr($table, $conditions)
{
  $sql = "SELECT * FROM $table";
  //$sql ="SELECT * FROM users WHERE id=0 AND username=Mark Lester AND ADMIN=1 AND"
  $i = 0;
  foreach ($conditions as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " WHERE $key=?";
    } else {
      $sql = $sql . " OR $key=?";
    }
    $i++;
  }
  return commit($sql, $conditions);
}

function commit($sql, $conditions)
{
  $sql = $sql . " LIMIT 1"; // this helps when you have a thousands or millions of records
  $stmt = execQuery($sql, $conditions);
  $records = $stmt->get_result()->fetch_assoc(); //associative array that return each value
  return $records;
}


//CREATE FUNCTION
function create($table, $data) //insert
{
  // $sql = "INSERT INTO users SET name=?, size=?, email=?, password=?";
  $sql = "INSERT INTO $table SET ";
  $i = 0;
  foreach ($data as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " $key=?";
    } else {
      $sql = $sql . ", $key=?";
    }
    $i++;
  }
  $stmt = execQuery($sql, $data);
  $id = $stmt->insert_id;
  return $id;
}

//UPDATE FUNCTION
function update($table, $column = '', $columnData, $data)
{
  //$sql ="UPDATE users SET username=?, admin=?, email=?, password=? WHERE type=?"
  $sql = "UPDATE $table SET";

  $i = 0;
  foreach ($data as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " $key=?";
    } else {
      $sql = $sql . ", $key=?";
    }
    $i++;
  }
  $sql = "{$sql} WHERE {$column}=?";
  $data[$column] = $columnData;
  $stmt = execQuery($sql, $data);
  return $stmt->affected_rows;
}


//DELETE FUNCTION
function delete($table, $id)
{
  $sql = "DELETE FROM $table WHERE id=?";
  $stmt = execQuery($sql, ['id' => $id]);
  return $stmt->affected_rows;
}

function resetAll($table)
{
  global $conn;
  $sql = "TRUNCATE $table";
  $stmt = $conn->prepare($sql);
  $res = $stmt->execute();

  if ($res) {
    $status = 1;
  } else {
    $status = 0;
  }

  return $status;
}

// Search
function searchEvent($keyword)
{
  global $conn;
  // query for joining 2 tables which is users and events
  $searchMatch = '%' . $keyword . '%';

  $sql = "SELECT e.*,
            u.username
            FROM events AS e
            JOIN users AS u
            ON e.user_id=u.id
            WHERE e.title LIKE ? AND e.released='1' OR e.description LIKE ?
            AND e.released='1' ORDER BY e.eventday DESC";

  $stmt = execQuery($sql, ['title' => $searchMatch, 'description' => $searchMatch]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); //return all values
  return $records;
}