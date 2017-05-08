<?php
session_start();
if(!isset($_SESSION['id'])){
  header("Location:login.php");
}

 ?>
<!DOCTYPE HTML>
<body>
<h1>erfolgreich eingeloggt</h1>

</body>
</html>
