<?php

  function get_db_connection()
  {
    $db = mysqli_connect('localhost', '302672_5_1', 'b8xBcXYrs6uH', '302672_5_1')
      or die('Fehler beim Verbinden mit dem Datenbank-Server.');
    mysqli_set_charset($db, "utf8");
    return $db;
    echo "fuck you";
  }

  function get_result($sql)
  {
    $db = get_db_connection();
    // echo $sql;
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
  }

  function get_id_result($sql)
  {
    $db = get_db_connection();
    // echo $sql;
    mysqli_query($db, $sql);
    $result = mysqli_insert_id($db);
    mysqli_close($db);
    return $result;
  }

/************** Auflistungen ***************/

  function get_event_list($event_id)
  {
    $sql = "SELECT * FROM event;";
    return get_result($sql);
  }

  function get_genre_list($genre)
  {
    $sql = "SELECT bezeichnung FROM genre;";
    return get_result($sql);
  }



?>
