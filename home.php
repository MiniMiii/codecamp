<?php
session_start();
if(isset($_SESSION['id'])){
  $user_id = $_SESSION['id'];
}
else {
  header("Location:login.php");
}
$error = false;
$error_msg = "";
$success = false;
$success_msg = "";

if(isset($_POST['addquestion'])){
  if(!empty($_POST['newquestion'])){
    session_start();
    $_SESSION['id'] = $adminuser ['user_id'];
    $newquestion = $_POST['newquestion'];
    $db = mysqli_connect('localhost','302672_1_2', 'dMUGpu9tekfg','302672_1_2')
      or die ('Fehler beim Verbinden mit dem Datenbankserver.');
      mysqli_set_charset($db, "utf8");
      $sql = "INSERT INTO questions(question) VALUES ('$newquestion');";
      $result = mysqli_query($db, $sql);
      mysqli_close($db);
  } else {
    $error =true;
    $error_msg .="Sie haben keine Frage eingefügt</br>";
  }
}
function get_posts(){
  $sql="SELECT * FROM questions;";
  return get_result($sql);
}

function get_questions ()
{
  $sql = "SELECT * FROM questions q"
}

?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben müssen zuerst im head stehen; jeglicher sonstiger head-Inhalt muss nach diesen Tags kommen -->
    <title>Hackaton Projekt</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	  <!-- Einbindung einer eigenen CSS-Datei -->
	  <link href="css/design.css" rel="stylesheet">
  </head>
  <body>
    <img id="logo" src="img/fhs-logo.jpg" alt="Logo"></img>
<div>
  <div id="line1"></div>
  <div id="line2"></div>
  <div id="line3"></div>
    <div class="container">
</div>

    </div>
    <div class="container">
      <div class="row">
    			<div class="col-md-6 col-md-offset-3">
    				<div class="panel panel-login">
    					<div class="panel-heading">
    						<div class="row">
    							<div class="col-xs-12">
      							<h3> Backend Administrator</h3>
    							</div>
    						</div>
    						</div>
    					<div class="panel-body">
    						<div class="row">
    							<div class="col-lg-12">
    								<!-- Login-Formular -->
    								<form id="login-form" action="home.php" method="post" role="form" style="display: block;">
                      <p class="questions">Neue Frage hinzufügen</div>
                      <div class="form-group">
    										<input type="text" name="newquestion" id="newquestion" tabindex="1" class="form-control" placeholder="Bitte hier Ihre neue Frage eingeben" value="">
    									</div>
    									<div class="col-sm-6 col-sm-offset-3">
    												<input type="submit" name="addquestion" id="addquestion" tabindex="4" class="form-control btn btn-login" value="Frage hinzufügen">
    											</div>
    										</div>
                        <div class="wholeform">
                        <p>Für die Schüler dargestellten Fragen</p>
                        // DA!

                      </div>

                        </div>
    									</div>
    								</form>
    								<!-- /Login-Formular -->

    						</div>
    					</div>
              <?php
          if($success == true) {
         ?>
                <div class="alert alert-success" role="alert">Sie haben sich erfolgreich eingeloggt</div>
        <?php
        }
          if($error == true) {
         ?>
                <div class="altert alert-danger" role="alert"><?php echo $error_msg?></div>
        <?php }
         ?>
    				</div>


      </div>

      <footer id="footer">
        <p class="h5 text-muted"><a href="login.php"> Admin Login</a></p>
    </footer>

    <!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
