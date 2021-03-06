<?php

require_once('system/data.php');
require_once('system/security.php');


$event_list = get_event_list($event_id);
//
// if(isset($_POST['del_friends'])){
//   remove_friends($user_id, $_POST['del_friends']);
// }

$genre_list = get_genre_list($genre);

$text = $_POST['text'];
echo $text;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Musikveranstaltungen Schweiz</title>
    <meta name="description" content="Ajax Projekt 4.Semester">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto:300,400|Questrial|Satisfy">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" onload="myFunction()">
  <div class="header">
      <div class="bg-color">
        <header id="main-header">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#lauraMenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">MusicInCH</a>
            </div>
            <div class="collapse navbar-collapse" id="lauraMenu">
              <ul class="nav navbar-nav navbar-right navbar-border">
                <li class="active"><a href="#main-header">Home</a></li>
                <li><a href="#contact">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </nav>
        </header>
        <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-12 wow fadeIn delay-05s">
              <div class="banner-text">
                <h2>Hallo <span>du</span>,</h2>
                <p>Wähle eine Veranstaltung ganz <br>nach deinem Geschmack</p>
              </div>
              <div class="overlay-detail text-center">
                  <a href="#about"><i class="fa fa-angle-down"></i></a>
              </div>
            </div>
          </div>
          </div>
        </div>
        </div>
      </div>
  <section id="about" class="section-padding wow fadeIn delay-05s">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-right">
          <h2 class="title-text">
            Lust auf <br><span class="deco">deine</span> Musik?
          </h2>
        </div>
        <div class="col-md-6 text-left">
          <div class="about-text">
            <p>Das Prinzip ist ganz einfach. Du wählst deinen Kanton,den Genre, Freitext oder das gewünschte Datum aus und du kriegst alle zu deiner Suchangabe passenden Resulate angezeigt.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="portfolio" class="section-padding wow fadeInUp delay-05s">
    <div class="container">
        <div class="col-md-4">
            <form id="form" method="post" action="index.php">
                <div class="form-group">
                    <p>Freitextsuche</p>
                    <input id="text" name="text" type="text" class="form-control" placeholder="Text eintippen">
                    <span class="input-group-btn">
                    </span>
                </div>
                <div class="form-group">
                    <label for="filterKanton">Kanton wählen</label>
                        <select id="select" name="select" class="form-control">
                          <option value="0" selected>Alle Veranstaltungen</option>
                          <option value="1">Schaffhausen</option>
                          <option value="2">Graubünden</option>
                          <option value="3">Zürich</option>
                          <option value="4">St. Gallen</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="filterGenre">Genre wählen</label>
                        <select id="genre" name="genre" class="form-control">
                            <?php while($genre = mysqli_fetch_assoc($genre_list)) { ?>
                                  <option value="<?php echo $genre['genre_id']; ?>">
                                      <?php echo $genre['bezeichnung']; ?>
                                  </option>
                                <?php  } ?>
                        </select>
                </div>


                  <div class="form-group"> <!-- Date input -->
                    <label for="filterDate">Datum wählen</label>
                        <select class="form-control">
                          <option value="0" selected>Alle Daten</option>
                          <option value="1">11.05.</option>
                          <option value="2">15.05</option>
                          <option value="3">7.06</option>
                          <option value="4">5.08</option>
                        </select>
                   </div>

          <div class="form-group"> <!-- Submit button -->
            <input id="submit" class="btn btn-primary " name="submit" type="submit">Submit</input>
          </div>
                </div>

            </form>
            <div id="event_list">
              <div class="col-md-12">
              <div class="event_list" data-toggle="buttons" >
                <ul>
                                <?php while($event = mysqli_fetch_assoc($event_list)) { ?>
                                    <li class="event_list" >
                                       <?php echo $event['freitext'] . " " . $event['kanton']; ?>
                                    </li><br/>
                                <?php } ?>
                              </ul>
                              </div>
                              </div>
                </div>

            </div>

        </div>
    </div>
  </section>

              <div class="footer">
                  © Copyright Laura Theme. All Rights Reserved
                    <div class="credits">
                        <!--
                            All the links in the footer should remain intact.
                            You can delete the links only if you purchased the pro version.
                            Licensing information: https://bootstrapmade.com/license/
                            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Laura
                        -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade.com</a>
                    </div>
              </div>
          </div>
          <div class="col-md-6 text-right">
              <ul class="social-list">
                  <li>
                      <a href="#">
                          <i class="fa fa-twitter"></i>
                      </a>
                  </li>
                  <li>
                      <a href="#">
                          <i class="fa fa-dribbble"></i>
                      </a>
                  </li>
                  <li>
                      <a href="#">
                          <i class="fa fa-vimeo"></i>
                      </a>
                  </li>
                  <li>
                      <a href="#">
                          <i class="fa fa-instagram"></i>
                      </a>
                  </li>
              </ul>
          </div>

      </div>
      <!--end row-->
    </div>
  </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>

  </body>
</html>
