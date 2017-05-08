<?php
session_start();
if(isset($_SESSION['id'])) unset($_SESSION['id']);
session_destroy();

require_once('data.php');

$error = false;
$error_msg = "";
$success = false;
$success_msg = "";

if(isset($_POST['startform'])){
  if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['age'])){
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $age = $_POST['age'];
      $sql = "INSERT INTO student (firstname,lastname,age) VALUES ('$firstname', '$lastname', '$age');";
      mysqli_query($db, $sql);
      header("Location:form.php");
      } else {
        $error = true;
        $error_msg ="Ihre Daten konnten nicht gespeichert werden.";
        }
      }
else {
        $error = true;
        $error_msg="Bitte gib alle Angaben an!";
}

?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <title>HAckaton Projekt</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	  <!-- Einbindung einer eigenen CSS-Datei -->
	  <link href="css/design.css" rel="stylesheet">
  </head>
  <body>
    <div>
      <div id="line1"></div>
      <div id="line2"></div>
      <div id="line3"></div>
    </div>
    <div class="container">
<img id="logo" src="img/fhs-logo.jpg" alt="Logo"></img>
    </div>
    <div class="container">
      <div class="row">
    			<div class="col-md-6 col-md-offset-3">
    				<div class="panel panel-login">
    					<div class="panel-heading">
    						<div class="row">
    							<div class="col-xs-12">
      							<h3> Willkommen auf der Berufsberatungswebseite!</h3></br>
                      <p>Bitte gebe deinen Namen, Vornamen und dein Alter ein, um starten zu können.</p>
    							</div>
    						</div>
    						</div>
    					<div class="panel-body">
    						<div class="row">
    							<div class="col-lg-12">
    								<!-- Login-Formular -->
    								<form id="login-form" action="index.php" method="post" role="form" style="display: block;">
    									<div class="form-group">
    										<input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="Vorname" value="">
    									</div>
    									<div class="form-group">
    										<input type="text" name="lastname" id="lastname" tabindex="2" class="form-control" placeholder="Nachname">
    									</div>
                      <div class="form-group">
                        <input type="number" name="age" id="age" tabindex="2" class="form-control" placeholder="Alter">
                      </div>
    									<div class="form-group">
    										<div class="row">
    											<div class="col-sm-6 col-sm-offset-3">
    												<input type="submit" name="startform" id="startform" tabindex="4" class="form-control btn btn-login" value="Umfrage starten">
    											</div>
    										</div>
    									</div>
    								</form>
    								<!-- /Login-Formular -->
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
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
