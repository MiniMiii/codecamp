<?php
session_start();
if(isset($_SESSION['id'])) unset($_SESSION['id']);
session_destroy();
$error = false;
$error_msg = "";
$success = false;
$success_msg = "";

if(isset($_POST['login-submit'])){
  if(!empty($_POST['email']) && !empty($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = mysqli_connect('localhost','302672_1_2', 'dMUGpu9tekfg','302672_1_2')
      or die ('Fehler beim Verbinden mit dem Datenbankserver.');
    mysqli_set_charset($db, "utf8");
    $sql = "SELECT * FROM adminuser WHERE email = '$email' AND password = '$password';";
      $result = mysqli_query($db, $sql);
      mysqli_close($db);

      $row_count = mysqli_num_rows($result);

    if($row_count == 1){
      $adminuser = mysqli_fetch_assoc($result);
      session_start();
      $_SESSION['id'] = $adminuser ['user_id'];
      header("Location:home.php");
    }else {
      $error =true;
      $error_msg .="Leider konnten wir ihre E-Mail-Adresse oder ihr Passwort nicht finden.</br>";
    }
  } else {
    $error =true;
    $error_msg .="Bitte füllen Sie beide Felder aus.</br>";
  }
}
?>


<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <title>Bootstrap-Basis-Vorlage</title>
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
      							<h3>Login Berufsberater</h3>
                      <p>Bitte geben Sie Ihre Anmeldedaten ein</p>
    							</div>
    						</div>
    						</div>
    					<div class="panel-body">
    						<div class="row">
    							<div class="col-lg-12">
    								<!-- Login-Formular -->
                    <form id="login-form" action="login.php" method="post" role="form" style="display: block;">
                <div class="form-group">
                  <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="E-Mail-Adresse" value="">
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Passwort">
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                      <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="einloggen">
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
<?php
  if($success == true) {
 ?>
        <div class="alert alert-success" role="alert">Es hat funktioniert</div>
<?php
}
  if($error == true) {
 ?>
        <div class="altert alert-danger" role="alert"><?php echo $error_msg?></div>
<?php }
 ?>
      </div>


      <footer id="footer">
        <p class="h5 text-muted"><a href="index.php"> Zurück</a></p>
    </footer>

    <!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
