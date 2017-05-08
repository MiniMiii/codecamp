<?php
session_start();
if(isset($_SESSION['id'])){
  $user_id = $_SESSION['id'];
}
else {
  header("Location:login.php");
}
require_once('data.php');

$error = false;
$error_msg = "";
$success = false;
$success_msg = "";

if(isset($_POST['addquestion'])){
  if(!empty($_POST['newquestion'])){
    $newquestion = $_POST['newquestion'];
    create_question($newquestion);
  } else {
    $error =true;
    $error_msg .="Sie haben keine Frage eingefügt</br>";
  }
}

if(isset($_POST['deletequestion'])){
    $question_id = $_POST['deletequestion'];

    delete_question ($question_id);

  }

  if(isset($_POST['editquestion'])){
      $question_id = $_POST['editquestion'];
      $quenstionnewtext = $_POST['editquestiontext'];

      edit_question ($question_id, $quenstionnewtext);

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
    								<!-- Fragen hinzufügen-->
    								<form id="login-form" action="home.php" method="post" role="form" style="display: block;">
                      <p class="questions">Neue Frage hinzufügen</div>
                      <div class="form-group">
    										<input type="text" name="newquestion" id="newquestion" tabindex="1" class="form-control" placeholder="Bitte hier Ihre neue Frage eingeben" value="">
    									</div>
    									<div class="col-sm-6 col-sm-offset-3">
    												<input type="submit" name="addquestion" id="addquestion" tabindex="4" class="form-control btn btn-login" value="Frage hinzufügen">
    											</div>
                          </form>
    										</div>
                        <h2>Für die Schüler dargestellte Fragen</h2>
                        <!-- Fragen für Schüler dargestellt -->
                        <?php
                          function table1()
                          {
                          $db = mysqli_connect('localhost','175674_5_1', 'FPJqx0IfBD2X','175674_5_1')
                          or die ('Fehler beim Verbinden mit dem Datenbankserver.');
                          mysqli_set_charset($db, "utf8");
                          $sql = "SELECT question, question_id FROM questions";
                          $result = mysqli_query($db, $sql);
                          $html = "<div id='questionslayout'>";
                          while ($row = mysqli_fetch_array( $result ))
                          {
                            $html .= "<form id='login-form' action='home.php' method='post' role='form' style='display: block;'>
                            <p class='questions'><button type='submit' name='deletequestion' id='deletequestion' tabindex='4'
                            class='form-control btn btn-delete' value='" . $row['question_id'] . "'>
                            Frage löschen</button>

                            <input type='text' name='editquestiontext' id='editquestiontext' tabindex='5' class='form-control' placeholder='Bitte hier Ihre neue Frage eingeben' value=''>

                            <button type='submit' name='editquestion' id='editquestion' tabindex='4'
                            class='form-control btn btn-delete' value='" . $row['question_id'] . "'>
                            Frage editieren, änderungen speichern</button>
                            <br/>" . $row['question'] . "</p></form>";
                          }
                          $html .= "</div>";
                          return $html;
                        }
                        echo table1();
                ?>

                        </div>

    									</div>
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


    <!-- Modales Fenster zur Fragenaktualisierung-->

              </div>
              </div>
          
          </form>

        </div>
      </div>
    </div>
    <!-- /Modales Fenster zur Userdatenaktualisierung-->




      <footer id="footer">
        <p class="h5 text-muted"><a href="login.php"> Admin Login</a></p>
    </footer>

    <!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
