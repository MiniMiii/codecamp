<?php
session_start();
if(isset($_SESSION['id'])) unset($_SESSION['id']);
session_destroy();

require_once('data.php');

$error = false;
$error_msg = "";
$success = false;
$success_msg = "";


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
                      <p>
                        <h3 class="form">Willkommen auf der Berufsberatungsseite!</h3> </br>
                        <h2 class="form">Wir freuen uns Ihnen bei Ihrer Berufswahl und Orientierung in der Berufswelt, mit unserem Fragebogen weiterhelfen zu können.</h2></br>
                        Der Folgende Fragebogen erhält zehn Fragen, die so spontan als möglich beantwortet werden sollten. Nach Beendigung des Fragebogens erhalten Sie eine Auswertung, die Ihnen Ihre genauen Resultate aufzeigt.</p>
    							</div>
                <div id="questions">
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
                      $html .= "<p class='questions'><br/>" . $row['question']; "</p>";
                    }
                    $html .= "</div>";
                    return $html;
                  }
                  echo table1();
                  ?>
                </div>
    						</div>
    						</div>
    			</div>
    		</div>
