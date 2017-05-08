<?php
    function get_db_connection()
    {
      $db = mysqli_connect('localhost','175674_5_1', 'FPJqx0IfBD2X','175674_5_1')
      or die ('Fehler beim Verbinden mit dem Datenbankserver.');
    mysqli_set_charset($db, "utf8");
    return $db;
    }

    function get_result($sql)
    {
    $db = get_db_connection();
    //echo $sql;
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
    }

    function login($email, $password)
    {
    $sql = "SELECT * FROM adminuser WHERE email = '$email' AND password = '$password';";
    return get_result($sql);
    }

    function create_question($newquestion) {
      $sql = "INSERT INTO questions (question) VALUES ('$newquestion');";
      return get_result($sql);
  }

        function delete_question ($question_id) {
        $sql="DELETE FROM questions WHERE question_id=$question_id";
        return get_result($sql);
    }


    function edit_question ($question_id,$newtextquestion) {
    $sql="UPDATE questions SET question='$newtextquestion' WHERE question_id=$question_id";
    return get_result($sql);
}
    ?>
